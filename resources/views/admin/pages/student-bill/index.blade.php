<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3">Student Bills</h1>
    <p class="text-xs text-gray-500 mb-6">Dashboard > Student Bills</p>

    <div id="" class="overflow-auto">
        <div class="w-full mt-3">
            <div class="bg-white overflow-auto rounded-lg">
                {{-- @if (sizeof($classx) > 0) --}}
                <table class="text-left w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-800 border-b border-gray-200">NISN</th>
                            <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-800 border-b border-gray-200">Name</th>
                            <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-800 border-b border-gray-200">Class</th>
                            <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm text-gray-800 border-b border-gray-200">Bill</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trxs as $trx)
                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-gray-100">{{ $trx->student->nisn }}</td>
                            <td class="py-4 px-6 border-b border-gray-100">{{ $trx->student->name }}</td>
                            <td class="py-4 px-6 border-b border-gray-100">{{ $trx->student->class }} {{ $trx->student->major }}</td>
                            <td class="py-4 px-6 border-b border-gray-100">
                                @if (($trx->bill->nominal - $trx->amount) == 0)
                                <span class="inline-flex leading-5 font-semibold bg-blue-100 text-blue-800 rounded-full px-3">Paid Off</span>
                                @else
                                <span>Rp {{ $trx->bill->nominal - $trx->amount }}</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- @else
                    <div class="py-3 px-5 bg-red-100 text-red-600 border-l-4 border-red-600">No data to display</div>
                @endif --}}
            </div>
        </div>
    </div>
</x-app-layout>
