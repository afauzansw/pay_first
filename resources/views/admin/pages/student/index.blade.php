<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3">Student Data</h1>
    <p class="text-xs text-gray-500 mb-6">Dashboard > Student Data</p>

    <div class="lg:float-right sm:float-left">
        <a href="{{ route('student.create') }}" class="mr-3 py-2 px-4 text-sm bg-green-600 hover:bg-green-700 text-white rounded-full">
            <i class="fas fa-plus mr-2"></i>
            Add Student
        </a>
        <a href="{{ URL::to('student-pdf') }}" class="mr-3 py-2 px-4 text-sm bg-red-600 hover:bg-red-700 text-white rounded-full">
            <i class="far fa-file-pdf mr-2"></i>
            Export PDF
        </a>
        {{-- @livewire('search-students') --}}
    </div>

    <!--Tab-->
    <div class="w-full mt-16" x-data="{ openTab: 1 }">
        <div>
            <ul class="flex border-b">
                <li class="-mb-px mr-1" @click="openTab = 1">
                    <a :class="openTab === 1 ? 'rounded-t-md border-2 border-blue-500 bg-blue-500 text-white font-semibold' : 'border-t-2 border-l-2 border-r-2 rounded-t-md text-gray-500 hover:text-gray-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#class-10">Class X</a>
                </li>
                <li class="mr-1" @click="openTab = 2">
                    <a :class="openTab === 2 ? 'rounded-t-md border-2 border-blue-500 bg-blue-500 text-white font-semibold' : 'border-t-2 border-l-2 border-r-2 rounded-t-md text-gray-500 hover:text-gray-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#class-11">Class XI</a>
                </li>
                <li class="mr-1" @click="openTab = 3">
                    <a :class="openTab === 3 ? 'rounded-t-md border-2 border-blue-500 bg-blue-500 text-white font-semibold' : 'border-t-2 border-l-2 border-r-2 rounded-t-md text-gray-500 hover:text-gray-800'" class="bg-white inline-block py-2 px-4 font-semibold" href="#class-12">Class XII</a>
                </li>
            </ul>
        </div>
        <div class="bg-white p-6 rounded-b-md">
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
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Gender</th>
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
                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->gender }}</td>
                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->address }}</td>
                                    <td class="py-4 px-6 border-b border-gray-100">

                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                            <a href="{{ route('student.show', $student->id) }}" class="mr-2 rounded-md text-blue-600">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('student.edit', $student->id) }}" class="mr-2 rounded-md text-green-600">
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
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Gender</th>
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
                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->gender }}</td>
                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->address }}</td>
                                    <td class="py-4 px-6 border-b border-gray-100">
                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                            <a href="{{ route('student.show', $student->id) }}" class="mr-2 rounded-md text-blue-600">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('student.edit', $student->id) }}" class="mr-2 rounded-md text-green-600">
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
            <div id="" class="overflow-auto" x-show="openTab === 3">
                <div class="w-full mt-3">
                    <div class="bg-white overflow-auto rounded-lg">
                        @if (sizeof($classxii) > 0)
                        <table class="text-left w-full border-collapse">
                            <thead>
                                <tr>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">NISN</th>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name</th>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Class</th>
                                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Gender</th>
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
                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->gender }}</td>
                                    <td class="py-4 px-6 border-b border-gray-100">{{ $student->address }}</td>
                                    <td class="py-4 px-6 border-b border-gray-100">
                                        <form action="{{ route('student.destroy', $student->id) }}" method="POST">
                                            <a href="{{ route('student.show', $student->id) }}" class="mr-2 rounded-md text-blue-600">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <a href="{{ route('student.edit', $student->id) }}" class="mr-2 rounded-md text-green-600">
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
</x-app-layout>
