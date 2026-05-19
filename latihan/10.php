<?php


 if (isset($_POST['tampil'])){
    $rumus1 = 2;
    $rumus = M_PI;
    $jari = floatval($_POST['jari'] ?? 0);    
    $tinggi = floatval($_POST['tinggi'] ?? 0);

    function hasilPerhitungan($rumus1, $rumus, $jari, $tinggi){
        return $rumus1*$rumus*$jari*($jari+$tinggi);
    }
     

    echo "Hasil dari Luas Permukaan Tabung &nbsp" . hasilPerhitungan($rumus1, $rumus, $jari, $tinggi);

    }   
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luas Permukaan Tabung</title>
</head>
<body>

<h3>
    Luas Permukaan Tabung
</h3>

<form action="" method="post">
    <label for="">Jari-jari</label>
        <input type="number" name="jari"><br><br>
    <label for="">Tinggi</label>
        <input type="number" name="tinggi"><br><br>
    <button type="submit" name="tampil">Hasilkan</button>



</form>
    
</body>
</html>