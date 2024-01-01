<!DOCTYPE html>
<html>

<head>
    <title>Add or Edit Record</title>
</head>

<body>

    <h2><?= isset($record) ? 'Edit' : 'Add' ?> Record</h2>

    <form method="post" action="<?php echo isset($record) ? base_url("Secondtrail/update/{$record->user_id}") : base_url("Secondtrail/add") ?>">
        <label for="name">Name:</label>
        <input type="text" name="user_name" value="<?= isset($record->user_name) ? $record->user_name : '' ?>" required>

        <!-- Add more fields as needed -->

        <input type="submit" value="<?= isset($record) ? 'Update' : 'Submit' ?>">
    </form>

</body>

</html>
