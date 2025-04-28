<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Duplicate PL Numbers</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-r from-pink-100 to-purple-100 min-h-screen p-6 text-gray-800">
    <div class="max-w-6xl mx-auto bg-white p-8 rounded-2xl shadow-2xl">
        <h2 class="text-3xl font-extrabold text-center text-purple-700 mb-8">📋 Duplicate PL Records</h2>
        <a href="{{ route('pl.create') }}"
            class="absolute left-5 top-6 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full font-semibold shadow-md transition">
            ➕ Add New PL
        </a>
        <a href="{{ route('pl.all') }}"
            class="absolute right-10 top-6 bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-full font-semibold shadow-md transition">
            View All
        </a>
        @if(session('success'))
        <div class="mb-6 text-green-700 font-semibold text-center bg-green-100 p-3 rounded-md shadow">
            {{ session('success') }}
        </div>
        @endif


        @if($errors->any())
        <div class="mb-6 text-red-700 font-semibold text-center bg-red-100 p-3 rounded-md shadow">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if($records->isEmpty())
        <p class="text-center text-gray-600 text-lg">✅ No duplicate PL numbers found.</p>
        @else
        <div class="overflow-x-auto rounded-xl border border-gray-300">
            <table class="min-w-full divide-y divide-gray-300">
                <!-- <thead class="bg-purple-100 text-purple-800 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left">Keep</th>
                        <th class="px-4 py-3 text-left">Merge</th>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">PL Number</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead> -->
                <thead class="bg-purple-100 text-purple-800 text-sm">
                    <tr>
                        <th class="px-4 py-3 text-left">Keep</th>
                        <th class="px-4 py-3 text-left">Merge</th>
                        <th class="px-4 py-3 text-left ">
                            <a href="{{ route('pl.manage', ['sort' => 'id', 'direction' => $sortColumn === 'id' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}"
                                class="">
                                ID
                                @if($sortColumn === 'id')
                                @if($sortDirection === 'asc')
                                🔼
                                @else
                                🔽
                                @endif
                                @endif
                            </a>
                        </th>
                        <th class="px-4 py-3 text-left">
                            <a href="{{ route('pl.manage', ['sort' => 'pl_number', 'direction' => $sortColumn === 'pl_number' && $sortDirection === 'asc' ? 'desc' : 'asc']) }}"
                                class="">
                                PL Number
                                @if($sortColumn === 'pl_number')
                                @if($sortDirection === 'asc')
                                🔼
                                @else
                                🔽
                                @endif
                                @endif
                            </a>
                        </th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($records as $record)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-4 py-3">
                            <input type="radio" form="mergeForm" name="keep_id" value="{{ $record->id }}">
                        </td>
                        <td class="px-4 py-3">
                            <input type="checkbox" form="mergeForm" name="merge_ids[]" value="{{ $record->id }}">
                        </td>
                        <td class="px-4 py-3">{{ $record->id }}</td>
                        <td class="px-4 py-3">{{ $record->pl_number }}</td>
                        <td class="px-4 py-3 space-x-2">
                            {{-- Delete --}}
                            <form method="POST" action="{{ route('pl.delete', $record->id) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800 text-sm font-medium"
                                    onclick="return confirm('Delete this record?')">
                                    🗑️ Delete
                                </button>
                            </form>

                            {{-- Update --}}
                            <form method="POST" action="{{ route('pl.update', $record->id) }}" class="inline-block">
                                @csrf
                                @method('PUT')
                                <input type="text" name="pl_number" value="{{ $record->pl_number }}"
                                    class="border border-gray-300 rounded-md px-2 py-1 w-32 text-sm focus:ring focus:ring-blue-300"
                                    required>
                                <button type="submit"
                                    class="text-blue-600 hover:text-blue-800 ml-1 text-sm font-medium">
                                    ✏️ Update
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Merge Form --}}
        <form method="POST" action="{{ route('pl.merge') }}" id="mergeForm" class="mt-8 text-center">
            @csrf
            <button type="submit" onclick="return confirm('Merge selected records?')"
                class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-2 rounded-full font-semibold transition shadow-md">
                🔁 Merge Selected
            </button>
        </form>
        @endif
    </div>
</body>

</html>