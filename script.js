$(document).ready(function () {
  $("#scrollToTop").click(function () {
    $("html, body").animate({ scrollTop: 20 }, "1500");
    return false;
  });
  $(".header-hide .bar").click(function () {
    $(".header .header-right").slideToggle("slow").stopImmediatePropagation();
  });
});
