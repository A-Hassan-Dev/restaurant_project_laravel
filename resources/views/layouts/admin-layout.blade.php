<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Dashboard') | Restaurant Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Font Awesome -->
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

<button class="btn btn-dark d-lg-none position-fixed top-0 start-0 m-3"
        id="sidebarToggle" style="z-index:1100">
    <i class="fa-solid fa-bars"></i>
</button>

<div class="admin-wrapper">

    <!-- Sidebar -->
    <nav class="sidebar" id="sidebar">
        <h4 class="text-center">Restaurant Admin</h4>

        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link">
                    <i class="fa-solid fa-chart-line me-2"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('categories.index') }}" class="nav-link">
                    <i class="fa-solid fa-list me-2"></i> Categories
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('meals.index') }}" class="nav-link">
                    <i class="fa-solid fa-utensils me-2"></i> Meals
                </a>
            </li>

            <li class="nav-item px-3 mt-4">
                <a href="{{ route('home') }}" class="btn btn-primary w-100 mb-2">
                    <i class="fa-solid fa-house me-1"></i> Home
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-danger w-100">
                        <i class="fa-solid fa-right-from-bracket me-1"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Overlay -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Content -->
    <main class="content-area">
        <div class="content-card">
            <h2 class="mb-4">@yield('title')</h2>
            @yield('content')
        </div>
    </main>

</div>

<script>
    const toggle = document.getElementById('sidebarToggle');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');

    toggle.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.classList.remove('active');
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
