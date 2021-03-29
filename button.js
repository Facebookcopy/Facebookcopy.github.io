var leftstring = window.getComputedStyle(document.getElementById("button")).marginLeft;
var topstring = window.getComputedStyle(document.getElementById("button")).marginTop;

function myFunction()
{
  marginLeft = Math.floor(Math.random() * 1700) + 50;
  document.getElementById("button").style.marginLeft = String(marginLeft) + "px";
  marginTop = Math.floor(Math.random() * 820) + 50;
  document.getElementById("button").style.marginTop = String(marginTop) + "px";
};