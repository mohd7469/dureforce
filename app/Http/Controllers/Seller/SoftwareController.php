<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\OverviewRequest;
use App\Http\Requests\ReviewRequest;
use App\Models\Attribute;
use App\Models\EntityField;
use App\Models\Features;
use App\Models\OptionalImage;
use App\Models\Software\Software;
use App\Traits\CreateOrUpdateEntity;
use App\Traits\DeleteEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SoftwareController extends Controller
{
    use DeleteEntity, CreateOrUpdateEntity;

    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }

    public function index()
    {
        $user = Auth::user();
        $pageTitle = "Manage Software";
        $emptyMessage = "No data found";
        $softwares = Software::where('user_id', $user->id)->latest()->paginate(getPaginate());

        return view($this->activeTemplate . 'user.seller.software.index', compact('pageTitle', 'softwares', 'emptyMessage'));
    }

    public function create($id = null)
    {
        $pageTitle = "Create software";
        $completedOverview = '';
        $completedPricing = '';
        $completedImage = '';
        $completedRequirements = '';
        $completedReview = '';

        $features = Features::latest()->get();
        $software = null;

        if (! empty($id) || $id > 0) {
            $software = Software::withAll()->findOrFail($id);

            $completedOverview = $software->title !='' ? 'completed' : '';
            $completedPricing = $software->rate_per_hour > 0 ? 'completed' : '';
            $completedBanner = $software->banner ? 'completed' : '';
            $completedRequirements = $software->requirement_for_client ? 'completed' : '';
            $completedReview = !empty($software->number_of_simultaneous_projects)   ? 'completed' : '';
        }

        return view($this->activeTemplate . 'user.seller.software.create', compact(
            'pageTitle',
            'features',
            'completedOverview',
            'completedPricing',
            'completedImage',
            'completedRequirements',
            'completedReview',
            'software'
        ));
    }

    public function storeOverview(OverviewRequest $request)
    {
        $softwareId = $request->get('software_id');
        if(! empty($softwareId)) {
            $software = Software::FindOrFail($softwareId);
        } else {
            $software = new Software();
        }

        $this->saveOverview($request, $software, $softwareId, Attribute::SOFTWARE);

        $notify[] = ['success', 'Software Overview has been Saved.'];
        return redirect()->route('user.software.create', ['id'=> $software->id, 'view' => 'step-2'])->withNotify($notify);
    }

    public function storePricing(Request $request)
    {
        $softwareId = $request->get('software_id');

        if(empty($softwareId)) {
            $notify[] = ['error', 'Recently Created Software is missing.'];
            return redirect()->back()->withNotify($notify);
        }

        $software = Software::FindOrFail($softwareId);

        $this->savePricing($request, $software, Attribute::SOFTWARE);

        $notify[] = ['success', 'Software Pricing Saved Successfully.'];
        return redirect()->route('user.software.create', ['id'=> $software->id, 'view' => 'step-3'])->withNotify($notify);
    }

    public function storeBanner(Request $request)
    {
        $softwareId = $request->get('software_id');

        if(empty($softwareId)) {
            $notify[] = ['error', 'Recently Created Software is missing.'];
            return redirect()->back()->withNotify($notify);
        }

        $software = Software::FindOrFail($softwareId);

        $result = $this->saveBanner($request, $software, Attribute::SOFTWARE, 'software', 'optionalSoftware');

        if(!$result) {
            $notify[] = ['error', 'Some error occured while saving banner.'];
            return redirect()->back()->withNotify($notify);
        }

        if($software->amount == 0) {
            $notify[] = ['error', 'Please complete the software pricing first.'];
            return redirect()->route('user.software.create', ['id'=> $software->id, 'view' => 'step-2'])->withNotify($notify);
        }

        $notify[] = ['success', 'Software Banner Saved Successfully.'];
        return redirect()->route('user.software.create', ['id'=> $software->id, 'view' => 'step-4'])->withNotify($notify);
    }

    public function storeRequirements(ClientRequest $request)
    {
        $softwareId = $request->get('software_id');

        if(empty($softwareId)) {
            $notify[] = ['error', 'Recently Created Software is missing.'];
            return redirect()->back()->withNotify($notify);
        }

        $software = Software::FindOrFail($softwareId);

        if(empty($software->image)) {
            $notify[] = ['error', 'Please complete the software banners first.'];
            return redirect()->route('user.software.create', ['id'=> $software->id, 'view' => 'step-3'])->withNotify($notify);
        }

        $this->saveRequirements($request, $software, Attribute::SOFTWARE);

        $notify[] = ['success', 'Software Requirements Saved Successfully.'];
        return redirect()->route('user.software.create', ['id'=> $software->id, 'view' => 'step-5'])->withNotify($notify);
    }

    public function storeReview(ReviewRequest $request)
    {
        if(empty($request->get('software_id')))
        {
            $notify[] = ['error', 'Recently Created Software is missing.'];
            return redirect()->route('user.software.create', ['view' => 'step-1'])->withNotify($notify);
        }

        $software = Software::FindOrFail($request->get('software_id'));

        if(empty($software->image) && $software->price == 0) {
            $notify[] = ['error', 'Please complete the previous steps first.'];
            return redirect()->route('user.software.create', ['id'=> $software->id, 'view' => 'step-1'])->withNotify($notify);
        }

        $this->saveReview($request, $software, Attribute::SOFTWARE, 'Software', 'software');

        $notify[] = ['success', 'Software Review Saved Successfully.'];
        return redirect()->route('user.software.index')->withNotify($notify);
    }


    public function softwareFileDownload($softwareId)
    {
        $user = Auth::user();
        $software = Software::where('id', decrypt($softwareId))->where('user_id', $user->id)->firstOrFail();
        $file = $software->upload_software;
        $path = imagePath()['uploadSoftware']['path'];
        $full_path = $path . '/' . $file;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $mimetype = mime_content_type($full_path);
        header('Content-Disposition: softwareFile; filename="' . $file . '.' . $ext . '";');
        header("Content-Type: " . $mimetype);
        return readfile($full_path);
    }


    public function softwareDocumentFile($softwareId)
    {
        $user = Auth::user();
        $software = Software::where('id', decrypt($softwareId))->where('user_id', $user->id)->firstOrFail();
        $file = $software->document_file;
        $path = imagePath()['document']['path'];
        $full_path = $path . '/' . $file;
        $ext = pathinfo($file, PATHINFO_EXTENSION);
        $mimetype = mime_content_type($full_path);
        header('Content-Disposition: softwareFile; filename="' . $file . '.' . $ext . '";');
        header("Content-Type: " . $mimetype);
        return readfile($full_path);
    }


    private function screenshotImageStore($request, $screenshot, $softwareId)
    {
        foreach ($screenshot as $index => $optional) {
            $optionals = new OptionalImage();
            $optionals->software_id = $softwareId;
            $path = imagePath()['screenshot']['path'];
            $size = imagePath()['screenshot']['size'];
            if ($request->hasFile('screenshot')) {
                $file = $optional;
                try {
                    $filename = uploadImage($file, $path, $size);
                } catch (\Exception $exp) {
                    $notify[] = ['error', 'Image could not be uploaded.'];
                    return back()->withNotify($notify);
                }
                $optionals->caption = $request->get("optional_image_text")[$index];
                $optionals->image = $filename;
            }
            $optionals->save();
        }
    }

    public function destroy($id)
    {
        $this->deleteEntity(Software::class, 'software', $id);

        $notify[] = ['success', 'software has been uploaded.'];
        return back()->withNotify();
    }

}
