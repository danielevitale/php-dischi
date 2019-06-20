<!-- Stampare a schermo una decina di dischi musicali.
Attraverso l’utilizzo di AJAX: al caricamento della pagina ajax chiederà attraverso una chiamata i dischi a php e li stamperà attraverso handlebars.
Attraverso un’altra chiamata ajax, ﬁltrare gli album per artista -
Attraverso un’altra chiamata ajax, ordinare gli album per data di uscita. -->


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>php-dischi</title>
    <link rel="stylesheet" href="public/style/style.css">
  </head>
  <body>
    <div class="container_button">
      <select class="" name="">
        <option value="">SCEGLI ARTISTA</option>
      </select>
      <button type="button" name="button">ORDINA PER DATA DI USCITA</button>
    </div>
    <div class="container">

    </div>

    <!-- Handlebars -->
    <script id="card" type="text/x-handlebars-template">
      <div class="card">
         <div class="card_copertina">
           <img src="{{immagine_copertina}}" alt="">
         </div>
         <div class="card_valori">
           <h3>{{titolo}}</h3>
           <h4>{{artista}}</h4>
           <h4>{{anno}}</h4>
         </div>
       </div>
     </div>
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.1.2/handlebars.min.js"></script>
    <script src="public/js/script.js"></script>

  </body>
</html>
