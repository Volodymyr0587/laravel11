<!DOCTYPE html>
<html>
<head>
    <title>Dice Game</title>
    @vite(['resources/css/app.css'])
</head>

<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="text-center">
        <h1 class="text-2xl font-bold mb-4">Dice Game</h1>
        @if (isset($diceRolls))
        <div class="grid grid-rows-1 grid-flow-col gap-10 mt-20">
            @foreach ($diceImages as $image)
                <img class="h-24 w-24" src="{{ asset($image) }}" alt="Dice">
            @endforeach
        </div>
        <p class="mt-16 text-2xl font-bold">Your score: {{ $score }}</p>
        @else
        <p>Roll the dice!</p>
        @endif

        <form method="POST" action="{{ route('roll') }}" class="mt-4">
            @csrf
            <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded">Roll Dice</button>
        </form>
    </div>
</body>


</html>
