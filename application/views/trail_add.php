<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="<?php echo base_url("Trailcontrol/add") ?>">
        <label>User Name</label>
        <input type="text" name="user_name" value="<?php echo ?> " />
        <label>Gmail</label>
        <input type="text" name="gmail" />
        <label>Phone No</label>
        <input type="number" name="phone_no" />
        <button type="submit">Submit</button>
    </form>
</body>

</html>