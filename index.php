<!doctype html>
<html lang="pt_br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Importação</title>
</head>
<body>

<?php

require __DIR__ . '/ImportCSV.php';

$import = new ImportCSV;
$import->setFile('municipios.csv', true);

foreach($import->getData() as $data) {

    $dataCity = [
        'cod_uf' => $data[0],
        'cod' => $data[1],
        'name' => $data[2]
    ];
    var_dump($dataCity);

    //
}

//var_dump($import->getData());



//var_dump($data);
?>

</body>
</html>