<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> User List - Pay First </title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <!-- Tailwind -->
    <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet">

    <!-- CSS Master -->
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>

</head>
<body class="bg-gray-100 font-family-karla flex">

    <!-- Sidebar -->
    @include('admin.layout.sidebar')

    <div class="relative w-full flex flex-col h-screen overflow-y-hidden">

        <!-- Header & Nav -->
        @include('admin.layout.header')

        <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
            <main class="w-full flex-grow p-6">
                <h1 class="text-2xl font-semibold text-black pb-3">User List</h1>
                <p class="text-xs text-gray-500 mb-6">Dashboard > User List</p>
                <div class="rounded-lg shadow-md">
                    <table class="text-left w-full border-collapse bg-white"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                        <thead>
                            <tr>
                                <th class="py-4 px-6 bg-gray-50 font-bold uppercase text-sm text-gray-700 border-b border-gray-100">Name</th>
                                <th class="py-4 px-6 bg-gray-50 font-bold uppercase text-sm text-gray-700 border-b border-gray-100">Role</th>
                                <th class="py-4 px-6 bg-gray-50 font-bold uppercase text-sm text-gray-700 border-b border-gray-100">Username</th>
                                <th class="py-4 px-6 bg-gray-50 font-bold uppercase text-sm text-gray-700 border-b border-gray-100">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $use)
                            <tr class="hover:bg-grey-lighter">
                                <td class="py-4 px-6 border-b border-gray-100">{{ $use->name }}</td>
                                <td class="py-4 px-6 border-b border-gray-100"><span class="inline-flex text-xs leading-5 font-semibold bg-green-100 text-green-800 rounded-full px-2">{{ $use->role }}</span></td>
                                <td class="py-4 px-6 border-b border-gray-100">{{ $use->username }}</td>
                                <td class="py-4 px-6 border-b border-gray-100">
                                    <form action="{{ route('user.destroy', $use->id) }}" method="POST">
                                        <a href="{{ route('user.show', $use->id) }}" class="modal-open mr-2 rounded-md text-blue-600">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        <a href="{{ route('user.edit', $use->id) }}" class=" mr-2 rounded-md text-green-600">
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
            </main>

            <!-- Footer -->
            @include('admin.layout.footer')

        </div>

    </div>

    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>
</html>
