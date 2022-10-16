<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

$spreadsheet = $reader->load("data_covid.xlsx");
$data = $spreadsheet->getSheet(0)->toArray();

// print_r($data);

$conn = mysqli_connect("localhost","root","","scmic");

$N = count($data);
for($i = 1; $i < $N; $i++){
    echo $data[$i][0];

    echo $s = "INSERT INTO `covid_cases` (`tanggal`, `positif`) VALUES ('".$data[$i][0]."', '".$data[$i][1]."')";

    echo "<br>";
    mysqli_query($conn,$s);
}
?>