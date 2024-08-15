<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الخدمات</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- شريط التنقل -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="#">MyApp</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="تبديل التنقل">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}">الرئيسية</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/clients') }}">العملاء</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/services') }}">الخدمات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/contact') }}">اتصل بنا</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- المحتوى الرئيسي -->
    <div class="container mt-4">
        <h1 class="text-center">خدماتنا</h1>
        <ul class="list-group mt-4">
            @foreach($services as $service)
                <li class="list-group-item">
                    <h5>{{ $service->name }}</h5>
                    <p>{{ $service->description }}</p>
                    <!-- Add Form for Deletion and Edit here -->
                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                    </form>
                </li>
            @endforeach
        </ul>

        <!-- Add New Service Form -->
        <div class="mt-4">
            <h3>إضافة خدمة جديدة</h3>
            <form action="{{ route('services.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">اسم الخدمة</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">وصف الخدمة</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">رابط الصورة</label>
                    <input type="url" class="form-control" id="image" name="image" required>
                </div>
                <button type="submit" class="btn btn-primary">إضافة خدمة</button>
            </form>
        </div>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
