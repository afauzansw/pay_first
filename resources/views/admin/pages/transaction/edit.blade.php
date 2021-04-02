<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3">Transaction</h1>
    <p class="text-xs text-gray-500 mb-6">Dashboard > Transaction</p>

    <!-- Form -->
    <form action="{{ route('transaction.update', $transaction->id) }}" method="POST" class="m-3 px-5 pt-3 pb-8 text-base leading-6 space-y-4 text-gray-600 bg-white rounded-lg shadow-md sm:text-lg sm:leading-7">
        @csrf
        @method('PUT')
        <div class="flex flex-col">
            <label class="leading-loose">Student Name</label>
            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="students_id" name="students_id" required="" value="{{ $transaction->students_id }}" placeholder="" aria-label="students_id">
        </div>
        <div class="flex flex-col">
            <label class="leading-loose">Bill</label>
            <input type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="bills_id" name="bills_id" required="" value="{{ $transaction->bills_id }}" placeholder="" aria-label="bills_id">
        </div>
        <div class="flex flex-col">
            <label class="leading-loose">Amount</label>
            <input type="number" min="100000" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="amount" name="amount" required="" value="{{ $transaction->amount }}" placeholder="Amount" aria-label="Amount">
        </div>
        <div class="mt-5 flex flex-col">
            <button class="p-1 px-5 text-base float-right bg-blue-600 text-white rounded-full focus:outline-none" type="submit">Save</button>
        </div>
    </form>
</x-app-layout>
