document.addEventListener("DOMContentLoaded", function () {
  var menuContent = document.querySelector("form");
  var isMenuVisible = localStorage.getItem("isMenuVisible");

  if (isMenuVisible === "true") {
    menuContent.style.display = "block";
  } else {
    menuContent.style.display = "none";
  }

  document.getElementById("menuId").addEventListener("click", function (event) {
    event.preventDefault();
    if (
      menuContent.style.display === "none" ||
      menuContent.style.display === ""
    ) {
      menuContent.style.display = "block";
      localStorage.setItem("isMenuVisible", "true");
    } else {
      menuContent.style.display = "none";
      localStorage.setItem("isMenuVisible", "false");
    }
  });
});
