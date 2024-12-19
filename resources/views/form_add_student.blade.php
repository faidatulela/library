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
      <h1 class="text-3xl font-bold tracking-tight text-gray-900">Student Management</h1>
    </div>
  </header>

  <main>
    <div class="min-h-screen bg-gray-100 flex items-start justify-center">
      <div class="w-full max-w-7xl bg-white shadow-lg rounded-lg mt-6 p-6">
        <h2 class="text-2xl font-semibold text-gray-900 mb-4">Add Student</h2>
        <!-- Form begins here -->
        <form action="{{ route('student.store') }}" method="POST">
          @csrf
          
          <!-- Student Name -->
          <div class="mb-4">
            <label for="studentName" class="block text-sm font-medium text-gray-700">Student Name</label>
            <input 
              type="text" 
              id="studentName" 
              name="studentName" 
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500" 
              value="{{ old('studentName') }}" 
              required 
              placeholder="Enter student's name"
            />
            @error('studentName')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Class -->
          <div class="mb-4">
            <label for="class" class="block text-sm font-medium text-gray-700">Class</label>
            <input 
              type="text" 
              id="class" 
              name="class" 
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500" 
              value="{{ old('class') }}" 
              required 
              placeholder="Enter class"
            />
            @error('class')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Contact -->
          <div class="mb-4">
            <label for="contact" class="block text-sm font-medium text-gray-700">Contact</label>
            <input 
              type="text" 
              id="contact" 
              name="contact" 
              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 text-gray-900 focus:ring-indigo-500 focus:border-indigo-500" 
              value="{{ old('contact') }}" 
              required 
              placeholder="Enter contact number"
            />
            @error('contact')
              <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
          </div>

          <!-- Submit Button -->
          <div class="flex justify-end">
            <button 
              type="submit" 
              class="bg-indigo-600 text-white font-medium py-2 px-4 rounded-lg hover:bg-indigo-500 focus:outline-none focus:ring focus:ring-indigo-300">
              Add Student
            </button>
          </div>
        </form>
      </div>
    </div>
  </main>
</div>
</body>
</html>
