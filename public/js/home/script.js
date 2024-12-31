// Theme Toggle Button
document.addEventListener("DOMContentLoaded", function () {
    const themeToggle = document.getElementById("theme-toggle");
    const currentTheme = localStorage.getItem("theme") || "light";
    document.documentElement.setAttribute("data-theme", currentTheme);
    themeToggle.checked = currentTheme === "dark";

    themeToggle.addEventListener("change", function () {
        const theme = themeToggle.checked ? "dark" : "light";
        document.documentElement.setAttribute("data-theme", theme);
        localStorage.setItem("theme", theme);
    });
});

// Auto close alert
function autoCloseAlert() {
    setTimeout(function () {
        var alert = document.querySelector(".alert");
        if (alert) {
            alert.style.display = "none";
        }
    }, 5000); // Auto-close after 5 seconds
}

document.addEventListener("DOMContentLoaded", autoCloseAlert);
