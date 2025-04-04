// Toggle Sidebar Menu
document.addEventListener('DOMContentLoaded', () => {
  const menuIcon = document.querySelector('#menu'); 
  const sidebarMenu = document.querySelector('#sidebar-menu'); 
  const closeMenu = document.querySelector('#close-menu'); 

  menuIcon.addEventListener('click', () => {
    sidebarMenu.classList.add('active');
  });

  closeMenu.addEventListener('click', () => {
    sidebarMenu.classList.remove('active');
  });
});

// GSAP Scroll Animations
gsap.registerPlugin(ScrollTrigger);

// Card Animations
document.querySelectorAll(".card").forEach((card, index) => {
  gsap.fromTo(
    card,
    { opacity: 0, y: -50 },
    {
      opacity: 1,
      y: 0,
      duration: 0.8,
      delay: index * 0.4,
      ease: "power3.out",
      scrollTrigger: {
        trigger: card,
        start: "top 80%",
        end: "top 30%",
        toggleActions: "play none none none",
      },
    }
  );
});

// Hero Section Text Animation
gsap.fromTo(
  ".hero-h1, .hero-p", 
  { opacity: 0, y: 50 }, 
  {
    opacity: 1,
    y: 0,
    duration: 1,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".hero-bk",
      start: "top 80%",
    },
  }
);

// Social Icons Animation
gsap.fromTo(
  ".social-links a",
  { opacity: 0, y: 30 },
  {
    opacity: 1,
    y: 0,
    duration: 1,
    stagger: 0.2,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".social-links",
      start: "top 90%",
    },
  }
);

gsap.from(".study-h2", {
  opacity: 0,
  scale: 0.5,
  color: "#fd6f00", // 初始顏色為粉紅色
  duration: 1.5,
  ease: "bounce.out",
  yoyo: true, // 往返動畫
  delay: 0.5, // 動畫延遲開始
});

gsap.from(".project-images", {
  scrollTrigger: {
    trigger: ".project-images",
    start: "top 85%",
    toggleActions: "play none none none"
  },
  opacity: 0,
  x: 80,
  duration: 1.2,
  ease: "power3.out"
});

gsap.from(".description", {
  opacity: 0,
  y: 60,
  duration: 1.2,
  ease: "bounce.out",
  scrollTrigger: {
      trigger: ".description",
      start: "top 85%",
      toggleActions: "play none none none"
  }
});

gsap.from(".problem", {
  opacity: 0,
  y: 50,
  duration: 1,
  ease: "bounce.out",
  scrollTrigger: {
      trigger: ".problem",
      start: "top 80%",
      toggleActions: "play none none none"
  }
});

gsap.from(".solution", {
  opacity: 0,
  y: 50,
  duration: 1,
  ease: "power2.out",
  scrollTrigger: {
      trigger: ".solution",
      start: "top 80%",
      toggleActions: "play none none none"
  }
});

gsap.from(".created-date", {
  opacity: 0,
  x: -100,
  duration: 1,
  ease: "power3.out",
  scrollTrigger: {
      trigger: ".created-date",
      start: "top 80%",
      toggleActions: "play none none none"
  }
});

gsap.from(".categories", {
  opacity: 0,
  x: -100,
  duration: 1,
  ease: "power3.out",
  scrollTrigger: {
      trigger: ".categories",
      start: "top 80%",
      toggleActions: "play none none none"
  }
});


// Left & Right Card Slide-in Animations
const leftCard = document.querySelector(".about-contact, .contact-img");
const rightCard = document.querySelector(".video, .contact-text");

gsap.fromTo(
  leftCard,
  { x: -100, opacity: 0 },
  {
    x: 0,
    opacity: 1,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: leftCard,
      start: "top 80%",
    },
  }
);

gsap.fromTo(
  rightCard,
  { x: 100, opacity: 0 },
  {
    x: 0,
    opacity: 1,
    duration: 1,
    ease: "power2.out",
    delay: 0.7,
    scrollTrigger: {
      trigger: rightCard,
      start: "top 80%",
    },
  }
);

// Image Animation
gsap.fromTo(
  ".contact-img",
  { y: 100, opacity: 0 },
  {
    y: 0,
    opacity: 1,
    duration: 1,
    ease: "power2.out",
    scrollTrigger: {
      trigger: ".contact-img",
      start: "top 80%",
    },
  }
);

// Text Animation
gsap.fromTo(
  ".contact-text",
  { y: 50, opacity: 0 },
  {
    y: 0,
    opacity: 1,
    duration: 1,
    ease: "power2.out",
    delay: 0.3,
    scrollTrigger: {
      trigger: ".contact-text",
      start: "top 80%",
    },
  }
);

// Button Animation
gsap.fromTo(
  ".button-link",
  { scale: 0.8, opacity: 0 },
  {
    scale: 1,
    opacity: 1,
    duration: 0.8,
    ease: "bounce.out",
    delay: 0.6,
    scrollTrigger: {
      trigger: ".button-link",
      start: "top 80%",
    },
  }
);

// GSAP Hero Image Animation
gsap.fromTo(
  ".hero-image", 
  { scale: 0.5, opacity: 0 },
  {
    scale: 1,
    opacity: 1,
    duration: 0.5,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".hero-bk",
      start: "top 80%",
    },
  }
);

// About Section Slide-in Animation
gsap.from(".about, .about-photo", {
  x: -100,
  opacity: 0,
  duration: 1,
  ease: "power2.out",
  scrollTrigger: {
    trigger: ".about",
    start: "top 80%",
  }
});

// Experience Section Slide-in Animation
gsap.from(".experience", {
  x: 100,
  opacity: 0,
  duration: 1,
  ease: "power2.out",
  scrollTrigger: {
    trigger: ".experience",
    start: "top 80%",
  }
});

// Skills Section Slide-in Animation
gsap.from(".skills", {
  y: -100,
  opacity: 0,
  duration: 1,
  ease: "power2.out",
  scrollTrigger: {
    trigger: ".skills",
    start: "top 80%",
  }

  
});

gsap.from('.about-intro', {
  x: 100,
  opacity: 0,
  duration: 1,
  ease: "power2.out",
  scrollTrigger: {
    trigger: ".about-intro",
    start: "top 80%",
  }
});

gsap.from('.skill-item', {
  opacity: 0,
  y: 100,
  duration: 1,
  stagger: 0.2,
  scrollTrigger: {
      trigger: '.skill-item',
      start: 'top 80%',
      end: 'bottom top',
      scrub: true,
      markers: false,
  }
});

// 動畫 - skills-tools
gsap.from('.skills2', {
  opacity: 0,
  x: -300,  // 從左邊進入
  scale: 0.8,
  duration: 1.2,
  ease: "power3.out", // 彈跳效果
  scrollTrigger: {
      trigger: '.skills2',
      start: 'top 80%',
      end: 'bottom top',
      scrub: true,
      markers: false,
  }
});

// 動畫 - timeline
gsap.from('.experience2', {
  opacity: 0,
  x: 300,  // 從右邊進入
  scale: 0.8,
  duration: 1.2,
  ease: "power3.out", // 彈跳效果
  scrollTrigger: {
      trigger: '.experience2',
      start: 'top 80%',
      end: 'bottom top',
      scrub: true,
      markers: false,
  }
});

gsap.from('.what', {
  opacity: 0,
  x: 100,  // 初始從右側進場
  rotation: 10,  // 輕微旋轉，讓元素看起來更有動感
  duration: 1.5,
  ease: "power3.out",  // 平滑進場效果
  scrollTrigger: {
      trigger: '.what',
      start: 'top 80%',
      end: 'bottom top',
      scrub: true,
      markers: false,
  }
});




// Video Controls
(() => {
  const playerCon = document.querySelector('#player-container');
  const player = document.querySelector('video');
  const videoControls = document.querySelector('#video-controls');
  const playButton = document.querySelector('#play-button');
  const pauseButton = document.querySelector('#pause-button');
  const stopButton = document.querySelector('#stop-button');
  const volumeSlider = document.querySelector("#change-vol");
  const fullScreen = document.querySelector("#full-screen");

  player.controls = false;
  videoControls.classList.remove('hidden');

  function playVideo() {
    player.play();
  }

  function pauseVideo() {
    player.pause();
  }

  function stopVideo() {
    player.pause();
    player.currentTime = 1;
  }

  function changeVolume() {
    player.volume = volumeSlider.value;
  }

  function toggleFullScreen() {
    if (document.fullscreenElement) {
      document.exitFullscreen();
    } else if (document.webkitFullscreenElement) {
      document.webkitExitFullscreen();
    } else if (playerCon.webkitRequestFullscreen) {
      playerCon.webkitRequestFullscreen();
    } else {
      playerCon.requestFullscreen();
    }
  }

  function hideControls() {
    if (player.paused) return;
    videoControls.classList.add('hide');
  }

  function showControls() {
    videoControls.classList.remove('hide');
  }

  playButton.addEventListener("click", playVideo);
  pauseButton.addEventListener("click", pauseVideo);
  stopButton.addEventListener("click", stopVideo);
  volumeSlider.addEventListener("change", changeVolume);
  fullScreen.addEventListener("click", toggleFullScreen);
  videoControls.addEventListener('mouseenter', showControls);
  videoControls.addEventListener('mouseleave', hideControls);
  player.addEventListener('mouseenter', showControls);
  player.addEventListener('mouseleave', hideControls);
})();

// Modal for Form Submission
document.addEventListener('DOMContentLoaded', () => {
  const contactForm = document.querySelector('#contact-form');
  const modal = document.getElementById('successModal');
  const closeBtn = document.querySelector('.close');
  const errorMessage = document.querySelector('#error-message');

  function showModal() {
    modal.style.display = 'block';
  }

  closeBtn.addEventListener('click', () => {
    modal.style.display = 'none';
  });

  window.addEventListener('click', (event) => {
    if (event.target === modal) {
      modal.style.display = 'none';
    }
  });

  contactForm.addEventListener('submit', (event) => {
    event.preventDefault(); 

    const formData = new FormData(contactForm);

    fetch('contact_process.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Server error');
      }
      return response.json();
    })
    .then(data => {
      if (data.success) {
        showModal();
        contactForm.reset(); 
        errorMessage.style.display = 'none'; 
      } else {
        errorMessage.textContent = data.error || 'Form submission failed, please try again later';
        errorMessage.style.display = 'block';
      }
    })
    .catch(error => {
      errorMessage.textContent = error.message || 'An error occurred, please try again later';
      errorMessage.style.display = 'block';
    });
  });
});

document.addEventListener("DOMContentLoaded", function () {
  gsap.registerPlugin(ScrollTrigger);

  gsap.from(".contact-in-title", {
      opacity: 0,
      y: -50,
      duration: 1,
      ease: "power2.out",
      scrollTrigger: {
          trigger: ".contact-section",
          start: "top 80%",
      }
  });

  gsap.from(".contact-form label, .contact-form input, .contact-form textarea, .form-bt", {
      opacity: 0,
      y: 30,
      duration: 0.8,
      stagger: 0.2,
      ease: "power2.out",
      scrollTrigger: {
          trigger: ".contact-form",
          start: "top 85%",
      }
  });
});
