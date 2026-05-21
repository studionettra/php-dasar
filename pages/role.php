<?php


$query = mysqli_query($koneksi, "SELECT * FROM roles");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM roles WHERE id='$id'");
    header("location:?page=role");
    exit();
}

?>


<div class="card">
    <h5 class="card-header">
        Role Management
    </h5>
    <div class="card-body">
        <div class="mb-2" align="end">
            <a href="?page=create-role" class="btn btn-primary">Create New Role</a>
        </div>
        <div class="table-responsive">

            <?php

            if (isset($_GET['status']) && $_GET['status']  == 'success') {
                $status = "Role was Created";
                $location = "?page=role";
                echo statusSuccess($status, $location);
            }

            ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $index => $rows) {                
                    ?>
                        <tr>
                            <td><?php echo $index + 1 ?></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo getStatus($rows['is_active'])?></td>
                            <td><?php echo $rows['description'] ?></td>
                            <td>
                                <a href="?page=create-role&edit=<?php echo $rows['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="?page=role&delete=<?php echo $rows['id'] ?>" method="post" class="d-inline">
                                    <button class="btn btn-danger" onclick="return confirm('SURE?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>