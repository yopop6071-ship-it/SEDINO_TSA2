<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>
</head>
<body>
    <h1>Edit Task</h1>

    <?php $errors = session()->getFlashdata('errors'); ?>

    <?php if ($errors): ?>
        <ul style="color: red;">
            <?php foreach ($errors as $error): ?>
                <li><?= esc($error) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <form action="<?= base_url('tasks/update/' . $task['id']) ?>" method="post">
        <p>
            <label>Title:</label><br>
            <input type="text" name="title"
                   value="<?= old('title', $task['title']) ?>">
        </p>

        <p>
            <label>Status:</label><br>
            <select name="status">
                <option value="pending"
                    <?= old('status', $task['status']) === 'pending' ? 'selected' : '' ?>>
                    Pending
                </option>

                <option value="completed"
                    <?= old('status', $task['status']) === 'completed' ? 'selected' : '' ?>>
                    Completed
                </option>
            </select>
        </p>

        <p>
            <label>Task Date:</label><br>
            <input type="date" name="task_date"
                   value="<?= old('task_date', $task['task_date']) ?>">
        </p>

        <button type="submit">Update Task</button>
    </form>

    <p><a href="<?= base_url('tasks') ?>">Back to Task List</a></p>
</body>
</html>