<?php
// if($_SERVER['REQUEST_METHOD'] == "POST") {
//     $name = $_POST['name'];
//     $nim = $_POST['nim'];
//     $alamat = $_POST['alamat'];  
    
//     echo "Nama saya adalah &nbsp" . $name . "&nbsp NIM saya &nbsp" . $nim . ",&nbsp Alamatnya di &nbsp" . $alamat; 
    
//     }    

    // // if($_SERVER['REQUEST_METHOD'] == "POST") {
    // if (isset($_POST['tampil'])){
    // $name = $_POST['name'];
    // $nim = $_POST['nim'];
    // $alamat = $_POST['alamat'];  
    // $angka1 = $_POST['angka1'];
    // $angka2 = $_POST['angka2'];
    // $hasil = $angka1 * $angka2;
    
    // echo "Nama saya adalah &nbsp" . $name . "&nbsp NIM saya &nbsp" . $nim . ",&nbsp Alamatnya di &nbsp" . $alamat . "&nbsp Hasilnya adalah &nbsp" . $hasil; 
    
    // }    

    // if($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['tampil'])){
    $name = $_POST['name'];
    $nim = $_POST['nim'];
    $alamat = $_POST['alamat'];  
    $angka1 = floatval($_POST['angka1'] ?? 0);
    $angka2 = floatval($_POST['angka2'] ?? 0);
    $oprator = $_POST['oprator'];
    
    function hasilPerhitungan($angka1, $angka2, $oprator){
        switch ($oprator) {
            case '+':
               return $angka1 + $angka2;
                break;
            case '-':
               return  $angka1 - $angka2;
                break;
            case '*':
                return $angka1 * $angka2;
                break;
            case '/':
               return $angka1 / $angka2;
                break;    
            
        }
    }


    // $hasil = $angka1 * $angka2;

    echo "Nama saya adalah &nbsp" . $name . "&nbsp NIM saya &nbsp" . $nim . ",&nbsp Alamatnya di &nbsp" . $alamat . "&nbsp Hasilnya adalah &nbsp" . hasilPerhitungan($angka1, $angka2, $oprator); 
    
    }
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        
        <form action="" method="post">
            <label for="">Nama</label><br>
            <input type="text" name="name"><br>
            <label for="">NIM</label><br>
            <input type="number" name="nim"><br>
    <label for="">Alamat</label><br>
    <textarea name="alamat"cols=21 rows=5 id=""></textarea><br>
    <label for="">Number 1</label><br>    
    <input type="number" name="angka1"><br><br>
    <select name="oprator" id="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">x</option>
        <option value="/">/</option>
    </select> <br><br>
    <label for="">Number 2</label><br>
    
    <input type="number" name="angka2"><br>
    <button type="submit" name="tampil">Tampilkan Data</button>
</form>

<?php
// if(isset($name)){

//     echo "<br>Nama saya adalah &nbsp" . $name . "<br> NIM saya &nbsp" . $nim . "<br>Alamatnya di &nbsp" . $alamat . "<br> Hasilnya Adalah &nbsp" . $hasil; 
// }
?> 
    

</body>
</html>