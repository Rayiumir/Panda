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