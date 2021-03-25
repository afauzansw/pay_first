<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3">User Profile</h1>

    <div class="mt-5 md:mt-0 md:col-span-2">
        <form action="{{ route('user.update', $user->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="sm:mx-7 m-3 shadow-lg overflow-hidden sm:rounded-lg">
                <div class="px-5 py-6 bg-white sm:p-6">
                    <div class="grid grid-cols-6 gap-6">
                        <div class="col-span-6 sm:col-span-6">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" value="{{ $user->name }}" name="name" id="name" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                            <input type="text" value="{{ $user->username }}" name="username" id="username" autocomplete="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        </div>

                        <div class="col-span-6 sm:col-span-3">
                            <label for="role" value="Role">Role</label>
                            <select name="role" required class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" id="role">
                                <option value="0">Choose</option>
                                <option @if ($user->role=='Admin') {{ 'selected' }} @endif value="Admin">Admin</option>
                                <option @if ($user->role=='Kasir') {{ 'selected' }} @endif value="Kasir">Kasir</option>
                            </select>
                        </div>

                        <div class="col-span-6 sm:col-span-6">
                            <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                            <input type="password" name="password" id="password" autocomplete="given-name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
