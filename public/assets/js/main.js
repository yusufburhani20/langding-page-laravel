// TJKT SMK Fadris - Public Page JavaScript

document.addEventListener('DOMContentLoaded', () => {

  // ===== NAVBAR SCROLL =====
  const navbar = document.getElementById('navbar');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  }, { passive: true });

  // ===== MOBILE MENU =====
  const toggle = document.getElementById('navbarToggle');
  const mobileMenu = document.getElementById('mobileMenu');
  toggle?.addEventListener('click', () => {
    const isOpen = mobileMenu.classList.toggle('open');
    toggle.setAttribute('aria-expanded', isOpen);
  });

  // Close mobile menu on link click
  mobileMenu?.querySelectorAll('a').forEach(link => {
    link.addEventListener('click', () => {
      mobileMenu.classList.remove('open');
      toggle?.setAttribute('aria-expanded', 'false');
    });
  });

  // ===== INTERSECTION OBSERVER for animations =====
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        const delay = entry.target.style.animationDelay || '0s';
        setTimeout(() => {
          entry.target.classList.add('visible');
        }, parseFloat(delay) * 1000);
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('.animate-on-scroll').forEach(el => {
    observer.observe(el);
  });

  // ===== SMOOTH SCROLL for anchor links =====
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', (e) => {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (target) {
        e.preventDefault();
        const offset = 80;
        const top = target.getBoundingClientRect().top + window.scrollY - offset;
        window.scrollTo({ top, behavior: 'smooth' });
      }
    });
  });

  // ===== ACTIVE NAV LINK on scroll =====
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.navbar-nav a');

  window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(section => {
      const sectionTop = section.offsetTop - 100;
      if (window.scrollY >= sectionTop) {
        current = section.getAttribute('id');
      }
    });

    navLinks.forEach(link => {
      link.style.color = '';
      link.style.background = '';
      if (link.getAttribute('href') === `#${current}`) {
        link.style.color = 'var(--primary)';
        link.style.background = 'rgba(14, 165, 233, 0.1)';
      }
    });
  }, { passive: true });

  // ===== COUNTER ANIMATION =====
  const counters = document.querySelectorAll('.stat-number');
  const counterObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        const el = entry.target;
        const text = el.textContent;
        const num = parseFloat(text.replace(/[^0-9.]/g, ''));
        const suffix = text.replace(/[0-9.]/g, '');
        if (num && !isNaN(num)) {
          let start = 0;
          const duration = 1500;
          const step = (timestamp) => {
            if (!start) start = timestamp;
            const progress = Math.min((timestamp - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            el.textContent = (num === Math.floor(num)
              ? Math.floor(eased * num)
              : (eased * num).toFixed(1)) + suffix;
            if (progress < 1) requestAnimationFrame(step);
          };
          requestAnimationFrame(step);
        }
        counterObserver.unobserve(el);
      }
    });
  }, { threshold: 0.5 });

  counters.forEach(counter => counterObserver.observe(counter));

});
