
$('.gn-icon-menu').hover(function(){
  $('.gn-menu-wrapper').toggleClass('gn-open-part');
});

$('.gn-menu-wrapper').hover(function(){
  $(this).toggleClass('gn-open-all');
})