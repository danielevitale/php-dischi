var $ = require('jquery');

var card_disco = $("#card").html();
var template = Handlebars.compile(card_disco);

function lettura_db() {
  $.ajax({
    'url': 'json_db.php',
    'method': 'GET',
    'success': function(data) {
      var db_dischi = JSON.parse(data);
      // Scorro l'array di oggetti db_dischi per generare l'oggetto context e per aggiungere le options alla select
      // Inizializzo un array che servirà a contenere tutti gli artisti
      var array_option = [];
      for (var i = 0; i < db_dischi.length; i++) {
        // Aggiungo le options alla select
        //  verificando che ogni artista venga inserito una sola volta
        if (!array_option.includes(db_dischi[i].artista)) {
          $("select").append("<option>" + db_dischi[i].artista + "</option>");
          array_option.push(db_dischi[i].artista);
        }
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
}


$(document).ready(function() {

  // Richiamo la funzione che genera le card
  lettura_db();

  // al cambio del valore della select visualizzo solo gli album dell'artista scelto
  $("select").change(function(){
    // Leggo il valore dell'option scelta dall'utente
    var scelto = $("select").val();
    console.log(scelto);
    // Verifico che l'utente abbia effettivamente scelto un artista
    if (scelto != '') {
      // Svuoto il container delle card visualizzate prima del change select
      $(".container").empty();
      // Effettuo chiamata ajax per inviare l'artista scelto dall'utente
      $.ajax({
        'url': 'filtra_artista.php',
        'method': 'POST',
        'data': {
          'artista': scelto
        },
        'success': function(data) {
          // La chiamata mi restituisce un array con gli album del singolo artista
          var array_filtrato = JSON.parse(data);
          // Scorro l'array di oggetti array_filtrato e genero l'oggetto context
          for (var i = 0; i < array_filtrato.length; i++) {
            var context = {
              "immagine_copertina": array_filtrato[i].immagine_copertina,
              "titolo": array_filtrato[i].titolo,
              "artista": array_filtrato[i].artista,
              "anno": array_filtrato[i].anno,
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
    }
  })

  $("button").click(function(){
    // Svuoto il container delle card che compaiono al caricamento della pagina
    $(".container").empty();
    $.ajax({
      'url': 'ordina_data.php',
      'method': 'GET',
      'success': function(data) {
        // La chiamata mi restituisce un array con gli album ordinati per data di uscita
        var array_ordinato = JSON.parse(data);
        // Scorro l'array di oggetti array_ordinato e genero l'oggetto context
        for (var i = 0; i < array_ordinato.length; i++) {
          var context = {
            "immagine_copertina": array_ordinato[i].immagine_copertina,
            "titolo": array_ordinato[i].titolo,
            "artista": array_ordinato[i].artista,
            "anno": array_ordinato[i].anno,
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
})
