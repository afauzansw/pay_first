<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>School Profile</title>

        <!-- Tailwind -->
        <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

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
                    @if (sizeof($school) > 0)
                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                            <div class="px-4 py-5 sm:px-6">
                                <h3 class="text-lg leading-6 text-gray-900 font-semibold">
                                    School Profile
                                </h3>
                                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                    school details and contacts.
                                </p>
                            </div>
                            <div class="border-t border-gray-200">
                                <dl>
                                    @foreach($school as $sch)
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            National School Identification Number
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $sch->npsn }}
                                        </dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            School Name
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $sch->name }}
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Email address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $sch->email }}
                                        </dd>
                                    </div>
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Phone Number
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $sch->phone }}
                                        </dd>
                                    </div>
                                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <dt class="text-sm font-medium text-gray-500">
                                            Address
                                        </dt>
                                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                            {{ $sch->address }}
                                        </dd>
                                    </div>
                                    @endforeach
                                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <a href="{{ route('school.edit', $sch->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</a>
                                    </div>
                                </dl>
                            </div>
                        </div>
                    </div>
                    @else
                        <div class="mt-auto p-10 content-center text-center">
                            <img src="{{ asset('svg/no-data.svg') }}" class="w-96  m-auto" alt="">
                            <p class="mb-2 text-gray-400">Complete your previous school profile.</p>
                            <a href="{{ route('school.create') }}" class="px-4 py-1 text-lg bg-blue-100 text-blue-600 rounded-full hover:text-blue-100 hover:bg-blue-600">Create Profile</a>
                        </div>
                    @endif
                </main>
            </div>
        </div>

        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    </body>
</html>
