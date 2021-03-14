<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Dashboard - Pay First </title>
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

    <div class="w-full flex flex-col h-screen overflow-y-hidden">

        <!-- Header & Nav -->
        @include('admin.layout.header')

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-2xl font-semibold text-black pb-3">Dashboard</h1>

                <div class="flex flex-wrap">
                    <!-- School Balance -->
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <div class="rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-blue-600"><i class="fa fa-wallet fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-600">School Balance</h5>
                                    <h3 class="font-bold text-xl">Rp {{ $balance }} <span class="text-blue-500"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total Transaction -->
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <div class="rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-red-600"><i class="fas fa-coins fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-600">Total Transaction</h5>
                                    <h3 class="font-bold text-3xl">{{ $total_trx }} <span class="text-red-500"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Total Students -->
                    <div class="w-full md:w-1/2 xl:w-1/3 p-6">
                        <div class="rounded-lg shadow-xl p-5">
                            <div class="flex flex-row items-center">
                                <div class="flex-shrink pr-4">
                                    <div class="rounded-full p-5 bg-yellow-600"><i class="fas fa-graduation-cap fa-2x fa-inverse"></i></div>
                                </div>
                                <div class="flex-1 text-right md:text-center">
                                    <h5 class="font-bold uppercase text-gray-600">Total Students</h5>
                                    <h3 class="font-bold text-3xl">{{ $total_student }} <span class="text-yellow-500"><i class="fas fa-caret-up"></i></span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full mt-12 bg-white rounded-lg p-5 shadow-md">
                    <p class="text-lg pb-3 flex items-center">
                        <i class="fas fa-history mr-3"></i> Latest Payment
                    </p>
                    <div class="bg-white overflow-auto rounded-lg">
                        @if(sizeof($transaction) > 0)
                        <table class="text-left w-full"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                            <thead>
                                <tr>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Student Name</th>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Payer</th>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Amount</th>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Time</th>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $trx)
                                <tr class="hover:bg-grey-lighter">
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $trx->student->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $trx->user->name }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $trx->amount }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">{{ $trx->created_at }}</td>
                                    <td class="py-4 px-6 border-b border-grey-light">
                                        <form action="{{ route('transaction.destroy', $trx->id) }}" method="POST">
                                            <a href="{{ route('transaction.show', $trx->id) }}" class="mr-2 rounded-md text-blue-600">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('transaction.edit', $trx->id) }}" class=" mr-2 rounded-md text-green-600">
                                                <i class="fas fa-pen"></i>
                                            </a>

                                            @csrf
                                            @method('DELETE')
                                            <button class="rounded-md text-red-600" type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @else
                            <div class="py-3 px-5 bg-red-100 text-red-600 border-l-4 border-red-600">No history to display</div>
                        @endif
                    </div>
                </div>
            </main>

            <!-- Footer -->
            @include('admin.layout.footer')

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>
    <!-- ControllersJS -->
    <script src="{{ asset('js/controllers.js') }}"></script>

    <script>
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'line',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
</html>
