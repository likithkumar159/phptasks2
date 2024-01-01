<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="<?= base_url('Excel_control/uploadExcel'); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="excel_file" accept=".xls, .xlsx" required>
    <button type="submit">Upload Excel</button>
</form>
</body>
</html>