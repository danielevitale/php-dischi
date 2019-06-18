<!-- Stampare a schermo una decina di dischi musicali.
Solo con l’utilizzo di PHP, che stampa direttamente i dischi in pagina: al caricamento della pagina ci saranno tutti i dischi.
I dati da visualizzare per ogni disco sono:
- immagine di copertina
- titolo album
- nome artista
- anno d'uscita -->


<?php

include 'database.php';

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="public/style/style.css">
  </head>
  <body>

    <div class="container">
        <?php
        foreach ($db_dischi as $key => $value) {
         ?>
         <div class="card">
            <div class="card_copertina">
              <img src="<?php echo ($value['immagine_copertina']) ?>" alt="">
            </div>
            <div class="card_valori">
              <h3><?php echo ($value['titolo']) ?></h3>
              <h4><?php echo ($value['artista']) ?></h4>
              <h4><?php echo ($value['anno']) ?></h4>
            </div>
          </div>
        <?php
        }
        ?>
      </div>
  </div>

  </body>
</html>
