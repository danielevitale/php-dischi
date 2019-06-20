<?php

require 'database.php';

// Dichiaro l'array che conterrà gli anni di uscita degli album
$array_anni = [];

// Scorro l'array degli album e inserisco gli anni di uscita nell'array $array_anni
foreach ($db_dischi as $value) {
  $array_anni[] = intval($value['anno']);
};
// Ordino in modo crescente l'array che contiene gli anni di uscita degli album
sort($array_anni);
// Inizializzo l'array che conterrà gli album in ordine di data di uscita
$db_dischi_ordinato = [];
// Creo una copia dell'array che contiene gli album
$db_dischi_da_ordinare = $db_dischi;
// Scorro l'array degli anni di uscita
foreach ($array_anni as $val) {
  $i = 0;
  // Scorro l'array degli album finché non trova un'uguaglianza tra gli anni
  while ($db_dischi_da_ordinare[$i]['anno'] != $val) {
    $i++;
  }
  // Quando si verifica un'uguaglianza aggiungo l'album nell'array $db_dischi_ordinato e rimuovo quell'album
  // dall'array $db_dischi_da_ordinare
  $db_dischi_ordinato[] = $db_dischi_da_ordinare[$i];
  unset($db_dischi_da_ordinare[$i]);
};

echo json_encode($db_dischi_ordinato);

 ?>
