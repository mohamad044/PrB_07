<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panorama-Q</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            font-family: 'Nunito', sans-serif;
            color: #333;
            direction: rtl; /* جعل النصوص تبدأ من اليمين */
        }
        .navbar-custom {
            background-color: #ff6f00; /* Orange color */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link {
            color: #ffffff;
        }
        .hero-section {
            background: linear-gradient(rgba(255, 105, 0, 0.8), rgba(255, 165, 0, 0.6)), url('your-image-url.jpg'); /* Replace with your image URL */
            background-size: cover;
            background-position: center;
            height: 600px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            text-align: center;
            padding: 2rem;
        }
        .hero-section h1 {
            font-size: 4rem; /* Large font size */
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
        }
        .hero-section p {
            font-size: 1.5rem;
            font-weight: 400;
            margin-bottom: 2rem;
        }
        .section-heading {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-align: center;
        }
        .card-custom {
            border-radius: 1rem;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .footer {
            background-color: #ff6f00; /* Orange color */
            color: #ffffff;
            padding: 2rem 0;
            text-align: center;
        }
        .btn-primary {
            background-color: #ff6f00; /* Matching button color */
            border-color: #ff6f00;
        }
        .btn-primary:hover {
            background-color: #e65c00; /* Darker orange for hover effect */
            border-color: #e65c00;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom">
    <a class="navbar-brand" href="#">بانوراما</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">الرئيسية</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">عنّا</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">الخدمات</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">اتصل بنا</a>
            </li>
        </ul>
    </div>
</nav>

<header class="hero-section">
    <div>
        <h1>بانوراما</h1>
        <p>استكشف خدماتنا وعروضنا</p>
    </div>
</header>

<div class="container my-5">
    <h2 class="section-heading">خدماتنا</h2>
    <div class="row">
        <!-- Example Card -->
        <div class="col-md-4 mb-4">
            <div class="card card-custom">
                <img src="service-image-url.jpg" class="card-img-top" alt="Service">
                <div class="card-body">
                    <h5 class="card-title">عنوان الخدمة</h5>
                    <p class="card-text">وصف الخدمة هنا.</p>
                    <a href="#" class="btn btn-primary">اعرف المزيد</a>
                </div>
            </div>
        </div>
        <!-- Repeat for other services -->
    </div>
</div>

<footer class="footer">
    <p>&copy; 2024 بانوراما. جميع الحقوق محفوظة.</p>
</footer>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
