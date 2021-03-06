$ = jQuery.noConflict();

//Google Fonts
WebFont.load({
    google : {
        families : ['Montserrat:400,700:latin', 'Lato:400,100,300,400italic,700,900:latin', 'Roboto+Slab:400,700,300,100:latin']
    }
});

$(document).ready(function() {
  $('.full-size').fullSize();
  $('.full-size-min').fullSizeMin();
  $('.parallax').parallax();
  $('.behance-portfolio').behancePortfolio();
  $('.async-bg').asyncBackground();
  window.sr = new scrollReveal();
});
