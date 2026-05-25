<?php

$query = mysqli_query($koneksi, "SELECT * FROM menus");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);


if (isset($_POST['save'])) {
    $parent_id = $_POST['parent_id'] ?: 'NULL';
    $name = htmlspecialchars($_POST['name']);
    $url = $_POST['url'];
    $icon = $_POST['icon'];
    $sort_order = $_POST['sort_order'];
    $is_active = $_POST['is_active'];

    // Password tidak sama & email sudah ada

    mysqli_query($koneksi, "INSERT INTO menus (parent_id, name, url, icon, sort_order, is_active) VALUES ($parent_id,'$name','$url','$icon','$sort_order','$is_active')");
    header('location:?page=menu&status=success');
}


$id = $_GET['edit'] ?? '';
// $id = isset($_GET['idEdit']) ? $_GET['idEdit'] : ''; //pilih salah satu
$query = mysqli_query($koneksi, "SELECT * FROM menus WHERE id='$id'");
$rEdit = mysqli_fetch_assoc($query);


if (isset($_POST['edit'])) {
    $parent_id = $_POST['parent_id'] ?: 'NULL';
    $name = htmlspecialchars($_POST['name']);
    $url = $_POST['url'];
    $icon = $_POST['icon'];
    $sort_order = $_POST['sort_order'];
    $is_active = $_POST['is_active'];

    // mysqli_query($koneksi, "UPDATE menus SET parent_id='$parent_id' name='$name', url='$url', icon='$icon', sort_order='$sort_order' is_active='$is_active', WHERE id='$id'");


    mysqli_query($koneksi, "UPDATE menus SET 
    parent_id=$parent_id,
    name='$name',
    url='$url',
    icon='$icon',
    sort_order='$sort_order',
    is_active='$is_active'
    WHERE id='$id'");
    header('location:?page=menu');
}

$queryParent = mysqli_query($koneksi, "SELECT * FROM menus WHERE parent_id IS NULL");
$rowParent = mysqli_fetch_all($queryParent, MYSQLI_ASSOC);

?>

<div class="card">

    <h5 class="card-header">
        <?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' ?> Menu
    </h5>

    <div class="card-body">
        <form action="" method="post">

            <div class="row">
                <div class="col-6 mb-2">
                    <label for="" class="form-label">Name *</label>
                    <input type="text" name="name" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['name'] : '' ?>" placeholder="Enter Name" required>
                </div>
                <div class="col-6 mb-2">
                    <label for="" class="form-label">Parent</label>
                    <select name="parent_id" class="form-select" aria-label="Default select example">
                        <option value="">Select One</option>
                        <?php foreach ($rowParent as $parent): ?>
                            <option value="<?= $parent['id'] ?>"> <?= $parent['name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="col-6 mb-2">
                    <label for="" class="form-label">Url *</label>
                    <input type="text" name="url" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['url'] : '' ?>" placeholder="Enter URL" required>
                </div>
                <div class="col-6 mb-2">
                    <label for="" class="form-label">Icon</label>
                    <input type="text" name="icon" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['icon'] : '' ?>" placeholder="Enter Icon">
                </div>
                <div class="col-6 mb-2">
                    <label for="" class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['sort_order'] : '' ?>" placeholder=" ">
                </div>
                <div class="col-6 mb-2">
                    <label for="" class="form-label">Status</label>
                    <select name="is_active" class="form-select" aria-label="Default select example">
                        <option value="1" <?= $id ? ($rEdit['is_active'] == 1) ? 'selected' : '' : 'selected' ?>>Active</option>
                        <option value="0" <?= $id ? ($rEdit['is_active'] == 0) ? 'selected' : '' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
            </div>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>"><?php echo isset($_GET['edit']) ? 'Save Change' : 'Create' ?></button>
                <a href="?page=menu" class="btn btn-secondary">Cancle</a>
            </div>

        </form>

    </div>

</div>
</div>