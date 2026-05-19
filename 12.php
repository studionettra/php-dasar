<?php


if (isset($_POST['tampil'])) {
    $rumus1 = 4;
    $rumus = M_PI;
    $jari = floatval($_POST['jari'] ?? 0);
    $tinggi = floatval($_POST['tinggi'] ?? 0);

    function hasilPerhitungan($rumus1, $rumus, $jari)
    {
        return $rumus1 * $rumus * ($jari * $jari);
    }


    echo "Hasil dari Luas Permukaan Bola &nbsp" . hasilPerhitungan($rumus1, $rumus, $jari);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luas Permuakaan Bola</title>
</head>

<body>

    <h3>
        Luas Permukaan Bola
    </h3>

    <form action="" method="post">
        <label for="">Jari-jari</label>
        <input type="number" name="jari"><br><br>
        <button type="submit" name="tampil">Hasilkan</button>



    </form>

</body>

</html>