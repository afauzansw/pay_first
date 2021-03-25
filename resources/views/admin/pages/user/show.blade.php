<x-app-layout>
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 text-gray-900 font-semibold">
                    User Detail
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    {{-- Student data detail --}}
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>

                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            User ID
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->id }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->name }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Username
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->username }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Role
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            @foreach ($user->roles as $role )
                                @if ($role->title=='Admin')
                                <span class="inline-flex text-xs leading-5 font-semibold bg-blue-100 text-blue-800 rounded-full px-2">{{ $role->title }}</span>
                                @elseif ($role->title=='Cashier')
                                <span class="inline-flex text-xs leading-5 font-semibold bg-green-100 text-green-800 rounded-full px-2">{{ $role->title }}</span>
                                @else
                                <span class="inline-flex text-xs leading-5 font-semibold bg-yellow-100 text-yellow-800 rounded-full px-2">{{ $role->title }}</span>
                                @endif
                            @endforeach
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Created At
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $user->created_at }}
                        </dd>
                    </div>

                    <div class="px-4 py-3 bg-white text-right sm:px-6">
                        <a href="{{ route('user.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Back
                        </a>
                    </div>
                </dl>
            </div>
        </div>
    </div>
</x-app-layout>
