//Nav Animation
$('nav a, header a, #quem_dir a, #banner a').click(function(e){
  e.preventDefault();
  var id = $(this).attr('href');
      targetOffset = $(id).offset().top;
      menuHeight = $('#menu').innerHeight();
      headerHeight = $('header').innerHeight();
      altura = menuHeight + headerHeight
    $('html, body').animate({
      scrollTop: targetOffset - 50
    }, 500);

      //console.log(menuHeight);
      //console.log(headerHeight);
});



//Fecha menu responsivo ao clicar
$('.navbar-nav a').on('click', function(){
    $('.collapse').toggleClass('show'); 
});




// Debounce do Lodash
debounce = function(func, wait, immediate) {
  var timeout;
  return function() {
    var context = this, args = arguments;
    var later = function() {
      timeout = null;
      if (!immediate) func.apply(context, args);
    };
    var callNow = immediate && !timeout;
    clearTimeout(timeout);
    timeout = setTimeout(later, wait);
    if (callNow) func.apply(context, args);
  };
};

const target = document.querySelectorAll('[data-anime]');
const animationClass = 'animate';

function animeScroll() {
    const windowTop = window.pageYOffset + (window.innerHeight * 1);

    target.forEach(function(element){
        if((windowTop > element.offsetTop)){
            element.classList.add(animationClass);
        }else{
            element.classList.remove(animationClass);
        }
    })

    
}

animeScroll();

if(target.length){
    
    window;addEventListener('scroll', debounce(function(){
        animeScroll();
        console.log('asdadasd');
    },300));

}
