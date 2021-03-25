<div>
    <input wire:model="search" type="search" class="py-2 px-4 text-sm float-left border-1 rounded-full" placeholder="Search posts by title...">

    {{-- <h1>Search Results:</h1> --}}

    <ul>
        @foreach($students as $student)
            <li>{{ $student->name }}</li>
        @endforeach
    </ul>
</div>
