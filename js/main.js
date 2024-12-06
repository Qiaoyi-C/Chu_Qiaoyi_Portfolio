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

// Scroll
gsap.registerPlugin(ScrollTrigger);
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

// === Left & Right Card Slide-in ===
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

// 圖片動畫
gsap.fromTo(
    ".contact-img",
    { y: 100, opacity: 0 }, // 從下方 (100px) 開始
    {
      y: 0, // 最後回到原位置
      opacity: 1, // 逐漸顯示
      duration: 1, // 動畫持續時間
      ease: "power2.out", // 使用平滑的動畫效果
      scrollTrigger: {
        trigger: ".contact-img", // 觸發點是 .contact-img
        start: "top 80%", // 當元素到達視窗 80% 高度時觸發
      },
    }
  );  
  
  // 文字動畫
  gsap.fromTo(
    ".contact-text",
    { y: 50, opacity: 0 },
    {
      y: 0,
      opacity: 1,
      duration: 1,
      ease: "power2.out",
      delay: 0.3, // 延遲讓文字比圖片晚進場
      scrollTrigger: {
        trigger: ".contact-text",
        start: "top 80%",
      },
    }
  );
  
  // 按鈕動畫
  gsap.fromTo(
    ".button-link",
    { scale: 0.8, opacity: 0 },
    {
      scale: 1,
      opacity: 1,
      duration: 0.8,
      ease: "bounce.out",
      delay: 0.6, // 再次延遲，最後進場
      scrollTrigger: {
        trigger: ".button-link",
        start: "top 80%",
      },
    }
  );
  

  // 確保 GSAP 和 ScrollTrigger 加載完成
gsap.registerPlugin(ScrollTrigger);

gsap.from(".about-photo", {
    scrollTrigger: {
        trigger: ".about-container", // 觸發動畫的容器
        start: "top 80%", // 當容器到達 viewport 的 80% 高度時觸發
        end: "top 50%", // 可以設定動畫範圍
        scrub: true, // 讓動畫隨滾動
    },
    x: "-100%", // 從左邊滑入
    opacity: 0, // 初始透明
    duration: 1, // 動畫持續 1 秒
});

gsap.from(".about-intro", {
    scrollTrigger: {
        trigger: ".about-container",
        start: "top 80%",
        end: "top 50%",
        scrub: true,
    },
    x: "100%", // 從右邊滑入
    opacity: 0,
    duration: 1,
});

(()=> {
  // Select elements here
  const playerCon = document.querySelector('#player-container');
  const player = document.querySelector('video');
  const videoControls = document.querySelector('#video-controls');
  const playButton = document.querySelector('#play-button');
  const pauseButton = document.querySelector('#pause-button');
  const stopButton = document.querySelector('#stop-button');
  const volumeSlider = document.querySelector("#change-vol");
  const fullScreen = document.querySelector("#full-screen");
  
  // if JS is loaded then, remove default video controls and show custom controls
  player.controls = false;
  videoControls.classList.remove('hidden');
  
  
  // Basic Video controls, similar to what we have done with audio
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
  
  // toggleFullScreen toggles the full screen state of the video
  // If the browser is currently in fullscreen mode,
  // then it should exit and vice versa.
  function toggleFullScreen() {
      if (document.fullscreenElement) {
        document.exitFullscreen();
      } else if (document.webkitFullscreenElement) {
        // Need this to support Safari
        document.webkitExitFullscreen();
      } else if (playerCon.webkitRequestFullscreen) {
        // Need this to support Safari
          playerCon.webkitRequestFullscreen();
      } else {
          playerCon.requestFullscreen();
      }
  }
  
  // hideControls hides the video controls when not in use
  // if the video is paused, the controls must remain visible
  function hideControls() {
      if (player.paused) {
        return;
      } 
      videoControls.classList.add('hide');
    }
    
    // showControls displays the video controls
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
  
  console. log(playerCon);
  
  })();
  
  // Constant
  document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById('successModal');
    const closeBtn = document.querySelector('.close');

    // Show modal
    function showModal() {
        modal.style.display = 'block';
    }

    // Hide modal
    closeBtn.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Close modal when clicking outside
    window.addEventListener('click', (event) => {
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    });

    // Call this function on form submit success
    if (window.location.search.includes('success=true')) {
        showModal();
    }
});