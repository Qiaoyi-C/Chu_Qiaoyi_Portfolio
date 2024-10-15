function toggleMenu() {
    var sidebarMenu = document.getElementById('sidebar-menu');
    sidebarMenu.classList.toggle('active'); 
}


document.getElementById("sidebar-menu").addEventListener("click", toggleMenu);