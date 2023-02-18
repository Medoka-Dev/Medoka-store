$(window).scroll(function () {
  if ($(window).scrollTop()) {
    $("nav").addClass("black");
  } else $("nav").removeClass("black");
});
function open_sidebar() {
  var sideBar=document.getElementById("sidebar");
  if (sideBar.style.width == "50vw")
    sideBar.style.width = "0px";
  else sideBar.style.width = "50vw";
}
