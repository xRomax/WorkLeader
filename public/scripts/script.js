function activeLink () {
  var URL = window.location.href;
  var URL_mas = URL.split('/');
  alert(URL_mas[2]);
  URL_mas = URL_mas[3].split('.');
  var URI = URL_mas[0];
  if (URI == '') URI = 'index'; 
  $("#" + URI).addClass('active');
}
activeLink();

$(document).ready(function(){
  $("body").niceScroll();

  $(".dropdown-trigger").dropdown({
    hover: false
  });

  var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });

  $('.sidenav').sidenav();

  $('.parallax').parallax();

  $('.collapsible').collapsible();

  $('.modal').modal();

  $('.fixed-action-btn').floatingActionButton({
    direction: 'top',
    hoverEnabled: false
  });

  $('.carousel').carousel();

  $('.carousel.carousel-country').carousel({
    duration: 500,
    padding: 50,
    numVisible: 7,
    dist: -40,
  });

  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true,
  });

  $('.carousel.carousel-country-medium-and-down').carousel({
    fullWidth: true,
    indicators: true,
    numVisible: 3,
  });

  if ($(window).width() <= '720'){
    $('.carousel-country-medium-and-down').carousel({
      indicators: false,
      numVisible: 3,
      padding: -50,
      duration: 800,
    });
    $(".banner").height(200);
  };

  if ($(window).width() <= '1000'){
    $('#tel-number').css("display","none");
  }

  $('.scrollspy').scrollSpy({
    activeClass: 'active',
  });

  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });

  setInterval(function() {
    $('.banner').carousel('next');
  }, 5000);


  $("#services").click(function() {
    $("#services_dropdown").width(150);
  });

  activeLink();

  $(".modalForm #icon_telephone").mask("+38(999)999-99-99");
  $(".sideForm #telephone").mask("+38(999)999-99-99");
  $(".bottomForm #phone").mask("+38(999)999-99-99");

  $(".nicescroll-rails-hr").css("display","none");

  $(".sendBottomForm").click(function() {
     $(".bottomForm").submit();
  });

  $('.ajax').submit(function(event) {
    var json;
    event.preventDefault();
    $.ajax({
      type: $(this).attr('method'),
      url: $(this).attr('action'),
      data: new FormData(this),
      contentType: false,
      cache: false,
      processData: false,
      success: function(result) {
        json = jQuery.parseJSON(result);
        Swal.fire({
          type: json.status,
          title: json.title,
          text: json.message,
        });
        $("body").css("padding-right","0px");
        if (json.status == "success") {
          $('.modal').modal('close');
          $("input[type=reset]").trigger("click");
        }
      },
    });
  });
});
