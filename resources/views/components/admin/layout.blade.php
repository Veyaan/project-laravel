<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="min-h-screen bg-gray-900">
    <div class="min-h-screen antialiased bg-gray-900">
    <!-- Navbar -->
    <x-admin.navbar/>


    <!-- Sidebar -->
    <x-admin.sidebar/>

    <!-- Main content -->
    <main class="min-h-screen p-4 md:ml-64 pt-20 bg-gray-900">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">
            {{ $slot }}
        </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>

</body>
</html>
