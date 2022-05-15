$(document).ready(function () {
  $("#scrollToTop").click(function () {
    $("html, body").animate({ scrollTop: 20 }, "1500");
    return false;
  });
  $(".header-hide .bar").click(function () {
    $(".header .header-right").slideToggle("slow").stopImmediatePropagation();
  });
  $(window).scroll(function () {
    if ($(window).width() < 1140) {
      var scroll = $(window).scrollTop();
      if (scroll >= 500) {
        $(document).removeClass(".header .header-right");
      } else {
        $(document).addClass(".header .header-right");
      }
    }
  });
});
