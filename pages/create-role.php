<?php

if (isset($_POST['save'])) {
    $name = htmlspecialchars($_POST['name']);
    $is_active = ($_POST['is_active']);
    $description = $_POST['description'];

    // Password tidak sama & email sudah ada

    mysqli_query($koneksi, "INSERT INTO roles (name, is_active, description) VALUES ('$name','$is_active', '$description')");
    header('location:?page=role&status=success');
}


$id = $_GET['edit'] ?? '';
// $id = isset($_GET['idEdit']) ? $_GET['idEdit'] : ''; //pilih salah satu
$query = mysqli_query($koneksi, "SELECT * FROM roles WHERE id='$id'");
$rEdit = mysqli_fetch_assoc($query);


if (isset($_POST['edit'])) {
    $name = htmlspecialchars($_POST['name']);
    $is_active = ($_POST['is_active']);
    $description = $_POST['descriptoin'];

    mysqli_query($koneksi, "UPDATE roles SET name='$name', is_active='$is_active', description='$description' WHERE id='$id'");
    header('location:?page=role');
}

?>

<div class="card">

    <h5 class="card-header">
        <?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' ?> Role
    </h5>

    <div class="card-body">
        <form action="" method="post">

            <div class="row">
                <div class="col-12">
                    <label for="" class="form-label">Name *</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['name'] : '' ?>" placeholder="Enter your Name" required>
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Status</label>
                    <select class="form-select" aria-label="Default select example">                        
                        <option value="1"  <?= $id ? ($rEdit['is_active'] == 1) ? 'selected' : '' : 'selected' ?>>Active</option>
                        <option value="0"  <?= $id ? ($rEdit['is_active'] == 0) ? 'selected' : '' : 'selected' ?>>Inactive</option>
                    </select>                   
                </div>
                <div class="col-12">
                    <label for="" class="form-label">Description</label>
                    <textarea name="description" id="" class="form-control"><?php echo isset($_GET['edit']) ? $rEdit['description'] : '' ?></textarea>
                </div>
            </div>

            <div class="row mt-3">
            </div>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>"><?php echo isset($_GET['edit']) ? 'Save Change' : 'Create' ?></button>
                <a href="?page=role" class="btn btn-secondary">Cancle</a>
            </div>

        </form>

    </div>

</div>
</div>