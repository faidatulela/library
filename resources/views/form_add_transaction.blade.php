<!doctype html>
<html class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="h-full">
    <div class="min-h-full">
        <nav class="bg-gray-800" x-data="{ isOpen: false }">
            <!-- Navigation code here -->
        </nav>

        <header class="bg-white shadow">
            <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                <h1 class="text-3xl font-bold tracking-tight text-gray-900">Library App</h1>
            </div>
        </header>

        <main>
            <div class="min-h-screen bg-gray-100 flex items-start justify-center">
                <div class="w-full max-w-7xl bg-white shadow-lg rounded-lg mt-6 p-6">
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">Book Borrowing</h2>
                    <!-- Form untuk peminjaman buku -->
                    <form action="{{ route('transaction.store') }}" method="POST">
                        @csrf

                        <!-- Student -->
                        <div class="mb-4">
                            <label for="student" class="block text-sm font-medium text-gray-700">Student</label>
                            <select name="student_id" id="student"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-white text-gray-900 focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                            @error('student_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Book -->
                        <div class="mb-4">
                            <label for="book" class="block text-sm font-medium text-gray-700">Book</label>
                            <select name="book_id" id="book"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 bg-white text-gray-900 focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach ($books as $book)
                                    <option value="{{ $book->id }}">{{ $book->title }}</option>
                                @endforeach
                            </select>
                            @error('book_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Pinjam -->
                        <div class="mb-4">
                            <label for="borrow_date" class="block text-sm font-medium text-gray-700">Borrow Date</label>
                            <input type="date" id="borrowed_at" name="borrowed_at"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('borrow_date') }}" required />
                            @error('borrow_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Tanggal Kembali -->
                        <div class="mb-4">
                            <label for="return_date" class="block text-sm font-medium text-gray-700">Return Date</label>
                            <input type="date" id="returned_at" name="returned_at"
                                class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500"
                                value="{{ old('return_date') }}" required />
                            @error('return_date')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit"
                                class="bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-300">
                                Borrow Book
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
