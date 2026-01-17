document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("darkToggle");

    if (!toggle) {
        alert("Tombol dark mode ga ketemu");
        return;
    }

    if (localStorage.getItem("mode") === "dark") {
        document.body.classList.add("dark");
        toggle.textContent = "☀️";
    }

    toggle.addEventListener("click", function () {
        document.body.classList.toggle("dark");

        if (document.body.classList.contains("dark")) {
            localStorage.setItem("mode", "dark");
            toggle.textContent = "☀️";
        } else {
            localStorage.setItem("mode", "light");
            toggle.textContent = "🌙";
        }
    });
});
