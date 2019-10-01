(function($){


  
  $(window).on('load', function() {
    var pagina_do_santo_do_dia = window.location.href === 'http://localhost/wordpress/santo/';
    
    if(pagina_do_santo_do_dia) {
      var first_div = document.getElementsByClassName('entry-content')[0];
      
      var title = objeto_javascript.full_site;
      title = document.createRange().createContextualFragment(title);
      title = title.querySelector(".entry-title");

      var article = objeto_javascript.variavel_exemplo;
      

      article = title.innerText + "<article " + article + "article>";
      var content = document.createRange().createContextualFragment(article);
      content.innerText = article;
      
      first_div.appendChild(content);

      // var content = document
      //   .createRange()
      //   .createContextualFragment("<iframe src='http://santo.cancaonova.com/' name='iframe_a'></iframe>");

      // var first_div = document.getElementsByClassName('entry-content')[0];
      // first_div.appendChild(content);

      // var first_div = document.getElementsByClassName('entry-content')[0];
      // var article = objeto_javascript.variavel_exemplo;

      // var content = document.createRange().createContextualFragment(article);
      // var title = content.querySelector(".entry-title")
      // var description = content.querySelector(".content-santo");
      // title.appendChild(description);
      // first_div.appendChild(title);

    } else {
      console.log('não é o santo do dia');
    }
    
  });
}(jQuery));

