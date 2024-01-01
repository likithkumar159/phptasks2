<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Likith's Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mt-5">
                <center >
                    <div class="col-md-4 border p-5" >
                    <form class=""  action="<?php echo base_url("Login_control/check_login") ?>" method="post">
                        <label>User Name</label>
                        <input type="text" name="name" /><br />
                        <label>Password</label>
                        <input type="text" name="password" /><br />
                        <button type="submit" class="border-0 rounded bg-success text-white font-weight-bold" >Submit</button>
                    </form>
                    <a href="<?php echo base_url("Login_control/new_userpage") ?>">
                        <button class="mt-2 border-0 rounded bg-success text-white font-weight-bold"  type="button">New user sign up?</button></a>

                    <span class="mt-1" ><?php
                    // Display error messages if they exist
                    if (isset($error_message)) {
                        echo '<div style="color: red;">' . $error_message . '</div>';
                    }
                    ?></span>
                    </div>
                </center>
            </div>
        </div>
    </div>
</body>
</html>