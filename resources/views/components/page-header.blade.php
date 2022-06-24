<header class="bg-jh-green-400 sticky top-0 w-full z-50" x-data="{userMenuOpen: false, mobileMenuOpen: false}">
    <nav class="w-full h-20 flex items-center px-6 md:px-8 flex items-center justify-end md:justify-between relative">
        <div class="hidden md:block">
            <ul class="flex text-white space-x-8">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#">Jobs</a></li>
                <li><a href="#">Blog</a></li>
            </ul>
        </div>
        <div class="hidden md:block">
            <div class="flex text-white space-x-1 lg:space-x-2 items-center">
                <x-navbar.navbar-link to="{{ route('job.create') }}" class="hidden xl:flex">
                    <i class="las la-2x la la-plus-circle mr-2"></i>
                    <span>Post a job</span>
                </x-navbar.navbar-link>
                @auth
                    <div class="relative">
                        <x-navbar.navbar-button class="px-4 py-2"
                                                @click="userMenuOpen = !userMenuOpen"
                                                @keydown.escape="userMenuOpen = false">
                            <i class="las la-2x la la-user-circle mr-2"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </x-navbar.navbar-button>

                        <div
                            x-show="userMenuOpen"
                            x-transition:enter="transition-transform transition-opacity ease-out duration-300"
                            x-transition:enter-start="opacity-0 transform -translate-y-2"
                            x-transition:enter-end="opacity-100 transform translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-end="opacity-0 transform -translate-y-3"
                            class="absolute right-0 mt-2 pt-2 flex flex-col divide-y text-lg bg-white text-gray-600 border border-gray-300 rounded-md shadow"
                            @click.away="userMenuOpen = false">
                            <div class="text-center flex flex-col py-4 px-12">
                                <p class="text-xl text-jh-green-400 font-semibold">{{ auth()->user()->name }}</p>
                                <p class="text-lg text-gray-400">{{ auth()->user()->email }}</p>
                            </div>
                            <a class="px-4 py-2 hover:bg-gray-100" href="{{ route('dashboard') }}">
                                <i class="las la-tachometer-alt mr-2"></i> Dashboard
                            </a>
                            <a class="px-4 py-2 hover:bg-gray-100" href="{{ route('profile.edit') }}">
                                <i class="las la-user mr-2"></i> Edit Profile
                            </a>
                            <form method="post" action="{{ route('profile.mode-select') }}">
                                @csrf
                                @if (Auth::user()->user_mode <> 'RECRUITER')
                                    <button type="submit" name="mode" value="RECRUITER"
                                            class="text-left px-4 py-2 hover:bg-gray-100 whitespace-nowrap"
                                            href="{{ route('profile.edit') }}">
                                        <i class="las la-user mr-2"></i> Switch to Recruiter Mode
                                    </button>
                                @else
                                    <button type="submit" name="mode" value="JOBSEEKER"
                                            class="text-left px-4 py-2 hover:bg-gray-100 whitespace-nowrap"
                                            href="{{ route('profile.edit') }}">
                                        <i class="las la-user mr-2"></i> Switch to Jobseeker Mode
                                    </button>
                                @endif
                            </form>
                            <a class="px-4 py-2 hover:bg-gray-100" href="{{ route('logout') }}">
                                <i class="las la-sign-out-alt mr-2"></i> Sign Out
                            </a>
                        </div>
                    </div>
                @endauth
                @guest
                    <x-navbar.navbar-link :to="route('register')">
                        <i class="las la-2x la la-user-circle mr-2"></i>
                        <span>Sign Up</span>
                    </x-navbar.navbar-link>
                    <x-navbar.navbar-link :to="route('login')">
                        <i class="las la-2x la la-key mr-2"></i>
                        <span>Login</span>
                    </x-navbar.navbar-link>
                @endguest
            </div>
        </div>
        <div class="block md:hidden" data-nav-mobile="data-nav-mobile">
            <x-navbar.navbar-button @click="mobileMenuOpen = !mobileMenuOpen"
                                    @keydown.escape="mobileMenuOpen = false">
                <i class="text-white fa fa-2x" :class="{ 'fa-bars' : !mobileMenuOpen, 'fa-times': mobileMenuOpen}"></i>
            </x-navbar.navbar-button>
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 flex items-center justify-center">
            <a href="{{ route('home') }}">
                <x-logo class="text-white h-8"/>
            </a>
        </div>
    </nav>
    <nav class="absolute w-full" x-show="mobileMenuOpen">
        <div class="fixed w-full h-full bg-black opacity-50"></div>
        <div class="flex flex-col bg-white text-gray-600 font-semibold divide-y divide-dotted relative"
             @click.away="mobileMenuOpen = false">
            @guest
                <a href="{{ route('login') }}" class="flex items-center space-x-4 px-4 py-2"><i
                        class="text-xl las la-user-circle text-jh-green-400"></i><span>Login</span></a>
                <a href="{{ route('register') }}" class="flex items-center space-x-4 px-4 py-2"><i
                        class="text-xl las la-key text-jh-green-400"></i><span>Sign Up</span></a>
            @endguest
            @auth
                <div
                    class="px-4 py-4 from-gray-200 to-white bg-gradient-to-t text-xl tracking-wide">
                    {{ auth()->user()->name }}
                </div>
                <a href="{{ route('logout') }}" class="flex items-center space-x-4 px-4 py-2"><i
                        class="text-xl las la-sign-out-alt text-jh-green-400"></i><span>Sign Out</span></a>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-4 px-4 py-2"><i
                        class="text-xl las la-tachometer-alt text-jh-green-400"></i><span>Dashboard</span></a>
                <a href="{{ route('dashboard') }}" class="flex items-center space-x-4 px-4 py-2"><i
                        class="text-xl las la-pen text-jh-green-400"></i><span>Edit Profile</span></a>
            @endauth

            <a href="/" class="flex items-center space-x-4 px-4 py-2"><i
                    class="text-xl las la-suitcase text-jh-green-400"></i><span>Find a job</span></a>
            <a href="/" class="flex items-center space-x-4 px-4 py-2"><i
                    class="text-xl las la-blog text-jh-green-400"></i><span>Blog</span></a>
            <a href="{{ route('job.create') }}" class="flex items-center space-x-4 px-4 py-2"><i
                    class="text-xl las la-plus-circle text-jh-green-400"></i><span>Post a job</span></a>
        </div>
    </nav>
</header>
