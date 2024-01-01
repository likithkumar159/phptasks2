<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <h5><?= $active_data ? 'Active' : 'InActive'; ?> Data</h5>
                <div class="d-flex">
                    <p><a href="<?= base_url('Thirdtrail/get_active_data'); ?>">Show Active Data</a></p> &nbsp;&nbsp; || &nbsp;&nbsp;
                    <p><a href="<?= base_url('Thirdtrail/get_inactive_data'); ?>">Show Inactive Data</a></p>
                </div>
                <br />
                <p><a href="<?= base_url('Thirdtrail/add_edit'); ?>"><button type="button">Add</button></a></p>
                <h2>Data</h2>
                <table id="table_id" class="table">
                    <thead>
                        <tr>
                            <?php if ($active_data) : ?>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Gmail</th>
                                <th>Phone NO</th>
                                <th>Images</th>
                                <th>Actions</th>
                            <?php else : ?>
                                <th>ID</th>
                                <th>User Name</th>
                                <th>Gmail</th>
                                <th>Phone NO</th>
                                <th>Actions</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; ?>
                        <?php foreach ($records as $record) : ?>
                            <tr>
                                <?php if ($active_data) : ?>
                                    <td><?= $count++ ?></td>
                                    <td><?= $record->user_name; ?></td>
                                    <td><?= $record->gmail; ?></td>
                                    <td><?= $record->phone_no; ?></td>
                                    <td><img src="<?= base_url($record->image_path); ?>"></td>
                                    <td>
                                        <a href="<?= base_url('Thirdtrail/add_edit/' . $record->user_id); ?>"><button type="button">Edit</button></a>
                                        <a href="<?= base_url('Thirdtrail/soft_delete/' . $record->user_id); ?>" onclick="return confirm('Are you sure you want to Delete this record?');"><button type="button">Delete</button></a>
                                    </td>
                                <?php else : ?>
                                    <td><?= $count++ ?></td>
                                    <td><?= $record->user_name; ?></td>
                                    <td><?= $record->gmail; ?></td>
                                    <td><?= $record->phone_no; ?></td>
                                    <td>
                                        <a href="<?= base_url('Thirdtrail/make_active/' . $record->user_id); ?>" onclick="return confirm('Are you sure you want to Active this record?');"> <button type="button">Active</button> </a>
                                    </td>
                                <?php endif; ?>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <script>
                    $(document).ready(function() {
                        $('#table_id').DataTable();
                    });
                </script>

                <!-- <?php echo $this->pagination->create_links(); ?> -->
            </div>
        </div>
    </div>
</body>

</html>