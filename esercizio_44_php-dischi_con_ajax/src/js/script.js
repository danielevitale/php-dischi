var $ = require('jquery');

var card_disco = $("#card").html();
var template = Handlebars.compile(card_disco);

$(document).ready(function() {

  $.ajax({
    'url': 'database.php',
    'method': 'GET',
    'success': function(data) {
      var db_dischi = JSON.parse(data);
      // Scorro l'array di oggetti db_dischi e genero l'oggetto context
      for (var i = 0; i < db_dischi.length; i++) {
        console.log(db_dischi[i]);
        var context = {
          "immagine_copertina": db_dischi[i].immagine_copertina,
          "titolo": db_dischi[i].titolo,
          "artista": db_dischi[i].artista,
          "anno": db_dischi[i].anno,
        }
        // Genero la var html e inserisco nel html
        var html = template(context);
        $(".container").append(html);
      }
    },
    'error': function() {
      alert('si è verificato un errore');
    }
  });

});
