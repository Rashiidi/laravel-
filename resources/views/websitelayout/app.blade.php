<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Club</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        .upcoming-events {
            background-color: #f8f9fa; /* Light background */
        }

        .section-title {
            font-size: 2.5rem; /* Larger font size for the title */
            margin-bottom: 2rem; /* Space below the title */
            color: #343a40; /* Darker text color */
        }

        .event-card {
            background-color: #ffffff; /* White background for event cards */
            border: 1px solid #dee2e6; /* Light border */
            border-radius: 8px; /* Rounded corners */
            padding: 20px; /* Padding inside the card */
            margin-bottom: 30px; /* Space between cards */
            transition: transform 0.3s; /* Smooth transition for hover effect */
        }

        .event-card:hover {
            transform: translateY(-5px); /* Lift effect on hover */
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Shadow effect on hover */
        }

        .event-card h4 {
            color: #007bff; /* Blue color for event titles */
        }

        .event-card p {
            color: #000000; /* Black color for paragraph text */
        }

        .btn-info {
            background-color: #007bff; /* Bootstrap primary color */
            border-color: #007bff; /* Match border color */
        }

        .btn-info:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3; /* Match border color */
        }
    </style>
</head>
<body class="bg-gray-900 text-white font-roboto">
<header class="flex justify-between items-center p-6 bg-gray-800">
    <div class="flex items-center">
        <img alt="Fitness Club Logo" class="h-10 w-10" height="50" src="https://storage.googleapis.com/a1aa/image/kR40XUiHCrLkWC8pNcoJ170VlQk5sEPJQfXi4d9EkIo.jpg" width="50"/>
        <span class="ml-2 text-xl font-bold text-red-500">FitClub</span>
    </div>
    <nav class="hidden md:flex items-center gap-6">
        <a class="text-white hover:text-red-500 transition-colors" href="welcome">Home</a>
        <a class="text-white hover:text-red-500 transition-colors" href="#">About</a>
        <a class="text-white hover:text-red-500 transition-colors" href="/showServices">Services</a>
        <a class="text-white hover:text-red-500 transition-colors" href="/showEvents">Events</a>
        <a class="text-white hover:text-red-500 transition-colors" href="contact">Contact</a>
        
        <div class="flex items-center gap-4 ml-4">
            <a href="/login" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                Log in
            </a>
            <a href="/register" class="border border-white hover:border-red-500 text-white hover:text-red-500 px-4 py-2 rounded-md text-sm font-medium transition-colors">
                Register
            </a>
        </div>
    </nav>
</header>
@yield('content')
<!-- cdn js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>