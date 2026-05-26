<?php

$query = mysqli_query($koneksi, "SELECT products.*, categories.category_name FROM products LEFT JOIN categories ON products.category_id = categories.id ORDER BY id DESC");
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

if (isset($_GET['delete'])) {
    $id = $_GET['delete'] ?? 0;
    $cekPhoto = mysqli_query($koneksi, "SELECT product_image FROM products WHERE id='$id'");
    $rowPhoto = mysqli_fetch_assoc($cekPhoto);
    if ($rowPhoto) {
        $photo = $rowPhoto['product_image'];
        if (file_exists("assets/uploads/" . $photo) && !empty($photo)) {
            unlink("assets/uploads/" . $photo);
        }
    }

    $delete = mysqli_query($koneksi, "DELETE FROM products WHERE id='$id'");
    if($delete){
        header("location:?page=product");
        exit();
    }

}

?>

<div class="card">
    <h5 class="card-header">
        Manage Product
    </h5>
    <div class="card-body">
        <div class="mb-2" align="end">
            <a href="?page=create-product" class="btn btn-primary">Create New Product</a>
        </div>
        <div class="table-responsive">

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product</th>
                        <th>Category</th>
                        <th>Product Image</th>
                        <th>qty</th>
                        <th>Price</th>
                        <th>Unit</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($rows as $index => $v) {
                    ?>
                        <tr>
                            <td><?php echo $index + 1 ?></td>
                            <td><?php echo $v['product_name'] ?></td>
                            <td><?php echo $v['category_name'] ?></td>
                            <td><img src="assets/uploads/<?php echo $v['product_image'] ?>" width="150" alt=""></td>
                            <td><?php echo $v['qty'] ?></td>
                            <td>Rp<?php echo number_format($v['price'], 2, ',', '.')   ?></td>
                            <td><?php echo $v['unit'] ?></td>
                            <td><?php echo $v['description'] ?></td>
                            <td><?php echo getStatus($v['is_active']) ?></td>
                            <td>
                                <a href="?page=create-product&edit=<?php echo $v['id'] ?>" class="btn btn-success">Edit</a>
                                <form action="?page=product&delete=<?php echo $v['id'] ?>" method="post" class="d-inline">
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