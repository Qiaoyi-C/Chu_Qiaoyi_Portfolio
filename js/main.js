function toggleMenu() {
    var sidebarMenu = document.getElementById('sidebar-menu');
    sidebarMenu.classList.toggle('active'); 
}


document.getElementById("sidebar-menu").addEventListener("click", toggleMenu);

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

