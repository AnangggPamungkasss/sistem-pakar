document.addEventListener("DOMContentLoaded", function() {
    const toggleBtn = document.getElementById("toggleSidebar");
    const sidebar = document.querySelector(".sidebar");

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener("click", function() {
            sidebar.classList.toggle("sidebar-collapsed");
        });
    }
});
