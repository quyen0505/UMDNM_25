document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".featured-slider", {
    slidesPerView: 3,
    spaceBetween: 30,
    loop: true, // Cho phép lặp vô hạn
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });
});

document.querySelectorAll(".featured-image").forEach(card => {
  card.addEventListener("mousemove", e => {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const midX = rect.width / 2;
    const midY = rect.height / 2;
    const rotateX = ((y - midY) / midY) * -5; 
    const rotateY = ((x - midX) / midX) * 5; 
    card.querySelector("img").style.transform = `perspective(800px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) scale(1.05)`;
  });
  card.addEventListener("mouseleave", () => {
    card.querySelector("img").style.transform = "scale(1)";
  });
});
document.querySelectorAll('.slide-item').forEach(card => {
  card.addEventListener('mousemove', e => {
    const rect = card.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;
    const midX = rect.width / 2;
    const midY = rect.height / 2;
    const rotateX = ((y - midY) / midY) * -5;
    const rotateY = ((x - midX) / midX) * 5;
    card.style.transform = `rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
  });
  card.addEventListener('mouseleave', () => {
    card.style.transform = "rotateX(0) rotateY(0)";
  });
});
document.addEventListener("DOMContentLoaded", function () {
  new Swiper(".mySwiper", {
    slidesPerView: 1,
    loop: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 5000,
      disableOnInteraction: false,
    },
  });
});
document.querySelectorAll('.post-card').forEach(card => {
  const img = card.querySelector('img');
  card.addEventListener('mousemove', e => {
    const rect = card.getBoundingClientRect();
    const x = (e.clientX - rect.left) / rect.width - 0.5;
    const y = (e.clientY - rect.top) / rect.height - 0.5;
    img.style.transform = `scale(1.1) translate(${x * 20}px, ${y * 20}px)`;
  });
  card.addEventListener('mouseleave', () => {
    img.style.transform = 'scale(1)';
  });
});

window.addEventListener("scroll", function() {
  if (window.scrollY > 50) {
    document.body.classList.add("scrolled");
  } else {
    document.body.classList.remove("scrolled");
  }
});
document.addEventListener("DOMContentLoaded", function() {
  const logo = document.querySelector(".site-branding img");
  if (!logo) return;

  const defaultLogo = logo.src; // logo gốc trong WP
  const scrollLogo = "https://wanderland.qodeinteractive.com/wp-content/uploads/2019/10/logo-dark-img-01.png"; // link logo khi scroll

  window.addEventListener("scroll", function() {
    if (window.scrollY > 50) {
      logo.src = scrollLogo;
    } else {
      logo.src = defaultLogo;
    }
  });
});


// JS toggle (cho footer.php) 
document.addEventListener("DOMContentLoaded", function() {
  const toggle = document.querySelector(".mobile-menu-toggle");
  const menu = document.querySelector(".navbar-mobile");
  if (toggle && menu) {
    toggle.addEventListener("click", () => menu.classList.toggle("active"));
  }
});