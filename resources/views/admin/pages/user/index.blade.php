<x-app-layout>
    <h1 class="text-2xl font-semibold text-black pb-3">User List</h1>
    <p class="text-xs text-gray-500 mb-6">Dashboard > User List</p>

    <div class="flex relative">
        <a href="{{ route('user.create') }}" class="py-2 px-4 text-sm bg-green-600 hover:bg-green-700 text-white rounded-full">
            <i class="fas fa-plus mr-2"></i>
            Add User
        </a>
    </div>

    <div class="mt-4 flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Role</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Username</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($users as $user)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full" src="{{ $user->profile_photo_url }}" alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->name }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $user->email }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @foreach ($user->roles as $role )
                                    @if ($role->title=='Admin')
                                    <span class="inline-flex text-xs leading-5 font-semibold bg-blue-100 text-blue-800 rounded-full px-2">{{ $role->title }}</span>
                                    @elseif ($role->title=='Cashier')
                                    <span class="inline-flex text-xs leading-5 font-semibold bg-green-100 text-green-800 rounded-full px-2">{{ $role->title }}</span>
                                    @else
                                    <span class="inline-flex text-xs leading-5 font-semibold bg-yellow-100 text-yellow-800 rounded-full px-2">{{ $role->title }}</span>
                                    @endif
                                @endforeach
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $user->username }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                    <a href="{{ route('user.show', $user->id) }}" class=" mr-2 rounded-md text-blue-600">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <a href="{{ route('user.edit', $user->id) }}" class=" mr-2 rounded-md text-green-600">
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
            </div>
          </div>
        </div>
    </div>
</x-app-layout>
