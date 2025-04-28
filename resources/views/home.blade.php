<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Project</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
    class="bg-gradient-to-r from-green-100 to-blue-100 min-h-screen flex flex-col justify-between items-center text-gray-800">
    <!-- Main Content -->
    <div class="w-full max-w-2xl bg-white rounded-2xl shadow-xl p-8 text-center mt-30">
        <h1 class="text-4xl font-extrabold text-blue-700 mb-6">Welcome to Our Project</h1>
        <p class="text-lg text-gray-600 mb-8">Manage your Price Lists with ease!</p>

        <div class="flex justify-center space-x-6 mb-8">
            <!-- Button to PL Form -->
            <a href="{{ route('pl.create') }}"
                class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-full font-semibold shadow-md transition">
                ➕ Add New PL
            </a>

            <!-- Button to PL Manage -->
            <a href="{{ route('pl.manage') }}"
                class="bg-purple-500 hover:bg-purple-600 text-white px-6 py-3 rounded-full font-semibold shadow-md transition">
                📋 Manage PLs
            </a>
        </div>

        <!-- Deduplication Information -->
        <div class="bg-gray-100 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-700 mb-4">🔍 Deduplication of Price Lists</h2>
            <p class="text-gray-600 text-sm leading-relaxed">
                Our system helps you identify and manage duplicate entries in your price lists. You can:
            </p>
            <ul class="list-disc list-inside text-gray-600 text-sm mt-4">
                <li>Merge duplicate entries while keeping one as the primary record.</li>
                <li>Delete unnecessary duplicates to maintain a clean and accurate database.</li>
                <li>Sort and filter records to easily find and manage duplicates.</li>
            </ul>
            <p class="text-gray-600 text-sm mt-4">
                Use the <strong>Manage PLs</strong> page to view and handle duplicate entries efficiently.
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer class="w-full text-center text-gray-600 text-xl mt-8 mb-5">
        Made by <strong>Charu</strong> and <strong>Suraj</strong>
    </footer>
</body>

</html>