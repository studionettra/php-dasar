<?php



if (isset($_POST['save'])) {
    $category_name = $_POST['category_name'];
    $is_active = $_POST['is_active'];

    $queryCek = mysqli_query($koneksi, "SELECT * FROM categories WHERE category_name='$category_name'");

    if (mysqli_num_rows($queryCek) > 0) {
        header("location:?page=create-category&status=category-exist");
        exit();
    }

    $query = mysqli_query($koneksi, "INSERT INTO categories (category_name, is_active) VALUES ('$category_name','$is_active')");
    if ($query) {
        header('location:?page=category&status=created');
    }
}


$id = $_GET['edit'] ?? '';
$query = mysqli_query($koneksi, "SELECT * FROM categories WHERE id='$id'");
$rEdit = mysqli_fetch_assoc($query);

if (isset($_POST['edit'])) {
    $category_name = $_POST['category_name'];
    $is_active = $_POST['is_active'];

    $queryCek = mysqli_query($koneksi, "SELECT * FROM categories 
    WHERE category_name='$category_name' AND id != '$id'");

    if (mysqli_num_rows($queryCek) > 0) {
        header("location:?page=create-category&edit=$id&status=category-exist");
        exit();
    }

    $query = mysqli_query($koneksi,  "UPDATE categories SET 
    category_name='$category_name',
    is_active='$is_active'
    WHERE id='$id'");

    if ($query) {
        header('location:?page=category&status=edited');
    }
}
?>


<div class="card">

    <h5 class="card-header">
        <?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' ?> Category
    </h5>

    <div class="card-body">

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

        if (isset($_GET['status'])) {

            if ($_GET['status'] == 'category-exist') {

                $status = "Category Name Already Exist!";
                $location = "?page=create-category";

                echo statusFailed($status, $location);
            }
        }
        ?>

        <form action="" method="post">

            <div class="row">

                <div class="col-6 mb-2">
                    <label for="" class="form-label">Category Name *</label>
                    <input type="text" name="category_name" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['category_name'] : '' ?>" placeholder="Enter Name" required>
                </div>
                <div class="col-6 mb-2">
                    <label for="" class="form-label">Status</label>
                    <?php
                    $statusValue = $rEdit['is_active'] ?? 1;
                    ?>
                    <select name="is_active" class="form-select" aria-label="Default select example">
                        <option value="1" <?= isset($rEdit['is_active']) && $rEdit['is_active'] == 1 ? 'selected' : '' ?>>Active</option>
                        <option value="0" <?= isset($rEdit['is_active']) && $rEdit['is_active'] == 0 ? 'selected' : '' ?>>Inactive</option>
                    </select>
                </div>
            </div>

            <div class="row mt-3">
            </div>
            <div class="text-end mt-3">
                <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>"><?php echo isset($_GET['edit']) ? 'Save Change' : 'Create' ?></button>
                <a href="?page=category" class="btn btn-secondary">Cancel</a>
            </div>

        </form>

    </div>

</div>
</div>