<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-3">Student Details</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <p><strong>ID:</strong> <?= esc($student['id']) ?></p>
            <p><strong>Student No:</strong> <?= esc($student['student_no']) ?></p>
            <p><strong>First Name:</strong> <?= esc($student['first_name']) ?></p>
            <p><strong>Last Name:</strong> <?= esc($student['last_name']) ?></p>
            <p><strong>Email:</strong> <?= esc($student['email']) ?></p>
            <p><strong>Course:</strong> <?= esc($student['course']) ?></p>
            <p><strong>Year Level:</strong> <?= esc($student['year_level']) ?></p>

            <a href="<?= site_url('students/' . $student['id'] . '/edit') ?>" class="btn btn-warning">Edit</a>
            <a href="<?= site_url('students') ?>" class="btn btn-outline-secondary">Back</a>
        </div>
    </div>
</div>
</body>
</html>
