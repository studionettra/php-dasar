<?php
$queryCategory = mysqli_query($koneksi, "SELECT * FROM categories");
$rowCategory = mysqli_fetch_all($queryCategory, MYSQLI_ASSOC);

if (isset($_POST['save'])) {
    $category_id = htmlspecialchars($_POST['category_id']);
    $product_name = htmlspecialchars($_POST['product_name']);
    $qty = htmlspecialchars($_POST['qty']);
    $price = htmlspecialchars($_POST['price']);
    $unit = htmlspecialchars($_POST['unit']);
    $description = htmlspecialchars($_POST['description']);
    $is_active = htmlspecialchars($_POST['is_active']);

    $product_image = time() . '_' . $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];
    move_uploaded_file($tmp_name, "assets/uploads/" . $product_image);

    $insert = mysqli_query($koneksi, "INSERT INTO products (category_id, product_image, product_name, qty, price, unit, description, is_active) VALUES ('$category_id', '$product_image', '$product_name', '$qty', '$price', '$unit', '$description', '$is_active')");

    if ($insert) {
        header("location:?page=product&status=success");
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'] ?? 0;
    $selectProduct = mysqli_query($koneksi, "SELECT * FROM products WHERE id='$id'");
    $rEdit = mysqli_fetch_assoc($selectProduct);
    if (isset($_POST['edit'])) {
        $category_id = htmlspecialchars($_POST['category_id']);
        $product_name = htmlspecialchars($_POST['product_name']);
        $qty = htmlspecialchars($_POST['qty']);
        $price = htmlspecialchars($_POST['price']);
        $unit = htmlspecialchars($_POST['unit']);
        $description = htmlspecialchars($_POST['description']);
        $is_active = htmlspecialchars($_POST['is_active']);

    if ($_FILES['product_image']['name'] != '') {
    $product_image = time() . '_' . $_FILES['product_image']['name'];
    $tmp_name = $_FILES['product_image']['tmp_name'];
    if(file_exists("assets/uploads/" . $rEdit['product_image']) && !empty($rEdit['product_image']));{
        unlink("assets/uploads/" . $rEdit['product_image']);
    }
    move_uploaded_file($tmp_name, "assets/uploads/" . $product_image);
    }else{
    $product_image = $rEdit['product_image'];        
    }

    $cek = mysqli_query($koneksi, "SELECT product_name FROM products WHERE product_name='$product_name'");
        if (mysqli_num_rows($cek) > 0) {
            $update = mysqli_query($koneksi, "UPDATE products SET category_id='$category_id', product_image='$product_image', product_name='$product_name', qty='$qty', price='$price', unit='$unit', description='$description', is_active='$is_active' WHERE id='$id'");
            header("location:?page=product");
            exit();
        }

        $update = mysqli_query($koneksi, "UPDATE products SET category_id='$category_id', product_image='$product_image', product_name='$product_name', qty='$qty', price='$price', unit='$unit', description='$description', is_active='$is_active' WHERE id='$id'");
        if($update){
            header("location:?page=product");
            exit();
        }
    }
        
            

}
   


?>

<div class="card">

    <h5 class="card-header">
        <?php echo isset($_GET['edit']) ? 'Edit' : 'Create New' ?> Product
    </h5>

    <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-12 mb-3">
                    <label for="" class="form-label">Product Name</label>
                    <input type="text" name="product_name" class="form-control" value="<?= isset($_GET['edit']) ? $rEdit['product_name'] : '' ?>" required>
                </div>

                <div class="col-12 mb-3">
                    <label for="" class="form-label">Category</label>
                    <select name="category_id" class="form-select" aria-label="Default select example">
                        <option value="">Select One</option>
                        <?php foreach ($rowCategory as $index => $category): ?>
                            <option value="<?= $category['id'] ?>" <?= (($rEdit['category_id'] ?? '') == $category['id']) ? 'selected' : '' ?>> <?= $category['category_name'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="col-12 mb-3">
                    <label for="" class="form-label">Product Image</label>
                    <div class="mb-3">
                        <img src="assets/uploads/<?php echo isset($_GET['edit']) ? $rEdit['product_image'] : '' ?>" width="150" alt="">
                    </div>
                    <input type="file" name="product_image" class="form-control" value="">
                </div>

                <div class="col-12 mb-3">
                    <label for="" class="form-label">Quantity</label>
                    <input type="number" name="qty" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['qty'] : '' ?>" placeholder="Enter Quantity">
                </div>

                <div class="col-12 mb-3">
                    <label for="" class="form-label">Price</label>
                    <input type="number" name="price" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['price'] : '' ?>" placeholder="Enter Price" require>
                </div>


                <div class="col-12 mb-3">
                    <label for="" class="form-label">Unit</label>
                    <input type="number" name="unit" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['unit'] : '' ?>" placeholder="Enter Unit" require>
                </div>

                <div class="col-12 mb-3">
                    <label for="" class="form-label">Status</label>
                    <select name="is_active" class="form-select" aria-label="Default select example">
                        <option value="1">Active</option>
                        <option value="0">Inactive</option>
                    </select>
                </div>



                <div class="col-12 mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea cols="30" rows="5" name="description" class="form-control" value="<?php echo isset($_GET['edit']) ? $rEdit['description'] : '' ?>" placeholder=" "></textarea>
                </div>

            </div>
            <div class="text-end mt-3 mb-3">
                <button type="submit" class="btn btn-primary" name="<?php echo isset($_GET['edit']) ? 'edit' : 'save' ?>"><?php echo isset($_GET['edit']) ? 'Save Change' : 'Create' ?></button>
                <a href="?page=product" class="btn btn-secondary">Cancel</a>
            </div>

        </form>

    </div>

</div>
</div>