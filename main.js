// this function open the side bar
function open_sidebar() {
  var sideBar = document.getElementById("sidebar");
  if (sideBar.style.width == "50vw") sideBar.style.width = "0px";
  else sideBar.style.width = "50vw";
}
function close_sidebar() {
  var sideBar = document.getElementById("sidebar");
  if (screen.width > 750) sideBar.style.width = "0px";
}
// this make the nav bar dissappear on scroll down and reappear on scroll up
// this fuction is disabaled if the side bar is open
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (currentScrollPos < 400) {
    document.getElementById("navbar").style.top = "0";
    document.getElementById("menu-icon").style.top = "35px";
    return;
  }
  if (!(document.getElementById("sidebar").style.width == "50vw")) {
    if (prevScrollpos < currentScrollPos) {
      document.getElementById("navbar").style.top = "-70px";
      document.getElementById("menu-icon").style.top = "-35px";
    } else {
      document.getElementById("navbar").style.top = "0";
      document.getElementById("menu-icon").style.top = "35px";
    }
  }
  prevScrollpos = currentScrollPos;
};
//* this function is for the scroll to top button (when you scroll down a scroll to top button appears when you click it gets you back to the top)
$(window).scroll(function() {
  if ($(this).scrollTop() > 50 ) {
      $('.scrolltop:hidden').stop(true, true).fadeIn();
  } else {
      $('.scrolltop').stop(true, true).fadeOut();
  }
});
$(function(){$(".scroll").click(function(){$("html,body").animate({scrollTop:$(".home").offset().top},"1000");return false})})