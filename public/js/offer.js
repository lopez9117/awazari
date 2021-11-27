$('#next-form-offer').on('click', function(e){
    $('.section-name-image-description').css({'display':'none'});
    $('.section-price-location').css({'display':'block'});
    e.preventDefault();
});

$('#back-form-offer').on('click', function(e){
    $('.section-name-image-description').css({'display':'block'});
    $('.section-price-location').css({'display':'none'});
    e.preventDefault();
});