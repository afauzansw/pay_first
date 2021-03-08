<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Student Data - Pay First </title>
        <meta name="author" content="David Grzyb">
        <meta name="description" content="">

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
                    <h1 class="text-2xl font-semibold text-black pb-3">Student Data</h1>
                    <p class="text-xs text-gray-500 mb-6">Dashboard > Student Data</p>

                    <a href="{{ URL::to('student-pdf') }}" class="text-sm float-right border-2 bg-red-600 hover:bg-transparent hover:text-red-600 hover:border-red-600 border-red-600 text-white rounded-full p-1 px-3">
                        <i class="far fa-file-pdf mr-2"></i>
                        Export PDF
                    </a>
                    <a href="{{ route('student.create') }}" class="text-sm mr-3 float-right border-2 bg-green-600 hover:bg-transparent hover:text-green-600 hover:border-green-600 border-green-600 text-white rounded-full p-1 px-3">
                        <i class="fas fa-plus mr-2"></i>
                        Add Student
                    </a>
                    <input class="p-1 px-3 mr-3 float-right border-1 rounded-full" type="text" placeholder="Search">

                    <!--Modal-->
                    {{-- <div class="modal opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
                        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>

                        <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">

                            <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
                                <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                </svg>
                                <span class="text-sm">(Esc)</span>
                            </div>

                            <!-- Add margin if you want to see some of the overlay behind the modal-->
                            <div class="modal-content py-4 text-left px-6">
                                <!--Title-->
                                <div class="flex justify-between items-center pb-3">
                                <p class="text-2xl font-bold">Student Detail</p>
                                <div class="modal-close cursor-pointer z-50">
                                    <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                                    </svg>
                                </div>
                                </div>

                                <!--Body-->
                                <div>
                                    <div>
                                        <span>NISN</span>
                                        <span>{{ $student->nisn}}</span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div> --}}

                    @include('admin.pages.student.show')

                    <!--Tab-->
                    <div class="w-full mt-10" x-data="{ openTab: 1 }">
                        <div>
                            <ul class="flex border-b">
                                <li class="-mb-px mr-1" @click="openTab = 1">
                                    <a :class="openTab === 1 ? 'rounded-t-md bg-blue-500 text-white font-semibold' : 'text-gray-500 hover:text-gray-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#class-10">Class X</a>
                                </li>
                                <li class="mr-1" @click="openTab = 2">
                                    <a :class="openTab === 2 ? 'rounded-t-md bg-blue-500 text-white font-semibold' : 'text-gray-500 hover:text-gray-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#class-11">Class XI</a>
                                </li>
                                <li class="mr-1" @click="openTab = 3">
                                    <a :class="openTab === 3 ? 'rounded-t-md bg-blue-500 text-white font-semibold' : 'text-gray-500 hover:text-gray-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#class-12">Class XII</a>
                                </li>
                            </ul>
                        </div>
                        <div class="bg-white p-6">
                            <div id="" class="overflow-auto" x-show="openTab === 1">
                                <div class="w-full mt-3">
                                    <div class="bg-white overflow-auto rounded-lg">
                                        @if (sizeof($classx) > 0)
                                        <table class="text-left w-full border-collapse">
                                            <thead>
                                                <tr>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">NISN</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Class</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Address</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($classx as $student)
                                                <tr class="hover:bg-grey-lighter">
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->nisn }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->name }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->class }} {{ $student->major }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->address }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">
                                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                            <a href="{{ route('student.show', $student->id) }}" class="modal-open mr-2 rounded-md text-blue-600">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('student.edit', $student->id) }}" class=" mr-2 rounded-md text-green-600">
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
                                </div>
                            </div>
                            <div id="" class="overflow-auto" x-show="openTab === 2">
                                <div class="w-full mt-3">
                                    <div class="bg-white overflow-auto rounded-lg">
                                        @if (sizeof($classxi) > 0)
                                        <table class="text-left w-full border-collapse">
                                            <thead>
                                                <tr>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">NISN</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Class</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Address</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($classxi as $student)
                                                <tr class="hover:bg-grey-lighter">
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->nisn }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->name }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->class }} {{ $student->major }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->address }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">
                                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                            <a href="{{ route('student.show', $student->id) }}" class="modal-open mr-2 rounded-md text-blue-600">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('student.edit', $student->id) }}" class=" mr-2 rounded-md text-green-600">
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
                                </div>
                            </div>
                            <div id="" class="" x-show="openTab === 3">
                                <div class="w-full mt-3">
                                    <div class="bg-white overflow-auto rounded-lg">
                                        @if (sizeof($classxii) > 0)
                                        <table class="text-left w-full border-collapse">
                                            <thead>
                                                <tr>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">NISN</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Class</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Address</th>
                                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($classxii as $student)
                                                <tr class="hover:bg-grey-lighter">
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->nisn }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->name }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->class }} {{ $student->major }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->address }}</td>
                                                    <td class="py-4 px-6 border-b border-gray-100">
                                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                                            <a href="{{ route('student.show', $student->id) }}" class="modal-open mr-2 rounded-md text-blue-600">
                                                                <i class="far fa-eye"></i>
                                                            </a>
                                                            <a href="{{ route('student.edit', $student->id) }}" class=" mr-2 rounded-md text-green-600">
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
                                </div>
                            </div>
                        </div>
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