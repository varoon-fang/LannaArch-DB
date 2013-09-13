//=require bootstrap-all

$(document).ready(function() {

  $("#button-progress").click(function(e) {
    $(e.currentTarget).button('loading');
    setTimeout(function () {
      $(e.currentTarget).button('reset');
    }, 8000);
  });
  
  $("#button-progress2").click(function(e) {
    $(e.currentTarget).button('loading');
    setTimeout(function () {
      $(e.currentTarget).button('reset');
    }, 10000);
  });
  
});
