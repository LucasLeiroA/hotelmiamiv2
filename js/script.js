function mobileMenuToggle() {
  if (document.querySelector(".mobile").classList.contains("menu-toggle")) {
    document.querySelector(".mobile").classList.remove("menu-toggle");
  } else {
    document.querySelector(".mobile").classList.add("menu-toggle");
  }
}