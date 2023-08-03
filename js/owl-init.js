jQuery(document).ready(function(){
  jQuery('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    dots: false,
    nav:true,
    navText: [' &#10094; ', ' &#10095; '],
    navElement: "div",
    navClass:['btn mx-1', 'btn mx-1'],
    autoplay:true,
    autoplayTimeout:10000,
    autoplayHoverPause:true,
    responsive:{
      0:{
        items:1
      },
      576:{
        items:2
      },
      992:{
        items:4
      },
      1200:{
        items:5
      }
    }
  })
});
