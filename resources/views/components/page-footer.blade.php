<footer>
    <section class="bg-gray-800 text-gray-300">
        <div class="container px-2">
            <div class="pt-20 pb-12 md:flex lg:px-0 flex-wrap items-start justify-between">
                <div class="flex flex-col space-y-8 mb-8">
                    <x-logo class="w-48 mx-auto lg:mx-0"/>
                    <div class="flex text-2xl justify-evenly items-center">
                        @if(config('jobinhood.social.linkedin'))
                            <a href="{{ config('jobinhood.social.linkedin') }}" target="_blank"><i
                                    class="fab fa-linkedin"></i></a>
                        @endif

                        @if(config('jobinhood.social.twitter'))
                            <a href="{{ config('jobinhood.social.twitter') }}" target="_blank"><i
                                    class="fab fa-twitter"></i></a>
                        @endif

                        @if(config('jobinhood.social.facebook'))
                            <a href="{{ config('jobinhood.social.facebook') }}" target="_blank"><i
                                    class="fab fa-facebook"></i></a>
                        @endif

                        @if(config('jobinhood.social.instagram'))
                            <a href="{{ config('jobinhood.social.instagram') }}" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                        @endif

                        @if(config('jobinhood.social.youtube'))
                            <a href="{{ config('jobinhood.social.youtube') }}" target="_blank"><i
                                    class="fab fa-youtube"></i></a>
                        @endif
                    </div>
                </div>

                <div class="flex flex-col space-y-1 mb-8">
                    <p class="font-semibold text-xl mb-4">Jobinhood</p>
                    <a href="#">About Us</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms and Conditions</a>
                    <a href="#">Cookie Policy</a>
                    <a href="#">FAQ</a>
                </div>

                <div class="flex flex-col space-y-1 mb-8 whitespace-nowrap">
                    <p class="font-semibold text-xl mb-4">Find Jobs</p>
                    <a href="#">Jobs in London</a>
                    <a href="#">Jobs in Birmingham</a>
                    <a href="#">Jobs in Manchester</a>
                    <a href="#">Jobs in Liverpool</a>
                    <a href="#">Jobs in Edinburgh</a>
                    <a href="#">Jobs in Glasgow</a>
                </div>
                <div class="grid xl:grid-cols-2 gap-4 whitespace-nowrap">
                    <div
                        class="flex items-center border border-jh-green-400 space-x-4 text-sm leading-tight p-2 px-6 group hover:bg-jh-green-400 hover:text-white">
                        <i class="fab fa-app-store text-4xl text-jh-green-400 w-12 group-hover:text-white"></i>
                        <div>
                            <p class="text-lg">Apple Store</p>
                            <p>Not available</p>
                        </div>
                    </div>
                    <div
                        class="flex items-center border border-jh-green-400 space-x-4 text-sm leading-tight p-2 px-6 group hover:bg-jh-green-400 hover:text-white">
                        <i class="fab fa-google-play text-4xl text-jh-green-400 w-12 group-hover:text-white"></i>
                        <div>
                            <p class="text-lg">Play Store</p>
                            <p>Not available</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-900 text-gray-200 px-2">
        <div class="container py-6 text-sm">
            &copy;2021 Job in Hood - All right reserved.
        </div>
    </section>
</footer>
