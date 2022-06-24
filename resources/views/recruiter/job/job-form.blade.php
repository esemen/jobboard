@extends('layouts.app')
@section('content')
    <x-layouts.page-breadcrumb-section title="New Job">
        {{ $job->company->name }}
    </x-layouts.page-breadcrumb-section>

    <div class="my-12">
        <form method="post" action="{{ route('job.index') }}" class="flex flex-col space-y-6 px-6 md:p-0">
            @csrf
            <section class="container grid grid-cols-1 lg:grid-cols-2 gap-6">
                <div>
                    <x-form.select-input id="jobType" name="job_type_id" label="Job Type" :items="$jobTypes"
                                         class="px-4 py-3.5 h-full w-full"
                                         :value="old('job_type_id')">
                        @error('job_type_id')
                        {{ $message }}
                        @enderror
                    </x-form.select-input>

                    <x-form.text-input name="title" placeholder="" class="p-4 h-full w-full" label="Job Title"
                                       value="{{ old('title') }}">
                        <x-slot name="icon"><i class="las la-user text-2xl text-gray-500"></i></x-slot>
                        @error('title')
                        {{ $message }}
                        @enderror
                    </x-form.text-input>
                </div>
                <div>
                    <x-form.select-input id="industry" name="industry_id" label="Industry"
                                         :items="$industries"
                                         class="px-4 py-3.5 h-full w-full"
                                         :value="old('industry_id')">
                        @error('industry_id')
                        {{ $message }}
                        @enderror
                    </x-form.select-input>

                    <div class="grid grid-cols-4 space-x-2">
                        <x-form.select-input id="salaryType" name="salary_type_id" label="Salary / Rate"
                                             :items="$salaryTypes"
                                             class="px-4 py-3.5 h-full w-full"
                                             :value="old('salary_type_id')">
                            @error('salary_type_id')
                            {{ $message }}
                            @enderror
                        </x-form.select-input>
                        <x-form.select-input id="currency" name="currency" label="Currency"
                                             :items="$currencies"
                                             class="px-4 py-3.5 h-full w-full"
                                             :value="old('currency')">
                            @error('salary_type_id')
                            {{ $message }}
                            @enderror
                        </x-form.select-input>
                        <x-form.text-input name="salary_min" placeholder="" class="p-4 h-full w-full" label="Min"
                                           value="{{ old('salary_min') }}">
                            @error('salary_min')
                            {{ $message }}
                            @enderror
                        </x-form.text-input>

                        <x-form.text-input name="salary_max" placeholder="" class="p-4 h-full w-full" label="Max"
                                           value="{{ old('salary_max') }}">
                            @error('salary_max')
                            {{ $message }}
                            @enderror
                        </x-form.text-input>
                    </div>
                </div>
            </section>
            <section class="container">
                <x-form.text-area id="jobDescription" name="description" placeholder="" class="p-4 h-48 w-full"
                                  label="Job Description">
                    @error('description')
                    {{ $message }}
                    @enderror
                </x-form.text-area>

                <x-form.standard-button class="mt-4 w-full">
                    Create Job
                </x-form.standard-button>
            </section>

        </form>
    </div>
@endsection
