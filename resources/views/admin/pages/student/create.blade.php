<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3">Add Student</h1>
    <p class="text-xs text-gray-500 mb-6">Dashboard > Student List > Create</p>

    <div class="lg:mx-6 mt-5 sm:mx-2 md:mx-2 p-8 pt-3 pb-8 shadow-md bg-white rounded-md">

        <!-- Form -->
        <form class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7" action="{{ route('student.store') }}" method="POST">
            @csrf
            <div class="flex flex-col">
                <label class="leading-loose">NISN</label>
                <input id="nisn" name="nisn" type="number" required="" placeholder="Your NISN" aria-label="NISN" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Name</label>
                <input id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
            </div>
            <div class="grid grid-cols-2 grid-flow-col gap-4">
                <div class="flex flex-col">
                    <label class="leading-loose">Class</label>
                    <select name="class" id="class" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                        <option value="">-- Choose --</option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label class="leading-loose">Major</label>
                    <select name="major" id="major" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                        <option value="">-- Choose --</option>
                        <option value="RPL 1">RPL 1</option>
                        <option value="RPL 2">RPL 2</option>
                        <option value="MM 1">MM 1</option>
                        <option value="MM 2">MM 2</option>
                        <option value="TKJ 1">TKJ 1</option>
                        <option value="TKJ 2">TKJ 2</option>
                    </select>
                </div>
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Gender</label>
                <select name="gender" id="gender" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                    <option value="">-- Choose --</option>
                    <option value="L">Male</option>
                    <option value="P">Female</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Address</label>
                <textarea type="text" id="address" name="address" rows="5" required="" placeholder="Jalan, desa/kelurahan, kecamatan, kabupaten" aria-label="Address" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600"></textarea>
            </div>
            <div class="mt-5 flex flex-col">
                <button class="p-1 px-5 text-base float-right bg-blue-600 text-white rounded-full focus:outline-none" type="submit">Create</button>
            </div>
        </form>
    </div>
</x-app-layout>
