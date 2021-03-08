    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl overflow-y-auto">
        <div class="p-5">
            <a href="/" class="text-app text-2xl col-6 font-semibold hover:text-gray-300">
                <i class="fas fa-school mr-3"></i>Pay First
            </a>
            <a href="{{ route('transaction.index') }}" class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg flex items-center justify-center new-btn">
                <i class="fas fa-plus mr-3"></i> New Transaction
            </a>
        </div>
        <hr class="mt-2 ml-3 mr-3 opacity-50">
        <nav class="text-white text-base font-semibold pt-3">
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
        </nav>
    </aside>
