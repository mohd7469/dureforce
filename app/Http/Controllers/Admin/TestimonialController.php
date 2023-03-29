<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        $testimonials = UserTestimonial::latest()->paginate(getPaginate());
        return view('admin.testimonial.index', compact('pageTitle', 'emptyMessage', 'testimonials'));
    }
    public function pending()
    {
        $pageTitle = "Pending Testimonial";
        $emptyMessage = "No data found";
        $testimonials = UserTestimonial::where('is_approved', 0)->latest()->paginate(getPaginate());
        return view('admin.testimonial.index', compact('pageTitle', 'emptyMessage', 'testimonials'));
    }

    public function approved()
    {
        $pageTitle = "Approved Testimonial";
        $emptyMessage = "No data found";
        $testimonials = UserTestimonial::where('is_approved', 1)->latest()->paginate(getPaginate());
        return view('admin.testimonial.index', compact('pageTitle', 'emptyMessage', 'testimonials'));
    }

}
