$(document).ready(function () {
    $(".menu-toggle").click(function () {
        $(this).toggleClass('active');
        $('.navigation').toggleClass('active');
        $('body').toggleClass('fixed');
    });      
});

$(document).ready(function () {
    var dropdownToggle = $('.dropdown-toggle');
    var dropdownMenu = $('.dropdown-menu');
  
    dropdownToggle.on('click', function () {
      dropdownMenu.toggleClass('show');
    });
  
    $(window).on('click', function (event) {
      if (!dropdownToggle.is(event.target) && dropdownToggle.has(event.target).length === 0) {
        dropdownMenu.removeClass('show');
      }
    });
  });
  
  
function loadmore() {
    document.getElementById('logo-sec').style.height = "100%";
    document.getElementById('load-more').style.display = "none"

}