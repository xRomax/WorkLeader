function activeLink () {
  var URL = window.location.href;
  var URL_mas = URL.split('/');
  URL_mas = URL_mas[3].split('.');
  var URI = URL_mas[0];
  if (URI == '') URI = 'index'; 
  $("#" + URI).addClass('active');
}

$(document).ready(function(){
  $("body").niceScroll();

  $(".dropdown-trigger").dropdown({
    hover: false
  });

  $('.sidenav').sidenav();

  $('.parallax').parallax();

  $('.collapsible').collapsible();

  $('.collapsible.jobs').collapsible({
    according: false,
  });

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

  $('.carousel.carousel-hot-work').carousel({
    duration: 500,
    padding: 300,
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
    $('#tel-number').css("display","none");
  };

  $('.scrollspy').scrollSpy({
    activeClass: 'active',
  });

  $(document).ready(function(){
    $('.tooltipped').tooltip();
  });

  setInterval(function() {
    $('.baner').carousel('next');
  }, 5000);

  setInterval(function() {
    $('.carousel-hot-work').carousel('next');
  }, 6000);

  $("#services").click(function() {
    $("#services_dropdown").width(150);
  });

  // activeLink();

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
        if (json.url) {
          window.location.href = '/' + json.url;
        } else {
          alert(json.status + ' - ' + json.message);
        }
      },
    });
  });
});
