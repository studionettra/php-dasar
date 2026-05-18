<?php
const email = "imam@ppkdjp.com";
echo email;

define("nama", "Imam");
echo "<br>";
echo nama;

// array

$fruits = array("Aple", "Mangga", "Pisang");
$cars = ["Volkswagen", "Fiat", "Toyota"];
echo "<br>";

// var_dump($fruits)


echo "<br>";
array_push($fruits, "Anggur", "Chery");
foreach ($fruits as $key => $fruit) {
    echo "Nama Buah adalah $fruit <br>";
}
echo "<br>";
echo $fruits[2];

echo "<br>";

// ARRAY ASOSIATIVE | Multi Dimensi

$motocycles = [
    [
        'merek' => 'Supra',
        'warna' => 'Hitam',
        'tahun' => 2025,
        'cc' => 125
    ],
    [
        'merek' => 'PCX',
        'warna' => 'Merah',
        'tahun' => 2026,
        'cc' => 160
    ],
    [
        'merek' => 'Jupiter',
        'warna' => 'Hijau',
        'tahun' => 2023,
        'cc' => 160
    ]
];

// var_dump($motocycles)
/*
    foreach($motocycles as $key => $motocycle){
    // EKSEKUSI TAG PHP DALAM HTML DENGAN BUKA TUTUP PHP
    
       ?>
        <ul>
            <li><?php echo $motocycle['merek']?></li>
            <li><?php echo $motocycle['warna']?></li>
            <li><?php echo $motocycle['tahun']?></li>
            <li><?php echo $motocycle['cc']?></li>       
        </ul>
        <?php
    
    */
/*
        echo "<ul>
            <li>Nama Motor : " . $motocycle['merek']. " </li>
            <li>Warna Motor : " . $motocycle['warna']. " </li>
            <li>Tahun Motor : " . $motocycle['tahun']. " </li>
            <li>CC Motor : " . $motocycle['cc'] . " </li>      
        </ul>";            
        
    }
        */

/*

// HAYA MENGAMBIL ARRAY 2
    foreach($motocycles as $index => $motocycle){
        if($index == 2){

            echo "<ul>
                <li>Nama Motor : " . $motocycle['merek']. " </li>
                <li>Warna Motor : " . $motocycle['warna']. " </li>
                <li>Tahun Motor : " . $motocycle['tahun']. " </li>
                <li>CC Motor : " . $motocycle['cc'] . " </li>      
            </ul>";            
        }       
        
    }
        */


// MEMBAMBIL DATA SELAIN ARRAY KE-2 
foreach ($motocycles as $index => $motocycle) {
    if ($index !== 2) {

        echo "<ul>
                <li>Nama Motor : " . $motocycle['merek'] . " </li>
                <li>Warna Motor : " . $motocycle['warna'] . " </li>
                <li>Tahun Motor : " . $motocycle['tahun'] . " </li>
                <li>CC Motor : " . $motocycle['cc'] . " </li>      
            </ul>";
    }
}

//MEMILIH ARRAY TERTENTU
echo $motocycles[2]["cc"]; 


//OPERATOR MATEMATIKA
// < : KECIL
// > : BESAR
// <= : LEBIH KECIL ATAU SAMADENGAN
// >= : LEBIH BESAR ATAU SAMADENGAN
//  == : SAMADENGAN
//  === : SAMA DENGAN & CEK TIPE DATA
// !== : TIDAK SAMADENGAN


// IF
echo"<br>";
echo"<br>";
$nama = "Budi";
if($nama == "Rizal"){
    Echo "Salah";
}else {
    echo "Benar";
}

echo"<br>";
echo"<br>";

$nilai = 50; //NILAINYA
if($nilai >= 90 && $nilai <=100){
    echo "A";
}elseif ($nilai >= 80 && $nilai <=89){
    echo "B";
}elseif ($nilai <= 79) {
    echo "C";
}else {
    echo "KEBANYAKANNN"; 
}

echo"<br>";
echo"<br>";

#IFTENARY
$hasil = ($nilai >= 90 && $nilai <= 100) ? 'A' : ($nilai >= 80 && $nilai <= 89 ? 'B' : ($nilai <=79 ? 'C' : 'Nilai Tidak Diketahui'));

echo $hasil;


//SWICH
echo"<br>";
echo"<br>";

$warna = "merah";
switch ($warna){
    case 'biru':
        echo "Ini warna Biru";
        break;
    case 'orange';
    echo "Ini warna Orange";
    break;
    case 'hijau';
    echo "Ini warna Hijau";
    break;
    case 'pink';
    echo "Ini warna Pink";
    break;
    case 'merah';
    echo "Ini warna Merah";
    break;
    default:
    echo "bukan warna";
    break;
}

echo"<br>";
echo"<br>";

// LOOPING ATAU PERULANGAN = STRUKTUR KODE YANG DIGUNAKAN UNTUK MENJALANKAN BLOK KODE SELAMA KONDISI  TERTENTU TERPENUHI
// for, while, do..while

for ($i = 1; $i <= 15; $i++){
    echo "$i Imam" . "<br>";
}


echo"<br>";
echo"<br>";
//WHILE
//
$a = 1;
while($a <= 10){
    echo "Ini Angka ke- $a <br>";
    $a++;
}


echo"<br>";
echo"<br>";
//DO 
//MELAKUKAN MESKI HASILNYA SALAH
$b = "TESSS";
do{
    echo "Halo ke-$b <br>";
    $b++;
} while ($b <= 20);


echo"<br>";
echo"<br>";
//FUNCTION : BLOK KODE YANG DIBERI NAMA, YANG BISA DIPANGGIL KAPAN SAJA UNTUK MENJALANKAN TUGAS TERTU
//MENGINDARI PERULANGAN KODE (CIDE RE-USE), MEMECAH LOGIKA MENJADI BAGIAN TERKECIL
// - array_push(), substr(), strln(), str_word_count(), ucfirst()


function nameAnda ($name, $usia)
{

    return "Nama anda adalah $name, usia anda adalah $usia tahun <br>";
}

echo nameAnda("Andi",22);
echo nameAnda("Rudi",30);
echo nameAnda("Fahri",29);

echo"<br>";
echo"<br>";

$stringName = "saya seorang pelajar di PPKD jakarta pusat";

echo substr($stringName, 5); // menghilagkan 5 karakter termasuk spasi di awal
echo"<br>";
echo"<br>";
echo strlen($stringName); //panjang karakter dan spasi
echo"<br>";
echo"<br>";
echo str_word_count($stringName); //menghitung jumlah string termasuk spasi
echo"<br>";
echo"<br>";
echo ucfirst($stringName); //uppercase di awal kata
echo"<br>";
echo"<br>";
echo ucwords($stringName); //uppercase setiap awal kata

?>


