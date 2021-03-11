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
                <p class="text-xs text-gray-500 mb-6">Dashboard > Bill Data</p>

                <button class="modal-open text-sm mr-3 mb-4 float-right border-2 bg-green-600 hover:bg-transparent hover:text-green-600 hover:border-green-600 border-green-600 text-white rounded-full p-1 px-3">
                    <i class="fas fa-plus mr-2"></i>
                    Add Data
                </button>

                <!--Modal-->
                <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                    <div class="modal-overlay absolute w-full h-full bg-gray-700 opacity-60"></div>

                    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded">
                        <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                            <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg>
                            <span class="text-sm">(Esc)</span>
                        </div>

                        <!-- Add margin if you want to see some of the overlay behind the modal-->
                        <div class="modal-conten">
                            <div class="min-h-screen py-6 flex flex-col justify-center sm:py-12">
                                <div class="relative py-3 sm:max-w-xl sm:mx-auto">
                                    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 rounded-3xl sm:p-5">
                                        <div class="max-w-md mx-auto">
                                            <div class="flex items-center space-x-5">
                                                <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                                                    <h2 class="leading-relaxed">Create New Data</h2>
                                                    <p class="text-sm text-gray-500 font-normal leading-relaxed">Create new data. Make sure the data is correct.</p>
                                                </div>
                                            </div>
                                            <div class="divide-y divide-gray-200">

                                                <!-- Form -->
                                                <form class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7" action="{{ route('bill.store') }}" method="POST">
                                                    @csrf
                                                    <div class="flex flex-col">
                                                        <div class="flex flex-col">
                                                            <label class="leading-loose">Class</label>
                                                            <select name="class" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="class">
                                                                <option value="0">Choose</option>
                                                                <option value="X">X</option>
                                                                <option value="XI">XI</option>
                                                                <option value="XII">XII</option>
                                                            </select>
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <label class="leading-loose">Year</label>
                                                            <input type="number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="year" name="year" required="" placeholder="Year" aria-label="Year">
                                                        </div>
                                                        <div class="flex flex-col">
                                                            <label class="leading-loose">Nominal</label>
                                                            <input type="number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="nominal" name="nominal" required="" placeholder="Nominal" aria-label="Nominal">
                                                        </div>
                                                    </div>

                                                    <!--Button-->
                                                    <div class="pt-4 flex items-center">
                                                        <button class="modal-close flex justify-center items-center w-full text-gray-900 px-4 py-3 rounded-md focus:outline-none">
                                                            <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg> Cancel
                                                        </button>
                                                        <button class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none" type="submit">Create</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full overflow-x-auto rounded-lg shadow-md">
                    @if(sizeof($bill) > 0)
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Class</th>
                            <th class="px-4 py-3">Year</th>
                            <th class="px-4 py-3">Nominal</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($bill as $bil)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">{{ $bil->class }}</td>
                            <td class="px-4 py-3 text-xs">{{ $bil->year }}</td>
                            <td class="px-4 py-3 text-sm">Rp {{ $bil->nominal }}</td>
                            <td class="px-4 py-3 text-sm">
                                <form action="{{ route('bill.destroy', $bil->id) }}" method="POST">
                                    <a href="{{ route('bill.show', $bil->id) }}" class="modal-open mr-2 rounded-md text-blue-600">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('bill.edit', $bil->id) }}" class=" mr-2 rounded-md text-green-600">
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
                        <div class="py-3 px-5 bg-red-100 text-red-600 border-l-4 border-red-600">No data to display</div>
                    @endif
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

    <script>
        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
          openmodal[i].addEventListener('click', function(event){
            event.preventDefault()
            toggleModal()
          })
        }

        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)

        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
          closemodal[i].addEventListener('click', toggleModal)
        }

        document.onkeydown = function(evt) {
          evt = evt || window.event
          var isEscape = false
          if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
          } else {
            isEscape = (evt.keyCode === 27)
          }
          if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
          }
        };


        function toggleModal () {
          const body = document.querySelector('body')
          const modal = document.querySelector('.modal')
          modal.classList.toggle('opacity-0')
          modal.classList.toggle('pointer-events-none')
          body.classList.toggle('modal-active')
        }

    </script>
</body>
</html>
