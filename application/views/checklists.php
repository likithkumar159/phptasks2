<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <a href="addchecklist/">Add</a>
                <table class="table">
                    <thead class="th-table">
                        <tr>
                            <th>Sl.No</th>
                            <th>Checklist Name</th>
                            <th>Falling Under Milestone</th>
                            <th>Scope Type</th>
                            <th>Tool Type</th>
                            <th>Assertions</th>
                            <th>Risks</th>
                            <th>Misstatements</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($all_list)) {
                            foreach ($all_list as $key => $item) {
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $item['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['checklist_name']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['chapters']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['scopeType']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['audit_approach']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['assertions']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['risks']; ?>
                                    </td>
                                    <td>
                                        <?php echo $item['misstatements']; ?>
                                    </td>
                                    <td>
                                        <a href="addchecklist/<?php echo $item['id'] ?>"> Edit </a>
                                        <a href="delete_checklist/<?php echo $item['id'] ?>"> Delete </a>
                                        <a href="markas_inactive/<?php echo $item['id'] ,$item['status'] ?>"> Active/Inactive </a>
                                    </td>


                                </tr>
                            <?php }
                            ?>

                        <?php } ?>

                    </tbody>
                </table>

            </div>

        </div>

    </div>
</body>

</html>