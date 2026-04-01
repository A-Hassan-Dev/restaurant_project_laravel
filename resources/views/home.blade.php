<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>

    @include('layouts.navigation')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1 class="display-3 fw-bold">Welcome to Our Restaurant</h1>
            <p class="lead mt-3">Discover exquisite flavors and unforgettable dining experiences</p>
            <a href="#menu" class="btn btn-outline-light btn-lg mt-4">Explore Menu</a>
        </div>
    </section>

    <!-- Menu Section -->
    <section id="menu" class="py-5 bg-white">
        <div class="container my-5">
            <h2 class="text-center mb-5 display-5 fw-bold">Our Delicious Menu</h2>

            <!-- Categories Filter -->
            <div class="text-center mb-5">
                <button class="btn btn-outline-dark category-btn mx-2 mb-3 active" data-category="all">All
                    Items</button>
                @foreach ($categories as $category)
                    <button class="btn btn-outline-dark category-btn mx-2 mb-3" data-category="{{ $category->name }}">
                        {{ $category->name }}
                    </button>
                @endforeach
            </div>

            <!-- Meals Grid -->
            <!-- Meals Grid -->
            <div class="row g-4" id="meals-container">
                @foreach ($meals as $meal)
                    <div class="col-md-6 col-lg-4 meal-item" data-category="{{ $meal->category->name }}">
                        <div class="card meal-card h-100">
                            @if ($meal->image)
                                <img src="{{ asset('storage/' . $meal->image) }}" class="card-img-top meal-img"
                                    alt="{{ $meal->name }}">
                            @else
                                <img src="https://via.placeholder.com/400x250?text={{ $meal->name }}"
                                    class="card-img-top meal-img" alt="{{ $meal->name }}">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title fw-bold">{{ $meal->name }}</h5>
                                <p class="card-text flex-grow-1 text-muted">{{ $meal->description }}</p>
                                <div class="d-flex justify-content-between align-items-center mt-3">
                                    <span class="price">${{ number_format($meal->price, 2) }}</span>
                                    <a href="{{ route('dashboard') }}" class="btn btn-outline-dark btn-sm">Order Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <!-- Empty Message -->
                <p id="no-items-msg" class="text-center fs-4 text-muted mt-4" style="display:none;">No meals available
                    for this category.</p>
            </div>


    </section>

    <!-- Footer -->
    <footer class="text-center text-lg-start">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>About Us</h5>
                    <p>A premium dining experience with fresh ingredients and exceptional service.</p>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <h5>Opening Hours</h5>
                    <p>Monday - Friday: 11am - 10pm<br>Saturday - Sunday: 10am - 11pm</p>
                </div>
                <div class="col-lg-4 col-md-12 mb-4">
                    <h5>Contact</h5>
                    <p>Email: info@restaurant.com<br>Phone: +1 234 567 890</p>
                </div>
            </div>
            <div class="text-center p-3 border-top">
                &copy; <?= date('Y') ?> Restaurant . All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const buttons = document.querySelectorAll(".category-btn");
            const items = document.querySelectorAll(".meal-item");
            const noMsg = document.getElementById("no-items-msg");

            function updateVisibility(category) {
                let anyVisible = false;
                items.forEach(item => {
                    if (category === "all" || item.getAttribute("data-category") === category) {
                        item.style.display = "block";
                        anyVisible = true;
                    } else {
                        item.style.display = "none";
                    }
                });
                noMsg.style.display = anyVisible ? "none" : "block";
            }

            buttons.forEach(btn => {
                btn.addEventListener("click", () => {
                    buttons.forEach(b => b.classList.remove("active"));
                    btn.classList.add("active");

                    const category = btn.getAttribute("data-category");
                    updateVisibility(category);
                });
            });
            updateVisibility("all");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
