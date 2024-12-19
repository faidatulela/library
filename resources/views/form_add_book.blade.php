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
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Add Books</h2>
        <!-- Form begins here -->
        <form action="{{ route('add-book') }}" method="POST">
          @csrf
          
          <!-- Nama Buku -->
          <div class="mb-4">
            <label for="bookName" class="block text-sm font-medium text-gray-700">Book</label>
            <input 
              type="text" 
              id="bookName" 
              name="bookName" 
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500" 
              value="{{ old('bookName') }}" 
              required 
              placeholder="Enter book name"
            />
            @error('bookName')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Penulis -->
          <div class="mb-4">
            <label for="author" class="block text-sm font-medium text-gray-700">Author</label>
            <input 
              type="text" 
              id="author" 
              name="author" 
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500" 
              value="{{ old('author') }}" 
              required 
              placeholder="Enter author name"
            />
            @error('author')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Submit Button -->
          <div class="flex justify-end">
            <button 
              type="submit" 
              class="bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-300">
              Add Book
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>
</body>
</html>
