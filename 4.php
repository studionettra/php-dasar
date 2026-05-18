<?php


 if (isset($_POST['tampil'])){
    $sisi1 = floatval($_POST['sisi1'] ?? 0);

    function hasilPerhitungan($sisi1){
        return $sisi1 * $sisi1 * $sisi1;
    }
     

    echo "Hasil dari Volume Kubusnya Adalah &nbsp" . hasilPerhitungan($sisi1);

    }
   
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volume Kubus</title>
</head>
<body>

<h3>
    Volume Kubus
</h3>

<form action="" method="post">
    <label for="">Sisi 1</label>
        <input type="number" name="sisi1"><br><br>
    <button type="submit" name="tampil">Hasilkan</button>



</form>
    
</body>
</html>