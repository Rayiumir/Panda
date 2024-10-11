// Copy URL

console.clear()
function copyFunc(elemId) {
    let that = document.querySelector(elemId);
    navigator.clipboard.writeText(that?.innerText).then(res => {
        console.log("Copeid to clipboard: " + that.innerText);

        that.classList.add("copied")
        setTimeout(() => that.classList.remove("copied"), 2000)
    });
}

// Dark Mode

var darkSwitch = document.getElementById("darkSwitch");
window.addEventListener("load", function () {
    if (darkSwitch) {
        initTheme();
        darkSwitch.addEventListener("change", function () {
            resetTheme();
        });
    }
});

function initTheme() {
    var darkThemeSelected =
        localStorage.getItem("darkSwitch") !== null &&
        localStorage.getItem("darkSwitch") === "dark";
    darkSwitch.checked = darkThemeSelected;
    darkThemeSelected
        ? document.body.setAttribute("data-theme", "dark")
        : document.body.removeAttribute("data-theme");
}

function resetTheme() {
    if (darkSwitch.checked) {
        document.body.setAttribute("data-theme", "dark");
        localStorage.setItem("darkSwitch", "dark");
    } else {
        document.body.removeAttribute("data-theme");
        localStorage.removeItem("darkSwitch");
    }
}