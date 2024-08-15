<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>العملاء</title>
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
                        <a class="nav-link active" href="{{ url('/customers') }}">العملاء</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/services') }}">الخدمات</a>
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
        <h1 class="text-center">قائمة العملاء</h1>

        <!-- Form لإضافة عميل جديد -->
        <form action="{{ route('clients.store') }}" method="POST" class="mb-4">
            @csrf
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="name" class="form-control" placeholder="اسم العميل" required>
                </div>
                <div class="col-md-3">
                    <input type="email" name="email" class="form-control" placeholder="البريد الإلكتروني" required>
                </div>
                <div class="col-md-3">
                    <input type="text" name="phone" class="form-control" placeholder="الهاتف" required>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">إضافة عميل</button>
                </div>
            </div>
        </form>

        <table class="table mt-4">
            <thead>
                <tr>
                    <th>الرقم التعريفي</th>
                    <th>الاسم</th>
                    <th>البريد الإلكتروني</th>
                    <th>الهاتف</th>
                    <th>الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clients as $client)
                    <tr>
                        <td>{{ $client->id }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>
                            <form action="{{ route('clients.update', $client->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $client->name }}" required>
                                <input type="email" name="email" value="{{ $client->email }}" required>
                                <input type="text" name="phone" value="{{ $client->phone }}" required>
                                <button type="submit" class="btn btn-warning btn-sm">تعديل</button>
                            </form>
                            <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
