<?php


$selectUser = mysqli_query($koneksi, "SELECT users.name, users.email, users.id FROM users");
$rows = mysqli_fetch_all($selectUser, MYSQLI_ASSOC);

// print_r($rows['2']);
// die;


if(isset($_GET['idDelete'])){
    $id = $_GET['idDelete'];
    $delete = mysqli_query($koneksi, "DELETE FROM users WHERE id='$id'");
    header("location:?page=user");
    exit();
}

?>


<div class="card">
    <h5 class="card-header">      
           User Data       
    </h5>
    <div class="card-body">
        <div class="mb-2" align="end">
            <a href="?page=user-create-edit" class="btn btn-primary">Create New User</a>
        </div>
        <div class="table-responsive">

            <?php
            
            if (isset($_GET['status']) && $_GET['status']  == 'success') {
                $status = "Data Berhasil ditambah";
                $location ="?page=user";
                echo statusSuccess($status, $location);

                            }
            
            ?>


            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $index => $rows) {
                    ?>
                        <tr>
                            <td><?php echo $index+1 ?></td>
                            <td><?php echo $rows['name']?></td>
                            <td><?php echo $rows['email']?></td>
                            <td>
                                <a href="?page=user-create-edit&idEdit=<?php echo $rows['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="?page=user&idDelete=<?php echo $rows['id']?>" method="post" class="d-inline">
                                    <button class="btn btn-danger" onclick="return confirm('YAKINNNNNN???????')">Delete</button>
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