<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3">School Profile</h1>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('school.store')}}" method="POST">
            @csrf
            <div class="sm:mx-7 m-3 shadow-lg overflow-hidden sm:rounded-lg">
                <div class="px-5 py-6 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-2">
                            <label for="npsn" class="block text-sm font-medium text-gray-700">NPSN</label>
                            <input type="number" value="" name="npsn" id="npsn" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">School Name</label>
                            <input type="text" value="" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="text" value="" name="email" id="email" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" value="" name="phone" id="phone" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6">
                            <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                            <textarea type="text" name="address" id="address" autocomplete="street-address" rows="5" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
