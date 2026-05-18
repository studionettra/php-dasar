<?php


 if (isset($_POST['tampil'])){
    $rumus = 1/3;
    $alas = floatval($_POST['alas'] ?? 0);    
    $tinggi = floatval($_POST['tinggi'] ?? 0);

    function hasilPerhitungan($rumus, $alas, $tinggi){
        return $rumus*($alas*$alas)*$tinggi;
    }
     

    echo "Hasil dari Volume Limas Segi Empat Adalah &nbsp" . hasilPerhitungan($rumus, $alas, $tinggi);

    }   
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume Limas Segi Empat</title>
</head>
<body>

<h3>
    Volume Limas Segi Empat
</h3>

<form action="" method="post">
    <label for="">Alas</label>
        <input type="number" name="alas"><br><br>
    <label for="">Tinggi</label>
        <input type="number" name="tinggi"><br><br>
    <button type="submit" name="tampil">Hasilkan</button>



</form>
    
</body>
</html>