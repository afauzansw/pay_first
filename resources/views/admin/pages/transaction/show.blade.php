<x-app-layout>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 text-gray-900 font-semibold">
                    Transaction Detail
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{-- Student data detail --}}
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Transaction ID
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $transaction->id }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Student Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $transaction->student->name }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Payer
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $transaction->user->name }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Payment For
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            Class {{ $transaction->bill->class }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Amount
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            Rp {{ $transaction->amount }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Transaction Time
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $transaction->created_at }}
                        </dd>
                    </div>

                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500"></dt>
                        <dd class="mt-1 content-end text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            <a href="{{ route('dashboard.index') }}" class="mr-3 px-3 py-2 text-right rounded-lg text-gray-500 hover:text-gray-700 hover:bg-gray-100">Back</a>
                            <a href="{{ route('receipt-pdf', $transaction->id) }}" class=" mr-2 px-3 py-2 rounded-lg font-semibold text-blue-800 bg-blue-300">
                                <i class="fas fa-file-invoice"></i> Print Invoice
                            </a>
                        </dd>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
