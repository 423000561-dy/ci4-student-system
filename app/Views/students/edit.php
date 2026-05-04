<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-3">Edit Student</h1>

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-danger">
            <?php foreach (session()->getFlashdata('errors') as $error): ?>
                <div><?= esc($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form action="<?= site_url('students/' . $student['id']) ?>" method="post" class="card card-body shadow-sm">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">

        <div class="mb-3"><label class="form-label">Student No</label><input class="form-control" type="text" name="student_no" value="<?= old('student_no', $student['student_no']) ?>" required></div>
        <div class="mb-3"><label class="form-label">First Name</label><input class="form-control" type="text" name="first_name" value="<?= old('first_name', $student['first_name']) ?>" required></div>
        <div class="mb-3"><label class="form-label">Last Name</label><input class="form-control" type="text" name="last_name" value="<?= old('last_name', $student['last_name']) ?>" required></div>
        <div class="mb-3"><label class="form-label">Email</label><input class="form-control" type="email" name="email" value="<?= old('email', $student['email']) ?>" required></div>
        <div class="mb-3"><label class="form-label">Course</label><input class="form-control" type="text" name="course" value="<?= old('course', $student['course']) ?>" required></div>
        <div class="mb-3"><label class="form-label">Year Level (1-5)</label><input class="form-control" type="number" min="1" max="5" name="year_level" value="<?= old('year_level', $student['year_level']) ?>" required></div>

        <div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="<?= site_url('students') ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </form>
</div>
</body>
</html>
