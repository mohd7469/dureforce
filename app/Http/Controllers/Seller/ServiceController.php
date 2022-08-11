<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\OverviewRequest;
use App\Http\Requests\PricingRequest;
use App\Http\Requests\ServiceBannerRequest;
use App\Http\Requests\ReviewRequest;
use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Features;
use App\Models\OptionalImage;
use App\Models\ExtraService;
use App\Models\GeneralSetting;
use App\Models\AdminNotification;
use App\Models\Attribute;
use App\Models\EntityField;
use App\Models\ServiceAttribute;
use App\Models\ServiceDetail;
use App\Models\ServiceStep;
use App\Traits\CreateOrUpdateEntity;
use App\Traits\DeleteEntity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\serviceaddonMail;


class ServiceController extends Controller
{
    use DeleteEntity, CreateOrUpdateEntity;

    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function index()
    {
        $user = Auth::user();
        $pageTitle = "Manage service";
        $emptyMessage = "No data found";
        $services = Service::where('user_id', $user->id)->with('category')->latest('id')->paginate(getPaginate());
        return view($this->activeTemplate . 'user.seller.service.index', compact('pageTitle', 'services', 'emptyMessage'));
    }

    public function create($id = null)
    {
        $pageTitle = "Create service";
        $completedOverview = '';
        $completedPricing = '';
        $completedImage = '';
        $completedRequirements = '';
        $completedReview = '';

        $features = Features::latest()->get();

        $attributes = EntityField::with('attributes')->Entity(EntityField::SERVICE)->where('status', true)->get();

        $service = null;

        if (! empty($id) || $id > 0) {
            $service = Service::with('serviceDetail', 'serviceSteps', 'serviceAttributes','extraService', 'category', 'subCategory')->findOrFail($id);

            $completedOverview = $service->serviceAttributes()->count() > 0 ? 'completed' : '';
            $completedPricing = $service->price > 0 ? 'completed' : '';
            $completedImage = !empty($service->image) ? 'completed' : '';
            $completedRequirements = !empty($service->serviceDetail->client_requirements) ? 'completed' : '';
            $completedReview = !empty($service->serviceDetail->max_no_projects) ? 'completed' : '';
        }

        return view($this->activeTemplate . 'user.seller.service.create', compact(
            'pageTitle',
            'features',
            'attributes',
            'completedOverview',
            'completedPricing',
            'completedImage',
            'completedRequirements',
            'completedReview',
            'service'
        ));
    }


    public function storeOverview(OverviewRequest $request)
    {
        $serviceId = $request->get('service_id');

        if(! empty($serviceId)) {
            $service = Service::FindOrFail($serviceId);
        } else {
            $service = new Service();
        }

        $this->saveOverview($request, $service, $serviceId, Attribute::SERVICE);

        $notify[] = ['success', 'Service Overview has been Saved.'];
        return redirect()->route('user.service.create', ['id'=> $service->id, 'view' => 'step-2'])->withNotify($notify);
    }

    public function storePricing(PricingRequest $request)
    {

        $serviceId = $request->get('service_id');

        if(empty($serviceId)) {
            $notify[] = ['error', 'Recently Created Service is missing.'];
            return redirect()->back()->withNotify($notify);
        }

        $service = Service::FindOrFail($serviceId);

        $this->savePricing($request, $service, Attribute::SERVICE);

        $notify[] = ['success', 'Service Pricing Saved Successfully.'];
        return redirect()->route('user.service.create', ['id'=> $service->id, 'view' => 'step-3'])->withNotify($notify);
    }

    public function storeBanner(Request $request)
    {
        $serviceId = $request->get('service_id');

        if(empty($serviceId)) {
            $notify[] = ['error', 'Recently Created Service is missing.'];
            return redirect()->back()->withNotify($notify);
        }

        $service = Service::FindOrFail($serviceId);

        $result = $this->saveBanner($request, $service, Attribute::SERVICE, 'service', 'optionalService');

        if(!$result) {
            $notify[] = ['error', 'Some error occured while saving banner.'];
            return redirect()->back()->withNotify($notify);
        }

        if($service->price == 0) {
            $notify[] = ['error', 'Please complete the service pricing first.'];
            return redirect()->route('user.service.create', ['id'=> $service->id, 'view' => 'step-2'])->withNotify($notify);
        }

        $notify[] = ['success', 'Service Banner Saved Successfully.'];
        return redirect()->route('user.service.create', ['id'=> $service->id, 'view' => 'step-4'])->withNotify($notify);
    }

    public function storeRequirements(ClientRequest $request)
    {
        $serviceId = $request->get('service_id');

        if(empty($serviceId)) {
            $notify[] = ['error', 'Recently Created Service is missing.'];
            return redirect()->back()->withNotify($notify);
        }

        $service = Service::FindOrFail($serviceId);

        if(empty($service->image)) {
            $notify[] = ['error', 'Please complete the service banners first.'];
            return redirect()->route('user.service.create', ['id'=> $service->id, 'view' => 'step-3'])->withNotify($notify);
        }

        $this->saveRequirements($request, $service, Attribute::SERVICE);

        $notify[] = ['success', 'Service Requirements Saved Successfully.'];
        return redirect()->route('user.service.create', ['id'=> $service->id, 'view' => 'step-5'])->withNotify($notify);
    }

    public function storeReview(ReviewRequest $request)
    {

        if(empty($request->get('service_id')))
        {
            $notify[] = ['error', 'Recently Created Service is missing.'];
            return redirect()->route('user.service.create', ['view' => 'step-1'])->withNotify($notify);
        }

        $service = Service::FindOrFail($request->get('service_id'));

        if(empty($service->image) && $service->price == 0) {
            $notify[] = ['error', 'Please complete the previous steps first.'];
            return redirect()->route('user.service.create', ['id'=> $service->id, 'view' => 'step-1'])->withNotify($notify);
        }

        $this->saveReview($request, $service, Attribute::SERVICE, 'Service', 'service');
        $this->ServiceAddConfirmationMail($service);
        $notify[] = ['success', 'Service Review Saved Successfully.'];
        return redirect()->route('user.service.index')->withNotify($notify);
      
    }


    public function optionalImageRemove(Request $request)
    {
        $optional = OptionalImage::findOrFail(decrypt($request->id));
        $path = imagePath()['optionalService']['path'];
        $file_remove = $path . '/' . $optional->image;
        removeFile($file_remove);
        $optional->delete();
        $notify[] = ['success', 'Image has been deleted.'];
        return back()->withNotify($notify);
    }

    private function optionalImageStore($request, $optionalImage, $serviceId)
    {
        foreach ($optionalImage as $index => $optional) {
            $optionals = new OptionalImage();
            $optionals->service_id = $serviceId;
            $path = imagePath()['optionalService']['path'];
            $size = imagePath()['optionalService']['size'];
            if ($request->hasFile('optional_image')) {
                $file = $optional;
                try {
                    $filename = uploadImage($file, $path, $size);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Image could not be uploaded.'];
                    return back()->withNotify($notify);
                }
                $optionals->image = $filename;
                $optionals->caption = $request->get("optional_image_text")[$index];
            }
            $optionals->save();
        }
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);

        $service->featuresService()->detach();
        $service->serviceDetail()->delete();
        $service->serviceSteps()->delete();
        $service->serviceAttributes()->delete();

        $this->deleteEntity(Service::class, 'service', $id);
        $notify[] = ['success', 'Service has been Deleted Successfully.'];
        return back()->withNotify($notify);
    }
    public function ServiceAddConfirmationMail($service){

        Mail::to($service->user->email)->send(new serviceaddonMail($service));
    }
}
