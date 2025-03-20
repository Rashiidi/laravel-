<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trainer Dashboard</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    /* Custom Variables */
    :root {
      --sidebar-width: 16rem;
      --sidebar-bg: linear-gradient(180deg, #1e3a8a, #1e40af);
      --hover-bg: #2563eb;
      --active-bg: #1e40af;
      --transition-speed: 0.3s;
    }

    body {
      font-family: 'Arial', sans-serif;
      background-color: #f9fafb;
      margin: 0;
    }

    /* Sidebar Styling */
    aside {
      width: var(--sidebar-width);
      background: var(--sidebar-bg);
      color: #fff;
      position: fixed;
      top: 0;
      left: 0;
      height: 100vh;
      overflow-y: auto;
      padding: 1rem;
      box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
    }

    aside h1 {
      font-size: 1.75rem;
      margin-bottom: 1.5rem;
      padding-bottom: 0.5rem;
      border-bottom: 1px solid rgba(255, 255, 255, 0.3);
    }

    aside nav ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    aside nav ul li {
      margin-bottom: 0.75rem;
    }

    aside nav ul li a {
      display: flex;
      align-items: center;
      padding: 0.75rem 1rem;
      border-radius: 0.5rem;
      color: #fff;
      text-decoration: none;
      transition: background var(--transition-speed), transform var(--transition-speed);
    }

    aside nav ul li a:hover {
      background-color: var(--hover-bg);
      transform: translateX(4px);
    }

    aside nav ul li a.active {
      background-color: var(--active-bg);
      font-weight: bold;
    }

    aside nav ul li a i {
      margin-right: 0.75rem;
      font-size: 1.2rem;
    }

    /* Main Content Styling */
    main {
      margin-left: var(--sidebar-width);
      padding: 2rem;
      min-height: 100vh;
      background-color: #f9fafb;
    }

    .content-container {
      background: #fff;
      border-radius: 0.5rem;
      padding: 2rem;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
  </style>
</head>
<body>
  <div class="d-flex">
    <!-- Sidebar -->
    <aside>
      <div class="p-3">
        <h1>Trainer Panel</h1>
        <nav>
          <ul>
            <li>
              <a href="{{ route('trainer.dashboard') }}" class="{{ request()->routeIs('trainer.dashboard') ? 'active' : '' }}">
                <i class="fas fa-home"></i> Dashboard
              </a>
            </li>
            <li>
              <a href="{{ route('trainer.reports') }}" class="{{ request()->routeIs('trainer.reports') ? 'active' : '' }}">
                <i class="fas fa-chart-bar"></i> Reports
              </a>
            </li>
            <li class="mt-4 pt-3 border-top border-light">
              <a href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <!-- Main Content -->
    <main>
      <div class="content-container mx-auto">
        @yield('content')
      </div>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
