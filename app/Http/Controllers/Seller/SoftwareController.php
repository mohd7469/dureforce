<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\OverviewRequest;
use App\Http\Requests\ReviewRequest;
use App\Http\Requests\SoftwareProposalRequest;
use App\Models\Attribute;
use App\Models\EntityField;
use App\Models\Features;
use App\Models\OptionalImage;
use App\Models\Software\Software;
use App\Traits\CreateOrUpdateEntity;
use App\Traits\DeleteEntity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class SoftwareController extends Controller
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
            $pageTitle = "Manage Software";
            $emptyMessage = "No data found";
            $softwares = Software::where('user_id', $user->id)->latest()->paginate(getPaginate());
            Log::info(["Software" => $softwares]);
            return view($this->activeTemplate . 'user.seller.software.index', compact('pageTitle', 'softwares', 'emptyMessage'));
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }

    }

    public function create($id = null)
    {
        try {
            $pageTitle = "Create software";
            $empty='';
            $completed='completed';
            $completedOverview = $completedBanner = $completedPricing = $completedProposal =$completedRequirements = $completedReview = $empty;

            $features = Features::latest()->get();
            $software = null;

            if ($id) {
                $software = Software::WithAll()->findOrFail($id);
                $completedOverview = $software->title ? $completed : $empty;
                $completedPricing = $software->price > 0 ? $completed : $empty;
                $completedBanner = $software->banner ? $completed : $empty;
                $completedProposal = $software->defaultProposal ? $completed : $empty;
                $completedRequirements = $software->is_requirement_for_client_added ? $completed : $empty;
                $completedReview = $software->number_of_simultaneous_projects > 0 ? $completed : $empty;

            }
            Log::info(["features" => $features]);

            return view($this->activeTemplate . 'user.seller.software.create', compact(
                'pageTitle',
                'features',
                'completedOverview',
                'completedPricing',
                'completedBanner',
                'completedProposal',
                'completedRequirements',
                'completedReview',
                'software'
            ));

        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }

    public function storeOverview(OverviewRequest $request)
    {
        try {
            $softwareId = $request->get('software_id');
            if (!empty($softwareId)) {
                $software = Software::FindOrFail($softwareId);
            } else {
                $software = new Software();
            }

            $this->saveOverview($request, $software, $softwareId, Attribute::SOFTWARE);
            Log::info(["Software" => $software]);
            $notify[] = ['success', 'Software Overview has been Saved.'];
            return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-2'])->withNotify($notify);

        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }

    public function storePricing(Request $request)
    {
        try {
            $softwareId = $request->get('software_id');

            if (empty($softwareId)) {
                $notify[] = ['error', 'Recently Created Software is missing.'];
                return redirect()->back()->withNotify($notify);
            }

            $software = Software::FindOrFail($softwareId);

            $this->savePricing($request, $software, Attribute::SOFTWARE);
            Log::info(["Software" => $software]);
            $notify[] = ['success', 'Software Pricing Saved Successfully.'];
            return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-3'])->withNotify($notify);
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }

    public function storeBanner(Request $request)
    {
        try {
            $softwareId = $request->get('software_id');

            if (empty($softwareId)) {
                $notify[] = ['error', 'Recently Created Software is missing.'];
                return redirect()->back()->withNotify($notify);
            }

            $software = Software::FindOrFail($softwareId);

            if ($software->price < 1) {
                $notify[] = ['error', 'Please complete the software pricing first.'];
                return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-2'])->withNotify($notify);
            } else {
                $result = $this->saveBanner($request, $software, Attribute::SOFTWARE, 'software', 'optionalSoftware');

                if (!$result) {
                    $notify[] = ['error', 'Some error occured while saving banner.'];
                    return redirect()->back()->withNotify($notify);
                }
            }

            Log::info(["Software" => $software]);
            $notify[] = ['success', 'Software Banner Saved Successfully.'];
            $step='step-4';
            if(is_null($software->max_no_projects)){
                $step='step-5';

            }
            return redirect()->route('user.software.create', ['id' => $software->id, 'view' => $step])->withNotify($notify);
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }
    public function storeProposal(SoftwareProposalRequest $request){
        try {
           
            $softwareId = $request->get('software_id');
            if (empty($request->get('software_id'))) {
                $notify[] = ['error', 'Recently Created Software is missing.'];
                return redirect()->route('user.software.create', ['view' => 'step-1'])->withNotify($notify);
            }

            $software = Software::FindOrFail($softwareId);

            if ($software->banner) {

                $this->saveProposal($request->all(), $software, Attribute::SOFTWARE);
                $notify[] = ['success', 'Software Proposal Saved Successfully.'];
                Log::info(["Software" => $software]);
                return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-5'])->withNotify($notify);
                
            } else {
                $notify[] = ['error', 'Please complete the software banners step first.'];
                return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-3'])->withNotify($notify);
            }
        } catch (\Exception $exp) {
            // Log::error([$exp->getMessage()]);
            errorLogMessage($exp);
        }

    }
    public function storeRequirements(ClientRequest $request)
    {
        try {
            $softwareId = $request->get('software_id');

            if (empty($softwareId)) {
                $notify[] = ['error', 'Recently Created Software is missing.'];
                return redirect()->back()->withNotify($notify);
            }

            $software = Software::FindOrFail($softwareId);

            if (!$software->defaultProposal) {
                $notify[] = ['error', 'Please complete the software banners first.'];
                return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-4'])->withNotify($notify);
            }

            $this->saveRequirements($request, $software, Attribute::SOFTWARE);
            Log::info(["Software" => $software]);
            $notify[] = ['success', 'Software Requirements Saved Successfully.'];
            return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-6'])->withNotify($notify);
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
    }

    public function storeReview(ReviewRequest $request)
    {
        try {
            if (empty($request->get('software_id'))) {
                $notify[] = ['error', 'Recently Created Software is missing.'];
                return redirect()->route('user.software.create', ['view' => 'step-1'])->withNotify($notify);
            }

            $software = Software::FindOrFail($request->get('software_id'));

            if ($software->banner && $software->defaultProposal)  {
                
                $this->saveReview($request, $software, Attribute::SOFTWARE, 'Software', 'software');
                Log::info(["Software" => $software]);
                $notify[] = ['success', 'Software Review Saved Successfully.'];
                return redirect()->route('user.software.index')->withNotify($notify);
                
            }
            else if($software->banner && !$software->defaultProposal) {
                
                $notify[] = ['error', 'Please complete the proposal steps first.'];
                return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-4'])->withNotify($notify);

            }
            else if(!$software->banner){

                $notify[] = ['error', 'Please complete the banner steps first.'];
                return redirect()->route('user.software.create', ['id' => $software->id, 'view' => 'step-3'])->withNotify($notify);
                
            }
            
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        } 
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

    public function show($uuid)
    {
        try {
            $emptyMessage = "No data found";
            $pageTitle = "Software details";
            $software = Software::withAll()->where('uuid', $uuid)->firstOrFail();
            $software->views += 1;
            $software->save();
            $related_softwares = Software::withAll()->where('category_id', $software->category_id)->where('sub_category_id', $software->sub_category_id)->where('id', '<>', $software->id)->where('status_id', Software::STATUSES['APPROVED'])->latest()->limit(4)->get();
            Log::info(["Software" => $software, "Related Software" => $related_softwares]);
            $is_software_steps = false;
            foreach ($software->softwareSteps as $key => $step) {
                if($step->name != '' || $step->description!= ''){
                    $is_software_steps=true;
                }
            }
            return view($this->activeTemplate . 'software_details', compact('pageTitle', 'software', 'related_softwares', 'emptyMessage','is_software_steps'));
        } catch (\Exception $exp) {
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
        }
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
        try {
            $software = Software::withAll()->find($id);
            Log::info(["Software Deleted " => $software]);

            $software->deliverable()->detach();
            $software->tags()->detach();
            $software->softwareSteps()->delete();
            // $software->features()->delete();
            $this->deleteBannerLogos($software);
            $software->banner()->delete();
            $software->modules()->delete();
            $software->delete();

            $notify[] = ['success', 'Software has been deleted successfully.'];
            return back()->withNotify($notify);
        } catch (\Exception $exp) {
            
            // Log::error($exp->getMessage());
            errorLogMessage($exp);
            $notify[] = ['error', 'Failled to delete Software'];
            return redirect()->back()->withNotify($notify);
        }
    }

}
