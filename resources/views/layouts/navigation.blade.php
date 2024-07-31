
<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between">
                <!-- Left -->
                <div class="shrink-0 flex items-center">
                    <a  class="btn" href="{{ route('dashboard') }}"><i class="fas fa-home"></i></a>
                    <a class="btn" href="#"><i class="fas fa-lock-open"></i></a>
                    <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#jaasModal"><i class="fas fa-phone"></i></a>
                    <a class="btn" href="#"><i class="fas fa-walking"></i></a>
                </div>
                <!-- Center -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex items-center">
                    @guest
                       You are viewing Dr.Steve as a guest.
                    @else


                    <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('dashboard')">
                       {{ Auth::user()->name }}
                    </x-nav-link>
                    @endguest
                </div>


            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
               <i class="fas fa-search"></i> &nbsp;
{{--
                        <a class="nav-link" href="{{ route('jitsi.index') }}">{{ __('My Jitsi Room') }}</a>
 --}}

<!-- Button to trigger modal -->
<a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#imageModal">
  <i class="fas fa-map"></i>&nbsp;
</a>

                <a class="btn" href="#"><i class="fab fa-intercom"></i></a>
                <a class="btn" href="#"><i class="fas fa-comment-alt"></i></a>
                <a class="btn" href="#"><i class="fas fa-tools"></i></a>
                  <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                               onclick="event.preventDefault();
                                 this.closest('form').submit();"> <i class="fas fa-power-off"></i>
                            </x-dropdown-link>
                  </form>


                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                    </x-slot>
                    <x-slot name="content">
                    </x-slot>
                </x-dropdown>
            </div>


            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">

                @guest

                @else


                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endguest
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>


    </div>


</nav>


