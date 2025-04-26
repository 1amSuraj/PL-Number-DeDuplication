<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Price List Records</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-green-100 to-blue-100 min-h-screen p-6 text-gray-800">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-2xl shadow-2xl">
        <h2 class="text-3xl font-extrabold text-center text-blue-700 mb-8">📋 All Price List Records</h2>
        <a href="{{ route('pl.create') }}"
            class="absolute left-5 top-6 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full font-semibold shadow-md transition">
            ➕ Add New PL
        </a>

        @if($records->isEmpty())
        <p class="text-center text-gray-600 text-lg">✅ No records found in the database.</p>
        @else
        <div class="overflow-x-auto rounded-xl border border-gray-300">
            <table class="min-w-full divide-y divide-gray-300">
                <thead class="bg-blue-100 text-blue-800 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">PL Number</th>
                        <th class="px-4 py-3 text-left">Created At</th>
                        <th class="px-4 py-3 text-left">Updated At</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($records as $record)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">{{ $record->id }}</td>
                        <td class="px-4 py-3">{{ $record->pl_number }}</td>
                        <td class="px-4 py-3">{{ $record->created_at }}</td>
                        <td class="px-4 py-3">{{ $record->updated_at }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>
</body>

</html>