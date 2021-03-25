<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3"> Bill Data </h1>
    <p class="text-xs text-gray-500 mb-6">Dashboard > Bill Data > Edit</p>

    <div class="m-5 p-6 bg-white rounded-lg shadow-md">
        <!-- Form -->
        <form class="text-base leading-6 text-gray-700 sm:text-lg sm:leading-7" action="{{ route('bill.update', $bill->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="flex flex-col">
                <div class="flex flex-col">
                    <label class="leading-loose">Class</label>
                    <select name="class" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="class">
                        <option value="0">Choose</option>
                        <option @if ($bill->class=='X') {{ 'selected' }} @endif value="X">X</option>
                        <option @if ($bill->class=='XI') {{ 'selected' }}  @endif value="XI">XI</option>
                        <option @if ($bill->class=='XII') {{ 'selected' }}  @endif value="XII">XII</option>
                    </select>
                </div>
                <div class="flex flex-col">
                    <label class="leading-loose">Year</label>
                    <input type="number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="year" name="year" value="{{ $bill->year }}" required="" placeholder="Year" aria-label="Year">
                </div>
                <div class="flex flex-col">
                    <label class="leading-loose">Nominal</label>
                    <input type="number" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="nominal" name="nominal" value="{{ $bill->nominal }}" required="" placeholder="Nominal" aria-label="Nominal">
                </div>
            </div>

            <!--Button-->
            <div class="pt-4 flex items-center">
                <button class="bg-blue-500 flex justify-center items-center w-2/12 text-white rounded-full focus:outline-none" type="submit">Edit</button>
            </div>
        </form>
    </div>
</x-app-layout>
