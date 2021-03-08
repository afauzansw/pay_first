<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>New Transaction</title>

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
                    <h1 class="text-2xl font-semibold text-black pb-3">New Transaction</h1>

                    <div class="mx-6 mt-5 p-8 pt-3 pb-8 shadow-md bg-white rounded-lg">

                        <!-- Form -->
                        <form class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7" action="{{ route('transaction.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-col">
                                <label class="leading-loose">Payer</label>
                                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="users_id" name="users_id" required="" placeholder="" aria-label="users_id">
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Student Name</label>
                                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="students_id" name="students_id" required="" placeholder="" aria-label="students_id">
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Bill</label>
                                <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="bills_id" name="bills_id" required="" placeholder="" aria-label="bills_id">
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Amount</label>
                                <input type="number" min="100000" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="amount" name="amount" required="" placeholder="Amount" aria-label="Amount">
                            </div>
                            <div class="mt-5 flex flex-col">
                                <button class="p-1 px-5 text-base float-right bg-blue-600 text-white rounded-full focus:outline-none" type="submit">Create</button>
                            </div>
                        </form>
                    </div>
                </main>
            </div>
        </div>

        <!-- AlpineJS -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <!-- Font Awesome -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>

    </body>
</html>
