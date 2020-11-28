<?php

$mysqli =new mysqli("localhost", "root", "", "universitas_pasundan");

$result =$mysqli->query("SELECT * FROM mahasiswa");
$rows = $result->fetch_all();

$data_json =json_encode($rows);

echo $data_json;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>REST API</title>
</head>
<body class="container">
<h3 class="my-3">Daftar Mahasiswa</h3>
    <table border="1" class="table table-hover">
        <thead class="thead-dark">
            <tr class="warna">
            <th>No</th>
            <th>Nama</th>
            <th>NRP</th>
            <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php $i= 1; ?> 
        <?php foreach(json_decode($data_json) as $data){ ?>
                <tr>
            <td><?=$i; ?></td>
            <td><?=$data[1]; ?></td>
            <td><?=$data[2]; ?></td>
            <td><?=$data[3]; ?></td>
                
                </tr>
                <?php $i++;?>

       <?php } ?>
        </tbody>
    
    </table>
    
</body>
</html>