<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Students</title></head>
<body>
<h1>Student Record Management</h1>
<?php if (session()->getFlashdata('message')): ?>
<p style="color: green;"><?= esc(session()->getFlashdata('message')) ?></p>
<?php endif; ?>

<form action="<?= site_url('students') ?>" method="get" style="margin-bottom: 12px;">
    <input type="text" name="q" placeholder="Search by name, email, course..." value="<?= esc($keyword ?? '') ?>">
    <button type="submit">Search</button>
    <a href="<?= site_url('students') ?>">Reset</a>
</form>

<p><a href="<?= site_url('students/new') ?>">Add New Student</a></p>
<table border="1" cellpadding="8" cellspacing="0">
<tr><th>ID</th><th>Student No</th><th>Name</th><th>Email</th><th>Course</th><th>Year</th><th>Actions</th></tr>
<?php if (empty($students)): ?>
<tr><td colspan="7">No records found.</td></tr>
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
<a href="<?= site_url('students/' . $student['id']) ?>">View</a>
<a href="<?= site_url('students/' . $student['id'] . '/edit') ?>">Edit</a>
<form action="<?= site_url('students/' . $student['id']) ?>" method="post" style="display:inline;">
<?= csrf_field() ?>
<input type="hidden" name="_method" value="DELETE">
<button type="submit" onclick="return confirm('Delete this student?')">Delete</button>
</form>
</td>
</tr>
<?php endforeach; ?>
</table>

<?php if (isset($pager)): ?>
    <?= $pager->only(['q'])->links() ?>
<?php endif; ?>
</body>
</html>
