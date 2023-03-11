
const profileBtn = document.getElementById("profile-btn");
const popupMenu = document.getElementById("popup-menu")
let toggler = false;

profileBtn.addEventListener('click', () => {
    if (toggler) {
        popupMenu.style.display = "none";
        toggler = false

    } else {
        popupMenu.style.display = "flex";
        toggler = true
    }
});
