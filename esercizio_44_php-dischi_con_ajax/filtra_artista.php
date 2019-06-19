<?php

require 'database.php';

$artista = $_POST['artista'];
$array_filtrato = [];

foreach ($db_dischi as $key => $value) {
  if ($artista == $value['artista']) {
    $array_filtrato[] = $value;
  }
};
echo json_encode($array_filtrato);


 ?>
