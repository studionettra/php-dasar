<?php


if (isset($_POST['tampil'])) {
    $rumus = 2;
    $panjang = floatval($_POST['panjang'] ?? 0);
    $lebar = floatval($_POST['lebar'] ?? 0);
    $tinggi = floatval($_POST['tinggi'] ?? 0);

    function hasilPerhitungan($rumus, $panjang, $lebar, $tinggi)
    {
        return $rumus * ($panjang * $lebar + $panjang * $tinggi + $lebar * $tinggi);
    }


    echo "Hasil dari Luas Permukaan Balok Adalah &nbsp" . hasilPerhitungan($rumus, $panjang, $lebar, $tinggi);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luas Permukaan Balok</title>
</head>

<body>

    <h3>
        Luas Permukaan Balok
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