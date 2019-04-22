function activeLink () {
  var URL = window.location.href;
  var URL_mas = URL.split('/');
  URL_mas = URL_mas[3].split('.');
  var URI = URL_mas[0];
  if (URI == '') URI = 'index'; 
  $("#" + URI).addClass('active');
}

$(document).ready(function(){
  if ($(window).width() >= '993'){
    $("body").niceScroll();
    $("html body").css('overflow-y','hidden');
  }

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

// $(document).ready(function(){
//   var slider = document.getElementById('salary-slider');
//     noUiSlider.create(slider, {
//      start: [2900, 5000],
//      connect: true,
//      step: 100,
//      orientation: 'horizontal',
//      range: {
//        'min': 2200,
//        'max': 6000
//      },
//      format: wNumb({
//        decimals: 0,
//      })
//     });
  
//     setInterval(function() {
//       let salary = slider.noUiSlider.get();
//       let Salary = Array.from(salary);
//       $("#min-salary").val(Salary[0]);
//       $("#max-salary").val(Salary[1]);
//     }, 100);
// });