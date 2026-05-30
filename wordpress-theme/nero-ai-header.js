(function () {
  "use strict";

  var header = document.getElementById("nero-ai-header");
  var toggle = document.getElementById("nero-ai-header-toggle");
  var nav = document.getElementById("nero-ai-header-nav");
  var backdrop = document.querySelector(".nero-ai-header-backdrop");

  if (!header || !toggle || !nav) {
    return;
  }

  function setOpen(open) {
    header.classList.toggle("is-open", open);
    document.body.classList.toggle("nero-header-menu-open", open);
    toggle.setAttribute("aria-expanded", open ? "true" : "false");
  }

  function closeMenu() {
    setOpen(false);
  }

  toggle.addEventListener("click", function (event) {
    event.preventDefault();
    event.stopPropagation();
    setOpen(!header.classList.contains("is-open"));
  });

  if (backdrop) {
    backdrop.addEventListener("click", closeMenu);
  }

  nav.querySelectorAll("a").forEach(function (link) {
    link.addEventListener("click", closeMenu);
  });

  document.addEventListener("keydown", function (event) {
    if (event.key === "Escape") {
      closeMenu();
    }
  });

  window.addEventListener(
    "scroll",
    function () {
      header.classList.toggle("is-scrolled", window.scrollY > 8);
    },
    { passive: true }
  );
  header.classList.toggle("is-scrolled", window.scrollY > 8);

  window.addEventListener(
    "resize",
    function () {
      if (window.innerWidth > 1024) {
        closeMenu();
      }
    },
    { passive: true }
  );
})();
