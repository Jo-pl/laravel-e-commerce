let index=0;
setInterval(carouselChange, 11000);
function focusSearch(){
    $('.search-title').css('display','none');
    $('.searchbar').addClass('searchbarFocus');
}

function carouselChange(){
    $('.counter'+(index%3)).removeClass('carousel-selected');
    $('.counter'+((index+1)%3)).addClass('carousel-selected');
    index++;
}