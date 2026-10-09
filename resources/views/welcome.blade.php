<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UrbanNest Events</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center vh-100">

    <div class="text-center p-5 bg-white rounded shadow-sm border">
        <h1 class="h3 fw-bold mb-3">UrbanNest Events Portal</h1>
        <p class="text-muted mb-4">Manage events, schedules, and ticket types.</p>
        <a href="{{ route('admin.events.index') }}" class="btn btn-primary px-4 py-2">
            Go to Admin Panel &rarr;
        </a>
    </div>

</body>
</html>