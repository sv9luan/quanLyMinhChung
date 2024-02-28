// (function ($) {
//   "use strict";

//   var fullHeight = function () {
//     $(".js-fullheight").css("height", $(window).height());
//     $(window).resize(function () {
//       $(".js-fullheight").css("height", $(window).height());
//     });
//   };
//   fullHeight();

//   $("#sidebarCollapse").on("click", function () {
//     $("#sidebar").toggleClass("active");
//   });
// })(jQuery);
function goBack() {
  window.history.back();
}
function printPage() {
  window.print();
}
window.onload = function () {
  document.body.style.opacity = 1;
};
