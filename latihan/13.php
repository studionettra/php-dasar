
<?php 
// KUBUS
function volumeKubus($s){
    return pow($s,3);
}
function lpKubus($s){
    return 6 * pow($s,3);
}
//BALOK
function volumeBalok($p, $l, $t){
    return $p * $l * $t;
}
function lpBalok ($p, $l, $t){
    return 2 * (($p * $l) + ($p * $t) + ($l * $t));
}
//LIMAS
function volumeLimas($s, $t){
    return 1/3 * pow($s, 2) * $t;
}
//TABUNG
function volumeTabung($r, $t){
    return M_PI * pow($r, 2) * $t;
}
function lpTabung($r, $t){
    return 2 * M_PI * $r * ($r + $t);
}
//BOLA
function volumeBola($s)
    return 4/3 * 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <a href="?bangun=kubus">Kubus</a>
    <a href="?bangun=balok">Balok</a>
    <a href="?bangun=limas">Limas Segi Empat</a>
    <a href="?bangun=tabung">Tabung</a>
    <a href="?bangun=bola">Bola</a>

    <form action="?bangun=<?php echo isset($_GET['bangun']) ? $_GET['bangun'] : '' ?>" method="post">
        <?php
        if (isset($_GET['bangun']) && $_GET['bangun'] == 'kubus') {
        ?>
            <br>
            <label for="">Kubus</label>
            <input type="number" step="any" name="s" required>
        <?php
        } elseif (isset($_GET['bangun']) && $_GET['bangun'] == 'balok') {
        ?>
        <br>
        <label for="">Panjang</label>
        <input type="number" step="any" name="p" required>
        <label for="">Lebar</label>
        <input type="number" step="any" name="l" required>
        <label for="">Tinggi</label>
        <input type="number" step="any" name="t" required>        
        <?php
        } elseif (isset($_GET['bangun']) && $_GET['bangun'] == 'limas') {
        ?>  
        <br>      
        <label for="">Sisi</label>
        <input type="number" step="any" name="s" required>
        <label for="">Tinggi</label>
        <input type="number" step="any" name="t" required>        
        <?php
        } elseif (isset($_GET['bangun']) && $_GET['bangun'] == 'tabung'){
            ?>
            <br>      
        <label for="">Jari-Jari</label>
        <input type="number" step="any" name="r" required>
        <label for="">Tinggi</label>
        <input type="number" step="any" name="t" required>  
        <?php
        }
        ?>
        <button type="submit" name="hitung">Hitung</button>   
        
    </form>

    <?php
    $bangun = $_GET['bangun'] ?? '';
    switch ($bangun) {
        case 'kubus':
            $s = $_POST['s'] ?? 0;
            $volKB = volumeKubus($s);
            $lpKB = lpKubus($s);
            echo "<br> Sisi = $s";
            echo "<br><strong>(s^3) =" .round($volKB, 2) . "</storng><br><br>";
            echo "<strong>(6 x s^3) =" .round($lpKB, 2) . "</storng><br>";
            break;
        case 'balok':
            $p = $_POST['p'] ?? 0;
            $l = $_POST['l'] ?? 0;
            $t = $_POST['t'] ?? 0;
            $volBLK = volumeBalok($p, $l, $t);
            $lpBLK = lpBalok($p, $l, $t);
            echo "<br> Panjang = $p";
            echo "<br> Lebar = $l";
            echo "<br> Tinggi = $t";
            echo "<br><br><strong>(p x l x t) =" .round($volBLK, 2) . "</storng><br><br>";
            echo "<strong>2 x (pxl + pxt * lxt) =" .round($lpBLK, 2) . "</storng><br>";
            break; 
            case 'limas':
            $s = $_POST['s'] ?? 0;           
            $t = $_POST['t'] ?? 0;
            $volLM = volumeLimas($s, $t);         
            echo "<br> Sisi = $s";           
            echo "<br> Tinggi = $t";            
            echo "<strong><br><br>1/3 x (s^2) x t =" .round($volLM, 2) . "</storng><br>";
            break; 
            case 'tabung':
            $r = $_POST['r'] ?? 0;           
            $t = $_POST['t'] ?? 0;
            $volTB = volumeTabung($r, $t);
            $lpTB = lpTabung($r, $t);         
            echo "<br> Jari-Jari = $r";           
            echo "<br> Tinggi = $t";            
            echo "<br><strong><br><br> phi x (r^2) x t =" .round($volTB, 2) . "</storng><br>";
            echo "<br><strong><br><br> 2 x phi x r (r+t)=" .round($lpTB, 2) . "</storng><br>";
            break;            
    }





    
    
    
    ?>

</body>

</html>