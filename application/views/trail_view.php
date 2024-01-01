<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>trail view</title>
</head>

<body>
    <a href="<?php echo base_url("Trailcontrol/addview") ?> ">
        <button type="button" style="cursor: pointer;">
            Add
        </button>
    </a>
    <table>
        <thead>
            <tr>
                <th>S.No</th>
                <th>User Name</th>
                <th>Gmail</th>
                <th>Phone No</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td></td>
                    <td><?= $record->user_name ?></td>
                    <td><?= $record->gmail ?></td>
                    <td><?= $record->phone_no ?></td>
                    <td>
                        <a href="<?php echo base_url("Trailcontrol/edit/".$record->user_id) ?> ">
                            <button type="button" style="cursor: pointer;">
                                Edit
                            </button>
                        </a>
                        <a href="">
                            <button type="button" style="cursor: pointer;">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php
    $success_message = $this->session->flashdata('success');
    if ($success_message) {
        echo '<div class="alert alert-success">' . $success_message . '</div>';
    }
    ?>
</body>

</html>