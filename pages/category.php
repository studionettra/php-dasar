<?php


$query = mysqli_query($koneksi, "SELECT * FROM categories");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM categories WHERE id='$id'");
    header("location:?page=category");
    exit();
}

?>


<div class="card">
    <h5 class="card-header">
        Manage Category
    </h5>
    <div class="card-body">
        <div class="mb-2" align="end">
            <a href="?page=create-category" class="btn btn-primary">Create New Category</a>
        </div>
        <div class="table-responsive">

            <?php

            if (isset($_GET['status'])) {

                if ($_GET['status'] == 'created') {

                    $status = "Category was Created";
                    echo statusSuccess($status, "?page=category");
                } elseif ($_GET['status'] == 'edited') {

                    $status = "Category Have Been Edited";
                    echo statusSuccess($status, "?page=category");
                }
            }

            // if (isset($_GET['status']) && $_GET['status']  == 'success') {
            //     $status = "Category was Created";
            //     $location = "?page=category";
            //     echo statusSuccess($status, $location);
            // }

            ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Category Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $index => $rows) {
                    ?>
                        <tr>
                            <td><?php echo $index + 1 ?></td>
                            <td><?php echo $rows['category_name'] ?></td>
                            <td><?php echo getStatus($rows['is_active']) ?></td>
                            <td>
                                <a href="?page=create-category&edit=<?php echo $rows['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="?page=category&delete=<?php echo $rows['id'] ?>" method="post" class="d-inline">
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