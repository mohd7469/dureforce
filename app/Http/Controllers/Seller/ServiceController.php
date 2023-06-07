<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\OverviewRequest;
use App\Http\Requests\PricingRequest;
use App\Http\Requests\ServiceBannerRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\ServiceProposalRequest;
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
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use App\Mail\serviceaddonMail;
use App\Models\Module;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    use DeleteEntity, CreateOrUpdateEntity;
    public $activeTemplate='';
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function index()
    {
        try {
            $user = Auth::user();
            $pageTitle = "Manage service";
            $emptyMessage = "No data found";
            $services = Service::where('user_id', $user->id)->with('category')->latest('id')->paginate(getPaginate());
            Log::info(["Services" => $services]);
            return view($this->activeTemplate . 'user.seller.service.index', compact('pageTitle', 'services', 'emptyMessage'));
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);

        }
    }

    public function show($uuid)
    {
        try {

            $pageTitle = "Service details";
            $service = Service::withAll()->where('uuid', $uuid)->firstOrFail();

            if(Auth::user()->id !=$service->created_by){
                $service->views += 1;
                $service->save();
            }
            $related_services = Service::withAll()->where('category_id', $service->category_id)->where('sub_category_id', $service->sub_category_id)->where('id', '<>', $service->id)->where('status_id', Service::STATUSES['APPROVED'])->latest()->limit(4)->get();
            $selected_skills = $service->skills ? implode(',', $service->skills->pluck('id')->toArray()) : '';
            $emptyMessage="No Data Found";
            Log::info(["Services" => $service, "Related Services" => $related_services]);
            return view($this->activeTemplate . 'service_deatils', compact('pageTitle', 'service', 'selected_skills', 'related_services','emptyMessage'));
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);

        }
    }

    public function create($id = null)
    {
        try {
            $pageTitle = "Create service";
            $empty='';
            $completed='completed';
            $completedOverview = $completedPricing = $completedBanner = $completedRequirements =  $completedReview = $completedProposal=$empty ;

            $features = Features::Active()->latest()->get();

            $attributes = EntityField::with('attributes')->Entity(EntityField::SERVICE)->where('status', true)->get();
            $service_deliverables =collect([]);
            $service = null;

            if ($id) {
                $service = Service::withAll()->findOrFail($id);


                $completedOverview = $service->skills()->count() > 0 ? $completed : $empty;
                $completedPricing = $service->rate_per_hour > 0 ? $completed : $empty;
                $completedBanner = $service->banner ? $completed : $empty;
                $completedProposal = $service->defaultProposal ? $completed : $empty;
                $completedRequirements = $service->is_requirement_for_client_added ? $completed : $empty;
                $completedReview = !empty($service->number_of_simultaneous_projects) ? $completed : $empty;
            }
            Log::info(["Service" => $service]);

            return view($this->activeTemplate . 'user.seller.service.create', compact(
                'pageTitle',
                'features',
                'attributes',
                'completedOverview',
                'completedPricing',
                'completedBanner',
                'completedProposal',
                'completedRequirements',
                'completedReview',
                'service'
            ));

        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }


    public function storeOverview(Request $request)
    {
        try {
            
            $serviceId = $request->get('service_id');
            if (!empty($serviceId)) {
                $service = Service::FindOrFail($serviceId);
            } else {
                $service = new Service();
            }

            $this->saveOverview($request, $service, $serviceId, Attribute::SERVICE);

            $notify[] = ['success', 'Service Overview has been Saved.'];
            Log::info(["Service" => $service]);

            return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-2'])->withNotify($notify);
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }

    public function storePricing(PricingRequest $request)
    {
        try {

            $serviceId = $request->get('service_id');

            if (empty($serviceId)) {
                $notify[] = ['error', 'Recently Created Service is missing.'];
                return redirect()->back()->withNotify($notify);
            }

            $service = Service::FindOrFail($serviceId);

            $this->savePricing($request, $service, Attribute::SERVICE);
            Log::info(["Service" => $service]);
            $notify[] = ['success', 'Service Pricing Saved Successfully.'];
            return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-3'])->withNotify($notify);
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }

    }

    public function storeBanner(Request $request)
    {
        try {
            $serviceId = $request->get('service_id');

            if (empty($serviceId)) {
                $notify[] = ['error', 'Recently Created Service Is Missing'];
                return redirect()->back()->withNotify($notify);
            }

            $service = Service::FindOrFail($serviceId);

            if ($service->rate_per_hour < 1) {
                $notify[] = ['error', 'Please complete the service pricing step first.'];
                return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-2'])->withNotify($notify);
            }

            $result = $this->saveBanner($request, $service, Attribute::SERVICE, 'service', 'optionalService');
            if (!$result) {
                $notify[] = ['error', 'Some error occured while saving banner.'];
                return redirect()->back()->withNotify($notify);
            }

            Log::info(["Service" => $service]);
            $notify[] = ['success', 'Service Banner Saved Successfully.'];
            $step='step-4';
            if(is_null($service->number_of_simultaneous_projects)){
                $step='step-5';

            }
            return redirect()->route('user.service.create', ['id' => $service->id, 'view' => $step])->withNotify($notify);

        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }
    
    public function storeProposal(ServiceProposalRequest $request){
        try {
            
            $serviceId = $request->get('service_id');
            if (empty($serviceId)) {
                $notify[] = ['error', 'Recently Created Service is missing.'];
                return redirect()->back()->withNotify($notify);
            }

            $service = Service::FindOrFail($serviceId);

            if ($service->banner) {
                $this->saveProposal($request->all(), $service, Attribute::SERVICE);
                $notify[] = ['success', 'Service Proposal Saved Successfully.'];
                Log::info(["Service" => $service]);
                return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-5'])->withNotify($notify);
            } else {
                $notify[] = ['error', 'Please complete the service banners step first.'];
                return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-3'])->withNotify($notify);
            }
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }

    }

    public function storeRequirements(ClientRequest $request)
    {
        try {
            $serviceId = $request->get('service_id');

            if (empty($serviceId)) {
                $notify[] = ['error', 'Recently Created Service is missing.'];
                return redirect()->back()->withNotify($notify);
            }

            $service = Service::FindOrFail($serviceId);
            if ($service->defaultProposal) {
                $this->saveRequirements($request, $service, Attribute::SERVICE);
                $notify[] = ['success', 'Service Requirements Saved Successfully.'];
                Log::info(["Service" => $service]);
                return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-6'])->withNotify($notify);
            } else {
                $notify[] = ['error', 'Please complete the service proposal step first.'];
                return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-4'])->withNotify($notify);
            }
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }

    }

    public function storeReview(ReviewRequest $request)
    {
        try {

            if (empty($request->get('service_id'))) {
                $notify[] = ['error', 'Recently Created Service is missing.'];
                return redirect()->route('user.service.create', ['view' => 'step-1'])->withNotify($notify);
            }

            $service = Service::FindOrFail($request->get('service_id'));

            if ($service->banner && $service->defaultProposal) {

                $this->saveReview($request, $service, Attribute::SERVICE, 'Service', 'service');
                $this->ServiceAddConfirmationMail($service);
                Log::info(["Service" => $service]);
                $notify[] = ['success', 'Service Review Saved Successfully.'];
                return redirect()->route('user.service.index')->withNotify($notify);

            } else if($service->banner && !$service->defaultProposal) {

                $notify[] = ['error', 'Please complete the proposal steps first.'];
                return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-4'])->withNotify($notify);
            }
            else if(!$service->banner){
                $notify[] = ['error', 'Please complete the banner steps first.'];
                return redirect()->route('user.service.create', ['id' => $service->id, 'view' => 'step-3'])->withNotify($notify);
            }

        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }

        $service = Service::FindOrFail($request->get('service_id'));

        if($service->requirement_for_client) {

            $notify[] = ['error', 'Please complete the previous steps first.'];
            return redirect()->route('user.service.create', ['id'=> $service->id, 'view' => 'step-1'])->withNotify($notify);
        }
        else{
            
            $this->saveReview($request, $service, Attribute::SERVICE, 'Service', 'service');
            $this->ServiceAddConfirmationMail($service);
            $notify[] = ['success', 'Service Review Saved Successfully.'];
            return redirect()->route('user.service.index')->withNotify($notify);
        }
    }


    public function optionalImageRemove(Request $request)
    {
        try {
            $optional = OptionalImage::findOrFail(decrypt($request->id));
            $path = imagePath()['optionalService']['path'];
            $file_remove = $path . '/' . $optional->image;
            removeFile($file_remove);
            $optional->delete();
            Log::info(["Optional" => $optional]);
            $notify[] = ['success', 'Image has been deleted.'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
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
        try {

            $service = Service::withAll()->findOrFail($id);
            
            $service->deliverable()->detach();
            $service->tags()->detach();
            $service->serviceSteps()->delete();
            $this->deleteBannerLogos($service);
            $service->banner()->delete();
            $service->features()->detach();
            $service->delete();

            $notify[] = ['success', 'Service has been Deleted Successfully.'];
            Log::info(["Service" => $service]);
            return back()->withNotify($notify);

        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
            $notify[] = ['error', 'Failled to delete Service'];
            return redirect()->back()->withNotify($notify);

        }
    }

    public function ServiceAddConfirmationMail($service)
    {
        try {
            Mail::to($service->user->email)->send(new serviceaddonMail($service));
            Log::info(["Service email sent to" => $service->user->email]);
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }
}
