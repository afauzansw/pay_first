<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Tailwind -->
    <style>
        html{line-height:1.15;-webkit-text-size-adjust:100%}
        body{margin:0}
        .grid{display:grid}
        .bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}
        .gap-6{grid-gap:1.5rem;gap:1.5rem}
        .text-sm{font-size:.875rem}
        .text-lg{font-size:1.125rem}
        .text-xl{font-size:1.25rem}
        .text-2xl{font-size:1.5rem}
        .text-gray-700{--text-opacity:1;color:#24262d;color:rgba(36,38,45,var(--text-opacity))}
    </style>

</head>
<body>
    <div class="m-4">
        <div class="text-center text-blue-700">
            @foreach($school as $sch)
                <h3 class="text-xl">{{ $sch->name }}</h3>
                <h5 class="text-base">{{ $sch->address }}</h5>
                <p class="text-sm">Telp. {{ $sch->phone }} E-mail : {{ $sch->email }}</p>
            @endforeach
            <h4 class="mt-6 font-semibold text-2xl">School Payment Receipt</h4>
        </div>

        <div class="">
            <div class="col-span-6">
                <h3 class="text-sm font-medium text-gray-700">TRX ID</h3>
                <p class="">{{ $transaction->id }}</p>
            </div>

            <div class="col-span-6">
                <h3 class="text-sm font-medium text-gray-700">Time</h3>
                <p>{{ $transaction->created_at }}</p>
            </div>

            <div class="col-span-6">
                <h3 class="text-sm font-medium text-gray-700">Payer</h3>
                <p>{{ $transaction->user->name }}</p>
            </div>

            <div class="col-span-6">
                <h3 class="text-sm font-medium text-gray-700">Name</h3>
                <p>{{ $transaction->student->name }}</p>
            </div>

            <div class="col-span-6">
                <h3 class="text-sm font-medium text-gray-700">Payment For</h3>
                <p>Class {{ $transaction->bill->class }}</p>
            </div>

            <div class="col-span-6">
                <h3 class="text-sm font-medium text-gray-700">Amount</h3>
                <p>Rp {{ $transaction->amount }}</p>
            </div>
        </div>
    </div>
</body>
</html>
