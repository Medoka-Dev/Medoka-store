var sideBar = document.getElementById("sidebar");
//* copy the content of the navbar in the sidebar
$( document ).ready(function() {
  document.getElementById("sidebar-list").innerHTML = document.getElementById("navlist").innerHTML;
  document.getElementById("sidebar-user-info").innerHTML = document.getElementById("user-info").innerHTML;
});
//* closes the sidebar on click
$('#sidebar').find('*').on("click",function(){
  sideBar.style.width = "0px";
});
$('#sidebar').on("click",function(){
  sideBar.style.width = "0px";
});
//* this function open the side bar
function open_sidebar() {
  if (sideBar.style.width == "60vw") sideBar.style.width = "0px";
  else sideBar.style.width = "60vw";
}
function close_sidebar() {
  if (screen.width > 750) sideBar.style.width = "0px";
}
//* this make the nav bar dissappear on scroll down and reappear on scroll up
//* this fuction is disabaled if the side bar is open
var prevScrollpos = window.pageYOffset;
window.onscroll = function () {
  var currentScrollPos = window.pageYOffset;
  if (currentScrollPos < 400) {
    document.getElementById("navbar").style.top = "0";
    return;
  }
  if (!(document.getElementById("sidebar").style.width == "60vw")) {
    if (prevScrollpos < currentScrollPos) {
      document.getElementById("navbar").style.top = "-70px";
    } else {
      document.getElementById("navbar").style.top = "0";
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

//* the cursor effect on the cards in the services section
document.getElementById("cards").onmousemove = e => {
  for(const card of document.getElementsByClassName("card")) {
    const rect = card.getBoundingClientRect(),
          x = e.clientX - rect.left,
          y = e.clientY - rect.top;

    card.style.setProperty("--mouse-x", `${x}px`);
    card.style.setProperty("--mouse-y", `${y}px`);
  };
}
//-login form js

document.getElementById("login").onclick = function() {
  document.getElementById("registration_form").style.display = "initial";
}
document.getElementById("sign").onclick = function() {
  document.getElementById("registration_form").style.display = "initial";
}
$(function() {
	$("form").attr('novalidate', 'novalidate');
    $('.panel__link, .form__retrieve-pass').on('click', function(e) {

        e.preventDefault();

        if ($(this).attr('href') === '#password-form') {
            $('.panel__header').removeClass('active');
        } else {
            $(this).parent().addClass('active');
            $(this).parent().siblings().removeClass('active');
        }
        target = $(this).attr('href');
        $('.panel__forms > form').not(target).hide();
        $(target).fadeIn(500);
    });

    $('.panel__prev-btn').on('click', function(e) {
        $('.panel, .panel_blur').fadeOut(300);
    });
});
