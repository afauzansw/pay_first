<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Student Data - Pay First </title>
        <meta name="author" content="David Grzyb">
        <meta name="description" content="">

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

        {{-- <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet"/>
        <link rel="stylesheet" href="{{ asset('css/tailwind.output.css') }}" />
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <script src="{{ asset('js/init-alpine.js') }}"></script> --}}

    </head>

        <body class="bg-gray-100 font-family-karla flex">

            <!-- Sidebar -->
            @include('admin.layout.sidebar')

            <div class="relative w-full flex flex-col h-screen overflow-y-hidden bg-gray-50 dark:bg-gray-900">

                <!-- Header & Nav -->
                @include('admin.layout.header')

                <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
                    <main class="w-full flex-grow p-6">
                        <h1 class="text-2xl font-semibold text-black pb-3">Student Data</h1>
                        <p class="text-xs text-gray-500 mb-6">Dashboard > Student Data</p>

                        <!-- Form -->
                        <form action="{{ route('student.update', $student->id) }}" method="POST" class="m-3 px-5 pt-3 pb-8 text-base leading-6 space-y-4 text-gray-600 bg-white rounded-lg shadow-md sm:text-lg sm:leading-7">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col">
                                <label class="leading-loose">NISN</label>
                                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="nisn" name="nisn" type="number" required="" placeholder="Your NISN" aria-label="NISN" value="{{ $student->nisn }}">
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Name</label>
                                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="name" name="name" type="text" required="" placeholder="Your Name" aria-label="Name" value="{{ $student->name }}">
                            </div>
                            <div class="grid grid-cols-2 grid-flow-col gap-4">
                                <div class="flex flex-col">
                                    <label class="leading-loose">Class</label>
                                    <select name="class" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="class">
                                        <option value="0">Choose</option>
                                        <option @if ($student->class=='X') {{ 'selected' }} @endif value="X">X</option>
                                        <option @if ($student->class=='XI') {{ 'selected' }} @endif value="XI">XI</option>
                                        <option @if ($student->class=='XII') {{ 'selected' }} @endif value="XII">XII</option>
                                    </select>
                                </div>
                                <div class="flex flex-col">
                                    <label class="leading-loose">Major</label>
                                    <select name="major" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="major">
                                        <option value="0">Choose</option>
                                        <option @if ($student->major=='RPL 1') {{ 'selected' }} @endif value="RPL 1">RPL 1</option>
                                        <option @if ($student->major=='RPL 2') {{ 'selected' }} @endif value="RPL 2">RPL 2</option>
                                        <option @if ($student->major=='MM 1') {{ 'selected' }} @endif value="MM 1">MM 1</option>
                                        <option @if ($student->major=='MM 2') {{ 'selected' }} @endif value="MM 2">MM 2</option>
                                        <option @if ($student->major=='TKJ 1') {{ 'selected' }} @endif value="TKJ 1">TKJ 1</option>
                                        <option @if ($student->major=='TKJ 2') {{ 'selected' }} @endif value="TKJ 2">TKJ 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Address</label>
                                <textarea type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="address" name="address" rows="5" required="" placeholder="Jalan, desa/kelurahan, kecamatan, kabupaten" aria-label="Address">{{ $student->address }}</textarea>
                            </div>
                            <div class="mt-5 flex flex-col">
                                <button class="p-1 px-5 text-base float-right bg-blue-600 text-white rounded-full focus:outline-none" type="submit">Update</button>
                            </div>
                        </form>
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
