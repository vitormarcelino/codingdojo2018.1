// Dísponivel no GitHub: https://github.com/vitormarcelino/codingdojo2018.1

var fistItem = 0;
var lastItem = 3;
var itensPerPage = 4;
var page = 1;

function renderCarousel() {
    $('.item').each(function(index) {
        if(fistItem <= index && index <= lastItem) {
            $(this).removeClass('hidden');
        } else {
            $(this).addClass('hidden');
        }
    });
    
    $('.carousel-dot').each(function(index) {
        if(index == (page - 1)) {
            $(this).addClass('active');
        } else {
            $(this).removeClass('active');
        }
    });
    
    if(page == 1){
        $('.left').addClass('hidden');
    } else {
        $('.left').removeClass('hidden');
    }
    
    if(page == 3){
        $('.right').addClass('hidden');
    } else {
        $('.right').removeClass('hidden');
    }
}

$('.right').click(function() {
    page++;
    fistItem += itensPerPage;
    lastItem += itensPerPage;
    renderCarousel();
});

$('.left').click(function() {
    page--;
    fistItem -= itensPerPage;
    lastItem -= itensPerPage;
    renderCarousel();
});

renderCarousel();