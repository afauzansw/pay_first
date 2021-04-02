<!-- Desktop Header -->
<header class="w-full items-center bg-white py-1 px-6 hidden sm:flex shadow-md">
    <div class="w-1/2"></div>
    <div x-data="{ isOpen: false }" class="relative w-1/2 flex justify-end">
        <button @click="isOpen = !isOpen" class="realtive z-10 w-12 h-12 overflow-hidden focus:outline-none">
            <img class="h-9 w-9 rounded-full object-cover border-2 border-gray-300 hover:border-gray-400 focus:border-gray-400" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            {{-- {{ Auth::user()->name }} --}}
        </button>

        <button x-show="isOpen" @click="isOpen = false" class="h-full w-full fixed inset-0 cursor-default"></button>
        <div x-show="isOpen" class="absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">

            <!-- Button Profile -->
            <x-jet-dropdown-link href="{{ route('user.edit', Auth::user()->id) }}">
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
    <nav :class="isOpen ? 'flex': 'hidden'" class="overflow-auto flex flex-col pt-4">
        <a href="{{ route('transaction.index') }}" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg flex items-center justify-center new-btn">
            <i class="fas fa-plus mr-3"></i> New Transaction
        </a>
        <a href="{{ route('dashboard.index') }}" class="flex items-center relative text-white py-4 pl-6 nav-item">
            <i class="fas fa-home absolute"></i>
            <span class="ml-7">Dashboard</span>
        </a>
        <a href="{{ route('student-bill.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-file-invoice absolute"></i>
            <span class="ml-7">Student Bills</span>
        </a>

        @can('admin_access')
        <hr class="mt-2 ml-3 mr-3 opacity-50">
        <span class="ml-6 text-xs text-white opacity-50">Manage Data</span>
        <div class="ml-3">
            <a href="{{ route('bill.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-money-bill-wave absolute"></i>
                <span class="ml-7">Bill Data</span>
            </a>
            <a href="{{ route('student.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user-graduate absolute"></i>
                <span class="ml-7">Students Data</span>
            </a>
        </div>
        <hr class="mt-2 ml-3 mr-3 opacity-50">
        <a href="{{ route('school.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-graduation-cap absolute"></i>
            <span class="ml-7">School Profile</span>
        </a>
        <a href="{{ route('user.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-user absolute"></i>
            <span class="ml-7">Manage User</span>
        </a>
        @endcan

        <a href="{{ route('calendar.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
            <i class="fas fa-calendar absolute"></i>
            <span class="ml-7">Calendar</span>
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
