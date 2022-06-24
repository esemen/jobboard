<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Currency;
use App\Models\Industry;
use App\Models\Job;
use App\Models\JobType;
use App\Models\SalaryType;
use Illuminate\Http\Request;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $representations = auth()->user()->representations;

        if ($representations->count() == 0) {
            return redirect(route('company.create'));
        } else {
            $job = new Job();

            $jobTypes = JobType::all();
            $salaryTypes = SalaryType::all();
            $currencies = Currency::all();
            $industries = Industry::all();

            $job->company()->associate($representations[0]->company_id);

            return response()->view('recruiter.job.job-form', [
                'job' => $job,
                'representations' => $representations,
                'jobTypes' => $jobTypes,
                'salaryTypes' => $salaryTypes,
                'currencies' => $currencies,
                'industries' => $industries

            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param JobRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JobRequest $request)
    {
        return redirect(route('home'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
