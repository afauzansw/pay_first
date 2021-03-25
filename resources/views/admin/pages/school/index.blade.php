<x-app-layout>
    @if (sizeof($school) > 0)
    <div class="mt-5 md:mt-0 md:col-span-2">
        <div class="bg-white shadow overflow-hidden sm:rounded-lg">
            <div class="px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 text-gray-900 font-semibold">
                    School Profile
                </h3>
                <p class="mt-1 max-w-2xl text-sm text-gray-500">
                    school details and contacts.
                </p>
            </div>
            <div class="border-t border-gray-200">
                <dl>
                    @foreach($school as $sch)
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            National School Identification Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $sch->npsn }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            School Name
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $sch->name }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Email address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $sch->email }}
                        </dd>
                    </div>
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Phone Number
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $sch->phone }}
                        </dd>
                    </div>
                    <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <dt class="text-sm font-medium text-gray-500">
                            Address
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                            {{ $sch->address }}
                        </dd>
                    </div>
                    @endforeach
                    <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                        <a href="{{ route('school.edit', $sch->id) }}" class="font-medium text-indigo-600 hover:text-indigo-500">Edit</a>
                    </div>
                </dl>
            </div>
        </div>
    </div>
    @else
        <div class="mt-auto p-10 content-center text-center">
            <img src="{{ asset('svg/no-data.svg') }}" class="w-96 lg:w-3/6 m-auto opacity-80" alt="">
            <p class="mb-2 text-gray-400">Complete your previous school profile.</p>
            <a href="{{ route('school.create') }}" class="px-4 py-2 text-md text-white bg-blue-600 rounded-full hover:bg-blue-700">Create Profile</a>
        </div>
    @endif
</x-app-layout>
