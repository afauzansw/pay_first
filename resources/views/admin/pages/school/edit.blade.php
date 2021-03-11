<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>New Transaction</title>

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
                    <h1 class="text-2xl font-semibold text-black pb-3">School Profile</h1>
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <form action="{{ route('school.update', $school->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="sm:mx-7 m-3 shadow-lg overflow-hidden sm:rounded-lg">
                                <div class="px-5 py-6 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6 sm:col-span-2">
                                            <label for="npsn" class="block text-sm font-medium text-gray-700">NPSN</label>
                                            <input type="number" value="{{ $school->npsn }}" name="npsn" id="npsn" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-6">
                                            <label for="name" class="block text-sm font-medium text-gray-700">School Name</label>
                                            <input type="text" value="{{ $school->name }}" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                            <input type="text" value="{{ $school->email }}" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                            <input type="text" value="{{ $school->phone }}" name="phone" id="phone" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>

                                        <div class="col-span-6">
                                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                                            <textarea type="text" name="address" id="address" autocomplete="street-address" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ $school->address }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                        Save
                                    </button>
                                </div>
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
