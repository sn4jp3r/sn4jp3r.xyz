! function() {
    var t, e = document.getElementById("darkSwitch");
    if (e) {
        t = null !== localStorage.getItem("darkSwitch") && "dark" === localStorage.getItem("darkSwitch"), (e.checked = t) ? document.documentElement.setAttribute("data-theme", "dark") : document.documentElement.removeAttribute("data-theme"), e.addEventListener("change", function(t) {
            e.checked ? (document.documentElement.setAttribute("data-theme", "dark"), localStorage.setItem("darkSwitch", "dark")) : (document.documentElement.removeAttribute("data-theme"), localStorage.removeItem("darkSwitch"))
        })
    }
}();