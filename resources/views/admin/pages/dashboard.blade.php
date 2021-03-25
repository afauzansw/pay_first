<x-app-layout>
    <h2 class="text-2xl font-semibold text-black pb-3">{{ __('Dashboard') }}</h2>

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
                        <h5 class="font-bold text-sm uppercase text-gray-600">Total Transaction</h5>
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
                        <td class="py-4 px-6 border-b border-grey-light">Rp {{ $trx->amount }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">{{ $trx->created_at }}</td>
                        <td class="py-4 px-6 border-b border-grey-light">
                            <form action="{{ route('admin.transaction.destroy', $trx->id) }}" method="POST">
                                <a href="{{ route('admin.transaction.show', $trx->id) }}" class="mr-2 rounded-md text-blue-600">
                                    <i class="far fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.transaction.edit', $trx->id) }}" class=" mr-2 rounded-md text-green-600">
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
</x-app-layout>
