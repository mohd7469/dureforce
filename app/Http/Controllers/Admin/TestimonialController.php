<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTestimonial;
use App\Models\Proposal;
use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\Skills;
use App\Models\SkillCategory;
use App\Models\Category;
use Carbon\Carbon;
use App\Models\JobBiding;
use App\Traits\DeleteEntity;
use Illuminate\Support\Facades\DB;

class TestimonialController extends Controller
{    use DeleteEntity;


    public function index()
    {
        $pageTitle = "Manage All Testimonials";
        $emptyMessage = "No data found";
        $testimonials = UserTestimonial::orderBy('id', 'DESC')->paginate(getPaginate());
        return view('admin.testimonial.index', compact('pageTitle', 'emptyMessage', 'testimonials'));
    }
    public function pending()
    {
        $pageTitle = "Pending Testimonial";
        $emptyMessage = "No data found";
        $testimonials = UserTestimonial::where('status_id', 36)->orderBy('id', 'DESC')->paginate(getPaginate());
        return view('admin.testimonial.index', compact('pageTitle', 'emptyMessage', 'testimonials'));
    }
    public function approved()
    {
        $pageTitle = "Approved Testimonial";
        $emptyMessage = "No data found";
        $testimonials = UserTestimonial::where('status_id', 38)->orderBy('id', 'DESC')->paginate(getPaginate());
        return view('admin.testimonial.index', compact('pageTitle', 'emptyMessage', 'testimonials'));
    }
    public function waiting()
    {
        $pageTitle = "Waiting Response Testimonial";
        $emptyMessage = "No data found";
        $testimonials = UserTestimonial::where('status_id', 37)->orderBy('id', 'DESC')->paginate(getPaginate());
        return view('admin.testimonial.index', compact('pageTitle', 'emptyMessage', 'testimonials'));
    }

    public function rejected()
    {
        $pageTitle = "Rejected Testimonial";
        $emptyMessage = "No data found";
        $testimonials = UserTestimonial::where('is_approved', 39)->orderBy('id', 'DESC')->paginate(getPaginate());
        return view('admin.testimonial.index', compact('pageTitle', 'emptyMessage', 'testimonials'));
    }
    public function closedBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $testimonial = UserTestimonial::findOrFail($request->id);
        $testimonial->status_id = 39;
        $testimonial->is_active = 0;
        $testimonial->created_at = Carbon::now();
        $testimonial->save();
        $notify[] = ['success', 'Testimonial has been closed'];
        return redirect()->back()->withNotify($notify);
    }
    public function approvedBy(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:jobs,id'
        ]);
        $testimonial = UserTestimonial::findOrFail($request->id);
        $testimonial->status_id = 38;
        $testimonial->is_active = 1;
        $testimonial->created_at = Carbon::now();
        $testimonial->save();
        $notify[] = ['success', 'Testimonial has been approved'];
        return redirect()->back()->withNotify($notify);
    }

    public function details($uuid)
    {
        $pageTitle = "Testimonial Details";
        $testimonial = UserTestimonial::where('uuid', $uuid)->firstOrFail();
        $useId=$testimonial->user_id;
        $user=User::where('id',$useId)->firstOrFail();
        return view('admin.testimonial.details', compact('pageTitle', 'testimonial','user'));
    }

}
