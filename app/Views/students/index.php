<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <h1 class="mb-3">Student Record Management</h1>

    <?php if (session()->getFlashdata('message')): ?>
        <div class="alert alert-success"><?= esc(session()->getFlashdata('message')) ?></div>
    <?php endif; ?>

    <form action="<?= site_url('students') ?>" method="get" class="row g-2 mb-3">
        <div class="col-md-6">
            <input type="text" class="form-control" name="q" placeholder="Search by name, email, course..." value="<?= esc($keyword ?? '') ?>">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Search</button>
            <a href="<?= site_url('students') ?>" class="btn btn-outline-secondary">Reset</a>
        </div>
    </form>

    <p><a href="<?= site_url('students/new') ?>" class="btn btn-success">Add New Student</a></p>

    <div class="table-responsive">
        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr><th>ID</th><th>Student No</th><th>Name</th><th>Email</th><th>Course</th><th>Year</th><th>Actions</th></tr>
            </thead>
            <tbody>
            <?php if (empty($students)): ?>
                <tr><td colspan="7" class="text-center">No records found.</td></tr>
            <?php endif; ?>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= esc($student['id']) ?></td>
                    <td><?= esc($student['student_no']) ?></td>
                    <td><?= esc($student['last_name'] . ', ' . $student['first_name']) ?></td>
                    <td><?= esc($student['email']) ?></td>
                    <td><?= esc($student['course']) ?></td>
                    <td><?= esc($student['year_level']) ?></td>
                    <td>
                        <a href="<?= site_url('students/' . $student['id']) ?>" class="btn btn-sm btn-info text-white">View</a>
                        <a href="<?= site_url('students/' . $student['id'] . '/edit') ?>" class="btn btn-sm btn-warning">Edit</a>
                        <form action="<?= site_url('students/' . $student['id']) ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this student?')">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php if (isset($pager)): ?>
        <div class="mt-3">
            <?= $pager->only(['q'])->links() ?>
        </div>
    <?php endif; ?>
</div>
</body>
</html>
