<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="bg-blue-300 text-white w-64 p-4 ">
            <h2 class="text-2xl font-bold mb-6">Admin Panel</h2>
            <ul>
                <li class="mb-4"><a href="{{ route('dashboard') }}" class="hover:text-gray-300">Dashboard</a></li>
                <li class="mb-4"><a href="{{ route('profile.edit') }}" class="hover:text-gray-300">Profile</a></li>
                <li class="mb-4"><a href="{{ route('events.index') }}" class="hover:text-gray-300">Events</a></li>
                <li class="mb-4"><a href="{{ route('users.index') }}" class="hover:text-gray-300">Users</a></li>
                <li class="mb-4"><a href="{{ route('services.index') }}" class="hover:text-gray-300">Services</a></li>
                <li class="mb-4"><a href="{{ route('reports.index') }}" class="hover:text-gray-300">Reports</a></li>
                <li class="mb-4"><a href="{{ route('reports.activityPerformance') }}" class="hover:text-gray-300">Activity Performance</a></li>
            </ul>
        </div>
         <!-- content here -->
         @yield('content')
    </div>   
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>