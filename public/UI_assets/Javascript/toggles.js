function toggleSubLinkContainer() {
    var element = document.getElementById("subLinkContainer");

    if(element.classList.contains("disNone")){
        element.classList.remove("disNone");
        element.style.transition = "300ms ease-out";
    }else{
        element.classList.add("disNone");
        element.style.transition = "300ms ease-in";
    }
} 