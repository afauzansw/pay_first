<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3"> Bill Data </h1>
    <p class="text-xs text-gray-500 mb-6">Dashboard > Bill Data</p>

    <button class="modal-open mr-3 mb-4 py-2 px-4 float-right text-sm bg-green-600 hover:bg-green-700 text-white rounded-full">
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
        <table class="text-left w-full border-collapse">
            <thead>
            <tr>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-gray-100">ID</th>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-gray-100">Class</th>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-gray-100">Year</th>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-gray-100">Nominal</th>
                <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-grey-dark border-b border-gray-100">Action</th>
            </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-700 dark:bg-gray-800">
            @foreach ($bill as $bil)
            <tr class="hover:bg-gray-50">
                <td class="py-4 px-6 border-b border-gray-100 text-sm">{{ $bil->id }}</td>
                <td class="py-4 px-6 border-b border-gray-100 text-sm">{{ $bil->class }}</td>
                <td class="py-4 px-6 border-b border-gray-100 text-sm">{{ $bil->year }}</td>
                <td class="py-4 px-6 border-b border-gray-100 text-sm">Rp {{ $bil->nominal }}</td>
                <td class="py-4 px-6 border-b border-gray-100 text-sm">
                    <form action="{{ route('bill.destroy', $bil->id) }}" method="POST">
                        <a href="{{ route('bill.show', $bil->id) }}" class="mr-2 rounded-md text-blue-600">
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
</x-app-layout>
