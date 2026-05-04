<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Edit Student</title></head>
<body>
<h1>Edit Student</h1>
<?php if (session()->getFlashdata('errors')): foreach (session()->getFlashdata('errors') as $error): ?>
<p style="color:red;"><?= esc($error) ?></p>
<?php endforeach; endif; ?>
<form action="<?= site_url('students/' . $student['id']) ?>" method="post">
<?= csrf_field() ?>
<input type="hidden" name="_method" value="PUT">
<p>Student No: <input type="text" name="student_no" value="<?= old('student_no', $student['student_no']) ?>" required></p>
<p>First Name: <input type="text" name="first_name" value="<?= old('first_name', $student['first_name']) ?>" required></p>
<p>Last Name: <input type="text" name="last_name" value="<?= old('last_name', $student['last_name']) ?>" required></p>
<p>Email: <input type="email" name="email" value="<?= old('email', $student['email']) ?>" required></p>
<p>Course: <input type="text" name="course" value="<?= old('course', $student['course']) ?>" required></p>
<p>Year Level (1-5): <input type="number" min="1" max="5" name="year_level" value="<?= old('year_level', $student['year_level']) ?>" required></p>
<button type="submit">Update</button>
<a href="<?= site_url('students') ?>">Cancel</a>
</form>
</body>
</html>
