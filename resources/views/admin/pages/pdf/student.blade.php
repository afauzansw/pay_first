<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Student List</title>

    {{-- <!-- Tailwind -->
    <link href="{{ asset('css/tailwind.output.css') }}" rel="stylesheet">

    <!-- CSS Master -->
    <link href="{{ asset('css/master.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"> --}}

</head>
<body>
    <div class="m-5">
        <h3 class="text-center text-3xl font-semibold">Student List</h3>
        <h4></h4>
        <table class="mt-3 text-left w-full border-collapse">
            <thead>
                <tr>
                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm">NISN</th>
                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm">Name</th>
                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm">Class</th>
                    <th class="py-4 px-6 bg-gray-100 font-bold uppercase text-sm">Address</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($student as $stu)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-4 px-6 border-b border-gray-100">{{ $stu->nisn }}</td>
                    <td class="py-4 px-6 border-b border-gray-100">{{ $stu->name }}</td>
                    <td class="py-4 px-6 border-b border-gray-100">{{ $stu->class }} {{ $stu->major }}</td>
                    <td class="py-4 px-6 border-b border-gray-100">{{ $stu->address }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
