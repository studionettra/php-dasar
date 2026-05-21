<?php

if (isset($_POST['save'])) {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $pass = $_POST['password'];
    $confrim = $_POST['password_confirm'];
    $passSha = sha1($pass);

    if ($pass == $confrim) {
        $cekEmail = mysqli_query($koneksi, "SELECT * FROM users WHERE email='$email'");

        if (mysqli_num_rows($cekEmail) > 0) {
            header('location:?page=user-create-edit');
        }

        mysqli_query($koneksi, "INSERT INTO users (name, email, password) VALUES ('$name','$email', '$passSha')");

        header('location:?page=user&status=success');
        exit();
    } else {
        header('location:?page=user-create-edit');
        exit();
    }
}

if (isset($_GET['idEdit'])) {
    $id = $_GET['idEdit'] ?? '';
    $selectUser = mysqli_query($koneksi, "SELECT * FROM users WHERE id='$id'");
    $rEdit = mysqli_fetch_assoc($selectUser);

    if (isset($_POST['edit'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $pass = $_POST['password'];
        $confrim = $_POST['password_confirm'];
        $passSha = sha1($pass);

        if ($pass == '') {
            mysqli_query($koneksi, "UPDATE users SET name='$name', email='$email' WHERE id='$id'");
            header('location:?page=user');
            exit();
        } else {
            if ($pass == $confrim) {
                mysqli_query($koneksi, "UPDATE users SET name='$name', email='$email', password='$passSha' WHERE id='$id'");
                header('location:?page=user');
                exit();
            }
        }
        // if ($updateUser) {
        //     header('location:?page=user');
        //     exit();
        // }
    }
}

?>



<div class="card">
    <div class="card-header">

        <h2 class="card-tittle text-center">
            <?php echo isset($_GET['idEdit']) ? 'Edit' : 'Create' ?> User
        </h2>


        <div class="card-body">

            <form action="" method="post">

                <div class="row">
                    <div class="col-6">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo isset($_GET['idEdit']) ? $rEdit['name'] : '' ?>" required>
                    </div>

                    <div class="col-6">
                        <label for="" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="<?php echo isset($_GET['idEdit']) ? $rEdit['email'] : '' ?>" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-6">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Password Confrim</label>
                        <input type="password" name="password_confirm" class="form-control">
                    </div>
                </div>
                <div class="text-end mt-3">
                    <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['idEdit']) ? 'edit' : 'save' ?>"><?php echo isset($_GET['idEdit']) ? 'Edit' : 'Save' ?></button>
                    <a href="?page=user" class="btn btn-secondary">Cancle</a>
                </div>

            </form>

        </div>
    </div>
</div>
</div>