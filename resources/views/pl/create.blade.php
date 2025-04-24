<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Price List</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-indigo-100 to-blue-100 min-h-screen flex items-center justify-center text-gray-800">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">
        <h2 class="text-3xl font-bold text-center text-indigo-700 mb-6">Add PL Number</h2>

        @if(session('success'))
        <div class="mb-4 text-green-600 text-sm font-semibold text-center bg-green-100 p-2 rounded">
            {{ session('success') }}
        </div>
        @endif

        @if($errors->any())
        <div class="mb-4 text-red-600 text-sm bg-red-100 p-3 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form method="POST" action="{{ route('pl.submit') }}">
            @csrf
            <div class="mb-6">
                <label for="pl_number" class="block text-sm font-medium text-gray-700 mb-2">PL Number</label>
                <input type="text" id="pl_number" name="pl_number" value="{{ old('pl_number') }}" required
                    placeholder="Enter Price List Number"
                    class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
            </div>

            <div class="flex justify-between items-center">
                <button type="submit"
                    class="bg-blue-600 text-white px-5 py-2 rounded-md font-semibold hover:bg-blue-700 transition">
                    Submit
                </button>

                <a href="{{ url('/pl-manage') }}" class="text-sm text-blue-600 hover:underline transition">
                    View Duplicates
                </a>
            </div>
        </form>
    </div>
</body>

</html>