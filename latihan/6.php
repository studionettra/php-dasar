<?php


if (isset($_POST['tampil'])) {
    $panjang = floatval($_POST['panjang'] ?? 0);
    $lebar = floatval($_POST['lebar'] ?? 0);
    $tinggi = floatval($_POST['tinggi'] ?? 0);

    function hasilPerhitungan($panjang, $lebar, $tinggi)
    {
        return $panjang * $lebar * $tinggi;
    }


    echo "Hasil dari Volume Balok Adalah &nbsp" . hasilPerhitungan($panjang, $lebar, $tinggi);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume Balok</title>
</head>

<body>

    <h3>
        Volume Balok
    </h3>

    <form action="" method="post">
        <label for="">Panjang</label>
        <input type="number" name="panjang"><br><br>
        <label for="">Lebar</label>
        <input type="number" name="lebar"><br><br>
        <label for="">Tinggi</label>
        <input type="number" name="tinggi"><br><br>
        <button type="submit" name="tampil">Hasilkan</button>



    </form>

</body>

</html>