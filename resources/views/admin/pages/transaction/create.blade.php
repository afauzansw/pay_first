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

                    @if(sizeof($allBill) > 0 && sizeof($allStudent) > 0)
                    <h1 class="text-2xl font-semibold text-black pb-3">New Transaction</h1>
                    <div class="mx-6 mt-5 p-8 pt-3 pb-8 shadow-md bg-white rounded-lg">
                        <!-- Form -->
                        <form class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7" action="{{ route('transaction.store') }}" method="POST">
                            @csrf
                            <div class="flex flex-col">
                                <label class="leading-loose">Payer</label>
                                <select name="users_id" id="users_id" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                    <option value="">Choose Payer</option>
                                    @foreach ($allPayer as $payer)
                                        <option value="{{ $payer->id }}">{{ $payer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Student Name</label>
                                <select name="students_id" id="students_id" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                    <option value="">Choose Student</option>
                                    @foreach ($allStudent as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="flex flex-col">
                                <label class="leading-loose">Bill</label>
                                <select name="bills_id" id="bills_id" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                                    <option value="">Choose Bill</option>
                                    @foreach ($allBill as $bill)
                                        <option value="{{ $bill->id }}">Class {{ $bill->class }}</option>
                                    @endforeach
                                </select>
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
                    @else
                        <div class="text-center md:mt-10 sm:mt-5">
                            <img src="{{ asset('svg/create-first.svg') }}" class="w-80 lg:w-2/6  m-auto mt-3 mb-3" alt="">
                            <h3 class="text-xl text-gray-400">Upss..</h3>
                            <p class="text-gray-500">Create <a href="{{ route('bill.index') }}" class="underline text-blue-500 hover:text-blue-400">billing data</a> and <a href="{{ route('student.create') }}" class="underline text-blue-500 hover:text-blue-400">student data</a>  first.</p>
                        </div>
                    @endif
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
