<x-app-layout>
    @if(sizeof($allBill) > 0 && sizeof($allStudent) > 0)
    <h1 class="text-2xl font-semibold text-black pb-3">New Transaction</h1>

    <div class="mx-6 mt-5 p-8 pt-3 pb-8 shadow-md bg-white rounded-lg">
        <!-- Form -->
        <form class="text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7" action="{{ route('transaction.store') }}" method="POST">
            @csrf
            {{-- <input type="text" class="hidden px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="users_id" name="users_id" required="" value="{{ Auth::user()->id }}" placeholder="Payer" aria-label="Payer"> --}}
            <div class="flex flex-col">
                <label class="leading-loose">Student Name</label>
                <select name="students_id" id="students_id" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                    <option value="">-- Choose Student --</option>
                    @foreach ($allStudent as $student)
                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Bill</label>
                {{-- <input type="text" class="hidden px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="bills_id" name="bills_id" required="" value="{{ $student->class }}" placeholder="Payer" aria-label="Payer"> --}}
                <select name="bills_id" id="bills_id" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                    <option value="">-- Choose Bill --</option>
                    @foreach ($allBill as $bill)
                        <option value="{{ $bill->id }}">Class {{ $bill->class }} - {{ $bill->year }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col">
                <label class="leading-loose">Amount</label>
                <input type="number" min="100000" max="" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="amount" name="amount" required="" placeholder="Amount" aria-label="Amount">
            </div>
            <div class="mt-5 flex flex-col">
                <button class="p-1 px-5 text-base float-right bg-blue-600 text-white rounded-full focus:outline-none" type="submit">Create</button>
            </div>
        </form>
    </div>
    @else
        <div class="text-center md:mt-10 sm:mt-5">
            <img src="{{ asset('svg/create-first.svg') }}" class="w-80 lg:w-96 m-auto mt-3 mb-3 opacity-80" alt="">
            <h3 class="text-xl text-gray-400">Upss..</h3>
            <p class="text-gray-500">Create <a href="{{ route('bill.index') }}" class="underline text-blue-500 hover:text-blue-400">billing data</a> and <a href="{{ route('student.create') }}" class="underline text-blue-500 hover:text-blue-400">student data</a>  first.</p>
        </div>
    @endif
</x-app-layout>
