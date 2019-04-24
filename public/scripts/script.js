function activeLink () {
  let url = parseUrl(window.location.href).pathname;
  let URI_MAS = url.split('/');
  let URI = URI_MAS[1].split(',');
  if (URI[0] == '') URI = 'index'; 
  $("#" + URI[0]).addClass('active');
}
function parseUrl(url) {
  let a = document.createElement('a');
  a.href = url;
  return a;
}

$(document).ready(function(){
  if ($(window).width() >= '993'){
    $("body").niceScroll();
    $("html body").css('overflow-y','hidden');
  };

  if ($(window).width() < '993'){
    $("html body").css('overflow-x','hidden');
  }

  $("#scroll-country-body").niceScroll();

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

  $('.collapsible').collapsible({
    accordion: false,
  });

  $('.modal').modal();

  $('.fixed-action-btn').floatingActionButton({
    direction: 'top',
    hoverEnabled: false
  });

  $('.carousel').carousel();

  $('.carousel.carousel-slider').carousel({
    fullWidth: true,
    indicators: true,
  });

  if ($(window).width() <= '1258'){
    $('.navbar-info').css("display","none");
  }

  $('.scrollspy').scrollSpy({
    activeClass: 'active',
  });

  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });

  setInterval(function() {
    $('.carousel').carousel('next');
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
    let path = $(this).attr('action');
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