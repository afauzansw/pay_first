<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Add Student - Pay First</title>

        <!-- Tailwind -->
        <link href="{{ asset('css/tailwind.output.css') }}" rel="stylesheet">

        <!-- CSS Master -->
        <link href="{{ asset('css/master.css') }}" rel="stylesheet">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    </head>

    <body class="bg-gray-100 font-family-karla flex">

        <!-- Sidebar -->
        @include('admin.layout.sidebar')

        <div class="relative w-full flex flex-col h-screen overflow-y-hidden bg-gray-50 dark:bg-gray-900">

            <!-- Header & Nav -->
            @include('admin.layout.header')

            <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
                <main class="w-full flex-grow p-6">
                    <h1 class="text-2xl font-semibold text-black pb-3">Add Student</h1>
                    <p class="text-xs text-gray-500 mb-6">Dashboard > Student List > Create</p>

                    <div class="mx-6 mt-5 p-8 pt-3 pb-8 shadow-md bg-white rounded-md">

                        <!-- Form -->
                        <form class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7" action="{{ route('student.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-col">
                                <label class="leading-loose">NISN</label>
                                <input class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="nisn" name="nisn" type="number" required="" placeholder="Your NISN" aria-label="NISN">
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Name</label>
                                <input class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name">
                            </div>
                            <div class="grid grid-cols-2 grid-flow-col gap-4">
                                <div class="flex flex-col">
                                    <label class="leading-loose">Class</label>
                                    <select name="class" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="class" required="">
                                        <option value="0">Choose</option>
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                    </select>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Major</label>
                                    <select name="major" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="major">
                                        <option value="0">Choose</option>
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
                                <label class="leading-loose">Address</label>
                                <textarea type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="address" name="address" rows="5" required="" placeholder="Jalan, desa/kelurahan, kecamatan, kabupaten" aria-label="Address"></textarea>
                            </div>
                            <div class="mt-5 flex flex-col">
                                <button class="p-1 px-5 text-base float-right bg-blue-600 text-white rounded-full focus:outline-none" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </main>

                <!-- Footer -->
                @include('admin.layout.footer')

            </div>
        </div>

        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    </body>
</html>
