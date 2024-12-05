function toggleMenu() {
    var sidebarMenu = document.getElementById('sidebar-menu');
    sidebarMenu.classList.toggle('active'); 
}


<<<<<<< Updated upstream
document.getElementById("sidebar-menu").addEventListener("click", toggleMenu);
=======
// video
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
  
  
>>>>>>> Stashed changes
