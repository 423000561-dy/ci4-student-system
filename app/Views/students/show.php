<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Student Details</title></head>
<body>
<h1>Student Details</h1>
<p><strong>ID:</strong> <?= esc($student['id']) ?></p>
<p><strong>Student No:</strong> <?= esc($student['student_no']) ?></p>
<p><strong>First Name:</strong> <?= esc($student['first_name']) ?></p>
<p><strong>Last Name:</strong> <?= esc($student['last_name']) ?></p>
<p><strong>Email:</strong> <?= esc($student['email']) ?></p>
<p><strong>Course:</strong> <?= esc($student['course']) ?></p>
<p><strong>Year Level:</strong> <?= esc($student['year_level']) ?></p>
<p><a href="<?= site_url('students/' . $student['id'] . '/edit') ?>">Edit</a> <a href="<?= site_url('students') ?>">Back</a></p>
</body>
</html>
