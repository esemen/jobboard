@extends('layouts.dashboard')

@section('mainPanel')
    <form method="post">
        @csrf
        @method('patch')
        <x-form.section-title>Personal Details</x-form.section-title>
        <hr class="my-2"/>
        <div class="grid xl:grid-cols-2 xl:gap-8">
            <div>
                <x-form.text-input id="name" name="name" placeholder="" label="Name" required
                                   class="px-4 py-3 h-full w-full"
                                   :value="old('name', auth()->user()->name)">
                    @error('name')
                    {{ $message }}
                    @enderror
                </x-form.text-input>

                <x-form.text-input id="phone" name="phone" placeholder="" label="Phone"
                                   class="px-4 py-3 h-full w-full"
                                   :value="old('phone', auth()->user()->phone)">
                    @error('phone')
                    {{ $message }}
                    @enderror
                </x-form.text-input>

                <x-form.text-input id="email" name="email" disabled="disabled" placeholder="" label="Email"
                                   class="px-4 py-3 h-full w-full"
                                   :value="old('email', auth()->user()->email)">
                    @error('phone')
                    {{ $message }}
                    @enderror
                </x-form.text-input>
            </div>

            <div>
                <x-form.text-input id="postcode" name="postcode" placeholder="" label="Postcode"
                                   class="px-4 py-3 h-full w-full"
                                   :value="old('postcode', auth()->user()->postcode)">
                    @error('postcode')
                    {{ $message }}
                    @enderror
                </x-form.text-input>

                <x-form.text-input id="town" name="town" placeholder="" label="Town"
                                   class="px-4 py-3 h-full w-full"
                                   :value="old('town', auth()->user()->town)">
                    @error('town')
                    {{ $message }}
                    @enderror
                </x-form.text-input>

                <x-form.text-input id="city" name="city" placeholder="" label="City / County"
                                   class="px-4 py-3 h-full w-full"
                                   :value="old('city', auth()->user()->city)">
                    @error('city')
                    {{ $message }}
                    @enderror
                </x-form.text-input>

                <x-form.select-input id="country" name="country_id" label="Country" :items="$countries"
                                     class="px-4 py-3 h-full w-full"
                                     :value="old('country_id', auth()->user()->country_id )">
                    @error('country_id')
                    {{ $message }}
                    @enderror
                </x-form.select-input>
            </div>
        </div>

        @if(false)
            <x-form.section-title class="mt-8">Job Details</x-form.section-title>
            <hr class="my-2"/>
            <div class="col-span-4 md:col-span-2 px-2">
                <label class="block">
                    <span class="text-gray-700">Job Type</span>
                    <select class="form-select block w-full mt-1 border-2 rounded p-2">
                        <option>Permanent</option>
                        <option>Temporary</option>
                        <option>Contract</option>
                        <option>Part Time</option>
                        <option>Internship</option>
                    </select>
                </label>
                <label class="block">
                    <span class="text-gray-700">Job Title</span>
                    <input class="form-input mt-2 block w-full border-2 rounded p-2">
                </label>
                <label class="block">
                    <span class="text-gray-700">Expected Salary</span>
                    <select class="form-select block w-full mt-1 border-2 rounded p-2">
                        <option value="1" id="salary.1">£1 - £10,000</option>
                        <option value="2" id="salary.2">£10,001 - £15,000</option>
                        <option value="3" id="salary.3">£15,001 - £20,000</option>
                        <option value="4" id="salary.4">£20,001 - £25,000</option>
                        <option value="5" id="salary.5">£25,001 - £30,000</option>
                        <option value="6" id="salary.6" selected="selected">£30,001 - £40,000</option>
                        <option value="7" id="salary.7">£40,001 - £60,000</option>
                        <option value="8" id="salary.8">£60,001 - £80,000</option>
                        <option value="9" id="salary.9">£80,001 - £100,000</option>
                        <option value="10" id="salary.10">£100,001 - £120,000</option>
                        <option value="11" id="salary.11">£120,001+</option>
                    </select>
                </label>
                <label class="block">
                    <span class="text-gray-700">Last Name</span>
                    <input class="form-input mt-2 block w-full border-2 rounded p-2">
                </label>
                <label class="block">
                    <span class="text-gray-700">Town/City</span>
                    <input class="form-input mt-2 block w-full border-2 rounded p-2">
                </label>
                <label class="block">
                    <span class="text-gray-700">County/Location</span>
                    <input class="form-input mt-2 block w-full border-2 rounded p-2">
                </label>
            </div>
            <div class="col-span-4 md:col-span-2 px-2">
                <label class="block">
                    <span class="text-gray-700">Industry</span>
                    <select class="form-select block w-full mt-1 border-2 rounded p-2">
                        <option value="" id="industries.0"></option>
                        <option value="1" id="industries.1">Accountancy</option>
                        <option value="2" id="industries.2">Administration</option>
                        <option value="3" id="industries.3">Advertising</option>
                        <option value="4" id="industries.4">Aerospace/Aviation/Defence</option>
                        <option value="5" id="industries.5">Agriculture</option>
                        <option value="6" id="industries.6">Architecture</option>
                        <option value="7" id="industries.7">Art/Design/Graphics</option>
                        <option value="8" id="industries.8">Automotive</option>
                        <option value="9" id="industries.9">Banking</option>
                        <option value="10" id="industries.10">Biotechnology</option>
                        <option value="37" id="industries.11">Catering &amp; Food Services</option>
                        <option value="14" id="industries.12">Charity/Voluntary/Non Profit</option>
                        <option value="19" id="industries.13">Construction</option>
                        <option value="20" id="industries.14">Consultancy</option>
                        <option value="21" id="industries.15">Counselling</option>
                        <option value="22" id="industries.16">Customer service</option>
                        <option value="24" id="industries.17">Dental</option>
                        <option value="26" id="industries.18">Driving</option>
                        <option value="27" id="industries.19">Education</option>
                        <option value="28" id="industries.20">Electrical</option>
                        <option value="29" id="industries.21">Electronic</option>
                        <option value="30" id="industries.22">Emergency</option>
                        <option value="32" id="industries.23">Engineering</option>
                        <option value="33" id="industries.24">Entertainment</option>
                        <option value="35" id="industries.25">Fashion</option>
                        <option value="36" id="industries.26">Financial</option>
                        <option value="102" id="industries.27">Graduate</option>
                        <option value="99" id="industries.28">Health &amp; Safety</option>
                        <option value="41" id="industries.29">Health medical</option>
                        <option value="43" id="industries.30">Home worker</option>
                        <option value="44" id="industries.31">Hotel/Hospitality</option>
                        <option value="45" id="industries.32">Human-resources &amp; Employment</option>
                        <option value="51" id="industries.33">IT/Internet/Technical</option>
                        <option value="46" id="industries.34">Import export</option>
                        <option value="47" id="industries.35">Industrial</option>
                        <option value="49" id="industries.36">Insurance</option>
                        <option value="52" id="industries.37">Journalism</option>
                        <option value="53" id="industries.38">Legal</option>
                        <option value="54" id="industries.39">Leisure</option>
                        <option value="56" id="industries.40">Management &amp; Executive</option>
                        <option value="57" id="industries.41">Manufacturing</option>
                        <option value="58" id="industries.42">Marketing &amp; PR</option>
                        <option value="59" id="industries.43">Mechanical</option>
                        <option value="60" id="industries.44">Media/Creative/Digital</option>
                        <option value="63" id="industries.45">Nursing</option>
                        <option value="100" id="industries.46">Oil &amp; Gas/Energy</option>
                        <option value="64" id="industries.47">Other</option>
                        <option value="65" id="industries.48">Packaging</option>
                        <option value="66" id="industries.49">Pharmaceutical</option>
                        <option value="67" id="industries.50">Photography</option>
                        <option value="69" id="industries.51">Printing</option>
                        <option value="71" id="industries.52">Property</option>
                        <option value="98" id="industries.53">Public sector</option>
                        <option value="73" id="industries.54">Publishing</option>
                        <option value="74" id="industries.55">Purchasing</option>
                        <option value="96" id="industries.56">Recruitment</option>
                        <option value="77" id="industries.57">Retail</option>
                        <option value="78" id="industries.58">Sales</option>
                        <option value="101" id="industries.59">Scientific</option>
                        <option value="79" id="industries.60">Secretarial &amp; PA</option>
                        <option value="80" id="industries.61">Security</option>
                        <option value="81" id="industries.62">Social services</option>
                        <option value="82" id="industries.63">Teaching</option>
                        <option value="84" id="industries.64">Telecomms</option>
                        <option value="86" id="industries.65">Textiles</option>
                        <option value="87" id="industries.66">Trades - Skilled &amp; Unskilled</option>
                        <option value="89" id="industries.67">Transport &amp; Logistics</option>
                        <option value="90" id="industries.68">Travel &amp; Tourism</option>
                        <option value="91" id="industries.69">Utilities &amp; Installation</option>
                        <option value="92" id="industries.70">Warehouse</option>
                        <option value="93" id="industries.71">Waste management</option>
                    </select>
                    </select>
                </label>
                <label class="block">
                    <span class="text-gray-700">Prepared to travel</span>
                    <select class="form-select block w-full mt-1 border-2 rounded p-2">
                        <option value="1" id="travel_distance.0">up to 10 miles</option>
                        <option value="2" id="travel_distance.1" selected="selected">up to 20 miles</option>
                        <option value="3" id="travel_distance.2">up to 35 miles</option>
                        <option value="4" id="travel_distance.3">up to 50 miles</option>
                        <option value="5" id="travel_distance.4">up to 100 miles</option>
                        <option value="6" id="travel_distance.5">up to 200 miles</option>
                        <option value="0" id="travel_distance.6">Anywhere</option>
                    </select>
                </label>
                <label class="block">
                    <span class="text-gray-700">Mail</span>
                    <input class="form-input mt-2 block w-full border-2 rounded p-2">
                </label>
                <label class="block">
                    <span class="text-gray-700">Age</span>
                    <input class="form-input mt-2 block w-full border-2 rounded p-2">
                </label>
            </div>
        @endif

        <x-form.standard-button class="mt-4 w-full">
            Save Changes
        </x-form.standard-button>

        {{--                    <div class="col-span-2">--}}
        {{--                        <button type="button"--}}
        {{--                                class="ml-5 mt-4 bg-red-600 py-2 px-3 border border-gray-300 rounded-md shadow-md text-md font-medium text-white hover:bg-red-400 w-full">--}}
        {{--                            Link/Unlink Google--}}
        {{--                        </button>--}}
        {{--                    </div>--}}

        {{--                    <div class="col-span-2">--}}
        {{--                        <button type="button"--}}
        {{--                                class="ml-5 mt-4 bg-blue-600 py-2 px-3 border border-gray-300 rounded-md shadow-md text-md font-medium text-white hover:bg-blue-400 w-full">--}}
        {{--                            Link/Unlink Linkedin--}}
        {{--                        </button>--}}
        {{--                    </div>--}}

    </form>
@endsection

@section('leftPanel')
    <x-parts.profile-avatar-box :edit-link="false"/>
@endsection

@section('rightPanel')
    <x-parts.profile-cv-summary/>
@endsection

