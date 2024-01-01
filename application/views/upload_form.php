<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload and List</title>
</head>

<body>

    <h2>File Upload</h2>

    <?php echo form_open_multipart('File_controller/upload_and_list_files'); ?>
    <input type="text" name="name" />
    <input type="file" name="userfile" size="20" />
    <br /><br />
    <input type="submit" value="Upload" />
    </form>

    <hr>

    <h2>Uploaded Files</h2>

    <?php if (!empty($files)) : ?>
        <ul>

            <!-- <li>
                    php echo $file['file_name']; ?>
                    (<a href="php echo base_url('file_controller/download_file/' . $file['id']); ?>">Download</a>)
                </li> -->
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>File type</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    <?php foreach ($files as $file) : ?>
                        <tr>
                            <td><?php echo $file['name']; ?></td>
                            <td><?php echo $file['file_name']; ?></td>
                            <td><a href="<?php echo base_url('File_controller/download_file/' . $file['id']); ?>">Download</a></td>
                        </tr>

                    <?php endforeach; ?>


                </tbody>
            </table>
        </ul>
    <?php else : ?>
        <p>No files uploaded yet.</p>
    <?php endif; ?>

</body>

</html>