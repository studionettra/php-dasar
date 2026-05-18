<?php


 if (isset($_POST['tampil'])){
    $rumus = M_PI;
    $jari = floatval($_POST['jari'] ?? 0);    
    $tinggi = floatval($_POST['tinggi'] ?? 0);

    function hasilPerhitungan($rumus, $jari, $tinggi){
        return $rumus*($jari*$jari)*$tinggi;
    }
     

    echo "Hasil dari Volume Tabung &nbsp" . hasilPerhitungan($rumus, $jari, $tinggi);

    }   
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume Tabung</title>
</head>
<body>

<h3>
    Volume Tabung
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