<!DOCTYPE html>
<html>

<head>
    <title>Add/Edit Record</title>
</head>

<body>
    <h2><?= isset($record) ? 'Edit' : 'Add'; ?> Record</h2>
    <form method="post" action="<?= base_url($action); ?>" enctype="multipart/form-data">
        <label for="user_name">User Name</label>
        <input type="text" name="user_name" value="<?= isset($record) ? $record->user_name : ''; ?>" required>

        <label for="gmail">Gmail</label>
        <input type="text" name="gmail" value="<?= isset($record) ? $record->gmail : ''; ?>" required>

        <label for="phone_no">Phone No</label>
        <input type="number" name="phone_no" value="<?= isset($record) ? $record->phone_no : ''; ?>" required>
        <!-- <input type="number" name="phone_no"  max="9999999999" min="1000000000" value="<?= isset($record) ? $record->phone_no : ''; ?>" required> -->

        <label for="userfile">Upload Image:</label>
        <input type="file" name="image_path" accept="image/*" required>

        <!-- Add more input fields for additional columns -->

        <button type="submit"><?= isset($record) ? 'Update' : 'Add'; ?></button>
    </form>

</body>

</html>