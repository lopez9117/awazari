$('#next-form-offer').prop('disabled', true);
$('#submit-offer').prop('disabled', true);
function valida(){
    if($('#file-offer').val() == '' || $('#description').val() == '' || $('#name-offer').val() == ''){
        $('#next-form-offer').prop('disabled', true);
    }else{
        $('#next-form-offer').prop('disabled', false);
    }
}
function enableSubmit(){
    if($('#price').val() == '' || $('#departament').val() == '' || $('#city').val() == ''){
        $('#submit-offer').prop('disabled', true);
    }else{
        $('#submit-offer').prop('disabled', false);
    }
}
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

// acordion offer
var acc = $('.offer-item');
    var i;

    for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
            panel.style.display = "none";
        } else {
            acc.removeClass('active');
            this.classList.toggle("active");
            jQuery('.open-offer-item').css({'display':'none'});
            panel.style.display = "block";
        }
    });
    }