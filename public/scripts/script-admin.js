$(document).ready(function(){

  $('.collapsible').collapsible();
  var elem = document.querySelector('.collapsible.expandable');
  var instance = M.Collapsible.init(elem, {
    accordion: false
  });

  $('.sidenav').sidenav();

  $('select').formSelect();

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
          Swal.fire({
            type: json.status,
            title: json.title,
            text: json.message,
          });
        }
      },
    });
  });
});
