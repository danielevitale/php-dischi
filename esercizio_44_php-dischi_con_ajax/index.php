<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="public/style/style.css">
  </head>
  <body>

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
