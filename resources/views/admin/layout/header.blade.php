<!-- Desktop Header -->
<header class="w-full items-center bg-white py-1 px-6 hidden sm:flex shadow-md">
    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 rounded-full overflow-hidden border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                    <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            @else
                <span class="inline-flex rounded-md">
                    <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                        {{ Auth::user()->name }}

                        <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </span>
            @endif
        </button>
        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">

            <!-- Button Profile -->
            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                {{ __('Profile') }}
            </x-jet-dropdown-link>
            <!-- Button Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-jet-dropdown-link>
            </form>

        </div>
    </div>
</header>

<!-- Mobile Header & Nav -->
<header x-data="{ isOpen: false }" class="w-full bg-sidebar py-5 px-6 sm:hidden">
    <div class="flex items-center justify-between">
        <a href="/" class="text-white text-3xl font-semibold hover:text-gray-300">Pay First</a>
        <button @click="isOpen = !isOpen" class="text-white text-3xl focus:outline-none">
            <i x-show="!isOpen" class="fas fa-bars"></i>
            <i x-show="isOpen" class="fas fa-times"></i>
        </button>
    </div>

    <!-- Dropdown Nav -->
    <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
        <a href="{{ route('dashboard.index') }}" class="flex items-center relative text-white py-4 pl-6 nav-item">
            <i class="fas fa-home absolute"></i>
            <span class="ml-7">Dashboard</span>
        </a>
        <a href="{{ route('bill.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-money-bill-wave absolute"></i>
            <span class="ml-7">Bill Data</span>
        </a>
        <a href="{{ route('student.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-user-graduate absolute"></i>
            <span class="ml-7">Students Data</span>
        </a>
        <a href="{{ route('school.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-graduation-cap absolute"></i>
            <span class="ml-7">School Profile</span>
        </a>
        <a href="{{ route('calendar.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-calendar absolute"></i>
            <span class="ml-7">Calendar</span>
        </a>
        <hr class="mt-4 mb-4 ml-3 mr-3 opacity-50">
        <a href="{{ route('user.create') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-user-plus absolute"></i>
            <span class="ml-7">Add User</span>
        </a>
        <a href="{{ route('user.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-users absolute"></i>
            <span class="ml-7">User List</span>
        </a>
        <span class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
            <i class="fas fa-sign-out-alt mr-3"></i>
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Logout') }}
                </x-jet-dropdown-link>
            </form>
        </span>
    </nav>
</header>
