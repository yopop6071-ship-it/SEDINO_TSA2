<!DOCTYPE html>
<html>
<head>
    <title>Full Task List</title>
</head>
<body>
    <h1>Full Task List</h1>

    <p>
        <a href="<?= base_url('/') ?>">Tasks for Today</a> |
        <a href="<?= base_url('profile') ?>">Profile</a> |
        <a href="<?= base_url('about') ?>">About</a>

        <?php if (session()->get('logged_in')): ?>
            | <a href="<?= base_url('tasks/new') ?>">Add New Task</a>
            | <a href="<?= base_url('logout') ?>">Logout</a>
        <?php else: ?>
            | <a href="<?= base_url('login') ?>">Log In</a>
        <?php endif; ?>
    </p>

    <table border="1" cellpadding="8">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Status</th>
            <th>Task Date</th>

            <?php if (session()->get('logged_in')): ?>
                <th>Actions</th>
            <?php endif; ?>
        </tr>

        <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?= esc($task['id']) ?></td>
                <td><?= esc($task['title']) ?></td>
                <td><?= esc($task['status']) ?></td>
                <td><?= esc($task['task_date']) ?></td>

                <?php if (session()->get('logged_in')): ?>
                    <td>
                        <a href="<?= base_url('tasks/edit/' . $task['id']) ?>">
                            Edit
                        </a>

                        <form action="<?= base_url('tasks/archive/' . $task['id']) ?>"
                              method="post"
                              style="display: inline;">

                            <?= csrf_field() ?>

                            <button type="submit"
                                    onclick="return confirm('Archive this task?')">
                                Delete
                            </button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>