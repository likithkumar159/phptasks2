<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <form id="nameForm" action="<?php echo base_url("Login_control/newuser_create") ?>" method="post">
        <label>User Name</label>
        <input type="text" name="name" id="name" required />
        <span id="nameMessage" style="color: red;"></span><br />
        <label>Gmail</label>
        <input type="text" name="gmail" /><br />
        <label>phone No</label>
        <input type="number" name="phone_no" /><br />
        <label>Password</label>
        <input type="text" name="password" /><br />
        <label>Confirm Password</label>
        <input type="text" name="confirm_password" /><br />
        <button type="submit">Submit</button>
    </form>

    <script>
        // alert('script is running')
        $(document).ready(function() {
            $('#nameForm').submit(function(event) {
                event.preventDefault(); // Prevent the form from submitting in the traditional way
                var formData = $(this).serialize();
                // alert('ajax is calling')
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url("Login_control/newuser_create") ?>',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        $('#nameMessage').text(response.message);

                        if (!response.exists) {
                            // Name doesn't exist, you can choose to save it to the database here
                            // For simplicity, let's assume a success message
                            $('#nameMessage').append('<br>Name saved to the database.');

                            // Check for a redirect URL in the response
                            if (response.redirect_url) {
                                // Redirect to the specified URL
                                window.location.href = response.redirect_url;
                            } else {
                                // If no redirect URL is provided, you can handle it based on your requirements
                                // For example, redirect to a default page or perform another action
                                window.location.href = '<?php echo base_url("Login_control") ?>';
                            }
                        }
                    }

                });
            });
        });
    </script>
</body>

</html>



<!-- <script>
        $(document).ready(function() {
            $('#name').on('input', function() {
                var name = $(this).val();
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url("Login_control/check_name_existence") ?>',
                    data: {
                        name: name
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.exists) {
                            $('#nameMessage').text('Name already exists!');
                        } else {
                            $('#nameMessage').text('Name is available!');
                        }
                    }
                });
            });
        });
    </script> -->