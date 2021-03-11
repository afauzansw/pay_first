<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bill Data - Pay First </title>
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

</head>

<body class="bg-gray-100 font-family-karla flex">

    <!-- Sidebar -->
    @include('admin.layout.sidebar')

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">

        <!-- Header & Nav -->
        @include('admin.layout.header')

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-2xl font-semibold text-black pb-3"> Bill Data </h1>
                <p class="text-xs text-gray-500 mb-6">Dashboard > Bill Data > Edit</p>

                <div class="m-5 p-6 bg-white rounded-lg shadow-md">
                    <!-- Form -->
                    <form class="text-base leading-6 text-gray-700 sm:text-lg sm:leading-7" action="{{ route('bill.update', $bill->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="flex flex-col">
                            <div class="flex flex-col">
                                <label class="leading-loose">Class</label>
                                <select name="class" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="class">
                                    <option value="0">Choose</option>
                                    <option @if ($bill->class=='X') {{ 'selected' }} @endif value="X">X</option>
                                    <option @if ($bill->class=='XI') {{ 'selected' }}  @endif value="XI">XI</option>
                                    <option @if ($bill->class=='XII') {{ 'selected' }}  @endif value="XII">XII</option>
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Year</label>
                                <input type="number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="year" name="year" value="{{ $bill->year }}" required="" placeholder="Year" aria-label="Year">
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Nominal</label>
                                <input type="number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="nominal" name="nominal" value="{{ $bill->nominal }}" required="" placeholder="Nominal" aria-label="Nominal">
                            </div>
                        </div>

                        <!--Button-->
                        <div class="pt-4 flex items-center">
                            <button class="bg-blue-500 flex justify-center items-center w-2/12 text-white rounded-full focus:outline-none" type="submit">Edit</button>
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
