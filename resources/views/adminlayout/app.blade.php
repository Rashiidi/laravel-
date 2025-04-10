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
    <div class="bg-gradient-to-b from-blue-800 to-blue-900 text-white w-64 p-4 shadow-xl transform transition-transform duration-300 hover:shadow-2xl">
        <div class="flex items-center justify-center mb-8">
            <h2 class="text-2xl font-bold text-white tracking-wide">
                <i class="fas fa-user-shield mr-2"></i>Admin Panel
            </h2>
        </div>
        <ul class="space-y-2">
            <li>
                <a href="{{ route('dashboard') }}" class="flex items-center p-3 rounded-lg transition-all duration-300 hover:bg-blue-700 hover:translate-x-2">
                    <i class="fas fa-tachometer-alt w-6 text-center"></i>
                    <span class="ml-3 font-medium">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile.edit') }}" class="flex items-center p-3 rounded-lg transition-all duration-300 hover:bg-blue-700 hover:translate-x-2">
                    <i class="fas fa-user-circle w-6 text-center"></i>
                    <span class="ml-3 font-medium">Profile</span>
                </a>
            </li>
            
            <li>
                <a href="{{ route('events.index') }}" class="flex items-center p-3 rounded-lg transition-all duration-300 hover:bg-blue-700 hover:translate-x-2">
                    <i class="fas fa-calendar-alt w-6 text-center"></i>
                    <span class="ml-3 font-medium">Events</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" class="flex items-center p-3 rounded-lg transition-all duration-300 hover:bg-blue-700 hover:translate-x-2">
                    <i class="fas fa-users w-6 text-center"></i>
                    <span class="ml-3 font-medium">Users</span>
                </a>
            </li>
            <li>
                <a href="{{ route('services.index') }}" class="flex items-center p-3 rounded-lg transition-all duration-300 hover:bg-blue-700 hover:translate-x-2">
                    <i class="fas fa-concierge-bell w-6 text-center"></i>
                    <span class="ml-3 font-medium">Services</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reports.index') }}" class="flex items-center p-3 rounded-lg transition-all duration-300 hover:bg-blue-700 hover:translate-x-2">
                    <i class="fas fa-file-alt w-6 text-center"></i>
                    <span class="ml-3 font-medium">Reports</span>
                </a>
            </li>
            <li>
                <a href="{{ route('reports.activityPerformance') }}" class="flex items-center p-3 rounded-lg transition-all duration-300 hover:bg-blue-700 hover:translate-x-2">
                    <i class="fas fa-chart-line w-6 text-center"></i>
                    <span class="ml-3 font-medium">Activity Performance</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- content here -->
    @yield('content')
</div>  
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>