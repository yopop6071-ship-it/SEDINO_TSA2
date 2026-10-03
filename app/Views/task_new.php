<!DOCTYPE html>
<html>
<head>
    <title>New Task</title>
</head>
<body>
    <h1>Add New Task</h1>

    <?php $errors = session()->getFlashdata('errors'); ?>

    <?php if ($errors): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= base_url('tasks/store') ?>" method="post">
        <p>
            <label>Title:</label><br>
            <input type="text" name="title" value="<?= old('title') ?>">
        </p>

        <p>
            <label>Status:</label><br>
            <select name="status">
                <option value="pending">Pending</option>
                <option value="completed">Completed</option>
            </select>
        </p>

        <p>
            <label>Task Date:</label><br>
            <input type="date" name="task_date" value="<?= old('task_date') ?>">
        </p>

        <button type="submit">Save Task</button>
    </form>

    <p><a href="<?= base_url('tasks') ?>">Back to Task List</a></p>
</body>
</html>