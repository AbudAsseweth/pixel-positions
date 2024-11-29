<?php

namespace App\Http\Controllers;

use App\Enums\JobSchedule;
use App\Models\Job;
use App\Http\Requests\UpdateJobRequest;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Validation\Rule;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allJob = Job::with(['tags', 'employer'])->latest()->get()->groupBy('featured');
        $jobs = $allJob[0];
        $featuredJobs = $allJob[1];
        $tags = Tag::all();

        return view("jobs.index", compact("jobs", "tags", 'featuredJobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tags = Tag::query()->select("id", "name")->get();
        return view("jobs.create", compact("tags"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attrs = $request->validate([
            "title" => "required",
            "salary" => "required",
            "location" => "required",
            "schedule" => ['required', Rule::enum(JobSchedule::class)],
            "tags" => "array|required",
            "url" => 'required',
        ]);

        $attrs['featured'] = $request->has("featured");
        $attrs = Arr::except($attrs, ['tags']);

        $job = $request->user()->employer->jobs()->create($attrs);
        $job->tags()->attach($request->tags);

        return to_route("home");
    }

    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateJobRequest $request, Job $job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
    }
}
