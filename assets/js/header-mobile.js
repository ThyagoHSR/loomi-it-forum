document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.querySelector(".menu-toggle");
    const mobileMenu = document.querySelector(".mobile-menu");
    const overlay = document.querySelector(".mobile-menu-overlay");
    const closeButton = document.querySelector(".close-menu");
  
    toggleButton.addEventListener("click", () => {
      mobileMenu.classList.add("open");
      overlay.classList.add("active");
    });
  
    closeButton.addEventListener("click", () => {
      mobileMenu.classList.remove("open");
      overlay.classList.remove("active");
    });
  
    overlay.addEventListener("click", () => {
      mobileMenu.classList.remove("open");
      overlay.classList.remove("active");
    });
  
    const parentItems = document.querySelectorAll(
      ".mobile-menu .menu-item-has-children > a"
    );
  
    parentItems.forEach((link) => {
      link.addEventListener("click", function (e) {
        e.preventDefault();
        
        const parent = this.parentElement;
        parent.classList.toggle("open");
      });
    });
  });