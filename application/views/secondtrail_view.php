<!DOCTYPE html>
<html>

<head>
    <title>Table Example</title>
</head>

<body>
    <a href="<?php echo base_url("Secondtrail/addview") ?>  ">
        <button type="button">Add</button>
    </a>
    <a href="<?php echo base_url("Secondtrail") ?>">Active</a>
    <a href="<?php echo base_url("Secondtrail") ?>">InActive</a>
    </select>
    <br />
    <h3>Active Table</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($records as $record) : ?>
            <tr>
                <td><?= $record->user_id  ?></td>
                <td><?= $record->user_name ?></td>
                <td><a href="<?= base_url('Secondtrail/edit/' . $record->user_id) ?>"><button type="button">Edit</button> </a>
                    <a href="<?= base_url('Secondtrail/delete/' . $record->user_id) ?>"><button type="button">Delete</button> </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h3>InActive Table</h3>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($inactive_records as $inactive_record) : ?>
            <? echo $inactive_record ?>
            <tr>
                <td><?= $inactive_record->user_id  ?></td>
                <td><?= $inactive_record->user_name ?></td>
                <td>
                    <a href="<?= base_url('Secondtrail/makeactive/' . $record->user_id) ?>"><button type="button">Active</button> </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</body>

</html>