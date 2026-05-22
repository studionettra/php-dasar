<?php


$query = mysqli_query($koneksi, "SELECT parent.name as parent_name, menus. * FROM menus LEFT JOIN menus as parent ON parent.id = menus.parent_id ORDER BY menus.id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete = mysqli_query($koneksi, "DELETE FROM menus WHERE id='$id'");
    header("location:?page=menu");
    exit();
}

?>


<div class="card">
    <h5 class="card-header">
        Manage Menu
    </h5>
    <div class="card-body">
        <div class="mb-2" align="end">
            <a href="?page=create-menu" class="btn btn-primary">Create New Menu</a>
        </div>
        <div class="table-responsive">

            <?php

            if (isset($_GET['status']) && $_GET['status']  == 'success') {
                $status = "Menu was Created";
                $location = "?page=menu";
                echo statusSuccess($status, $location);
            }

            ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Parent Id</th>
                        <th>Name</th>
                        <th>URL</th>
                        <th>Icon</th>
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
                            <td><?php echo $rows['parent_name'] ?></td>
                            <td><?php echo $rows['name'] ?></td>
                            <td><?php echo $rows['url'] ?></td>
                            <td><?php echo $rows['icon'] ?></td>
                            <td><?php echo getStatus($rows['is_active']) ?></td>
                            <td>
                                <a href="?page=create-menu&edit=<?php echo $rows['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="?page=menu&delete=<?php echo $rows['id'] ?>" method="post" class="d-inline">
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