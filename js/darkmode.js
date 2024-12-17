// Dark Mode

var darkSwitch = document.getElementById("darkSwitch");
var themeLogo = document.getElementById("themeLogo");

var logoLight = themeLogoData.logoLight;
var logoDark = themeLogoData.logoDark;

window.addEventListener("load", function () {
    if (darkSwitch) {
        initTheme();
        darkSwitch.addEventListener("change", function () {
            resetTheme();
        });
    }
});

function initTheme() {
    var darkThemeSelected = localStorage.getItem("darkSwitch") === "dark";
    darkSwitch.checked = darkThemeSelected;

    if (darkThemeSelected) {
        document.body.setAttribute("data-theme", "dark");
        themeLogo.src = logoDark; 
    } else {
        document.body.removeAttribute("data-theme");
        themeLogo.src = logoLight; 
    }
}

function resetTheme() {
    if (darkSwitch.checked) {
        document.body.setAttribute("data-theme", "dark");
        localStorage.setItem("darkSwitch", "dark");
        themeLogo.src = logoDark;
    } else {
        document.body.removeAttribute("data-theme");
        localStorage.removeItem("darkSwitch");
        themeLogo.src = logoLight;
    }
}