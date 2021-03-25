    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl overflow-y-auto">
        <div class="p-5">
            <a href="/" class="text-app text-2xl col-6 font-bold hover:text-gray-300 content-center">
                <img src="{{ asset('img/pf-icon-white.png') }}" alt="app icon" class="w-10 h-10">
            </a>
            <a href="{{ route('admin.transaction.index') }}" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg flex items-center justify-center new-btn">
                <i class="fas fa-plus mr-3"></i> New Transaction
            </a>
        </div>

        <nav :class="{'block': open, 'hidden': !open}" class="text-white text-base font-semibold pt-3">
            <a href="{{ route('admin.dashboard.index') }}" class="flex items-center relative text-white py-4 pl-6 nav-item">
                <i class="fas fa-home absolute"></i>
                <span class="ml-7">Dashboard</span>
            </a>
            <a href="{{ route('admin.student-bill.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-file-invoice absolute"></i>
                <span class="ml-7">Student Bills</span>
            </a>

            @can('admin_access')
            <hr class="mt-2 ml-3 mr-3 opacity-50">
            <span class="ml-6 text-xs opacity-50">Manage Data</span>
            <div class="ml-3">
                <a href="{{ route('admin.bill.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-money-bill-wave absolute"></i>
                    <span class="ml-7">Bill Data</span>
                </a>
                <a href="{{ route('admin.student.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                    <i class="fas fa-user-graduate absolute"></i>
                    <span class="ml-7">Students Data</span>
                </a>
            </div>

            <hr class="mt-2 ml-3 mr-3 opacity-50">
            <a href="{{ route('admin.school.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-graduation-cap absolute"></i>
                <span class="ml-7">School Profile</span>
            </a>
            <a href="{{ route('admin.user.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-user absolute"></i>
                <span class="ml-7">Manage User</span>
            </a>
            @endcan

            <a href="{{ route('admin.report.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-chart-pie absolute"></i>
                <span class="ml-7">Report</span>
            </a>
            <a href="{{ route('admin.calendar.index') }}" class="flex items-center relative text-white hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fas fa-calendar absolute"></i>
                <span class="ml-7">Calendar</span>
            </a>
        </nav>
    </aside>
