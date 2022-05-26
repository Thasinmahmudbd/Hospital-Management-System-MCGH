function toggleSubLinkContainer() {
    var element1 = document.getElementById("subLinkContainer");
    var element2 = document.getElementById("subLinkContainer2");
    var element3 = document.getElementById("subLinkContainer3");

    if(element1.classList.contains("disNone")){
        element1.classList.remove("disNone");
        element2.classList.add("disNone");
        element3.classList.add("disNone");
        element1.style.transition = "300ms ease-out";
        element2.style.transition = "300ms ease-out";
        element3.style.transition = "300ms ease-out";
    }else{
        element1.classList.add("disNone");
        element1.style.transition = "300ms ease-in";
        element2.style.transition = "300ms ease-in";
        element3.style.transition = "300ms ease-in";
    }
} 

function toggleSubLinkContainer2() {
    var element1 = document.getElementById("subLinkContainer");
    var element2 = document.getElementById("subLinkContainer2");
    var element3 = document.getElementById("subLinkContainer3");

    if(element2.classList.contains("disNone")){
        element2.classList.remove("disNone");
        element1.classList.add("disNone");
        element3.classList.add("disNone");
        element2.style.transition = "300ms ease-out";
        element1.style.transition = "300ms ease-out";
        element3.style.transition = "300ms ease-out";
    }else{
        element2.classList.add("disNone");
        element2.style.transition = "300ms ease-in";
        element1.style.transition = "300ms ease-in";
        element3.style.transition = "300ms ease-in";
    }
} 

function toggleSubLinkContainer3() {
    var element1 = document.getElementById("subLinkContainer");
    var element2 = document.getElementById("subLinkContainer2");
    var element3 = document.getElementById("subLinkContainer3");

    if(element3.classList.contains("disNone")){
        element3.classList.remove("disNone");
        element2.classList.add("disNone");
        element1.classList.add("disNone");
        element3.style.transition = "300ms ease-out";
        element2.style.transition = "300ms ease-out";
        element1.style.transition = "300ms ease-out";
    }else{
        element3.classList.add("disNone");
        element3.style.transition = "300ms ease-in";
        element2.style.transition = "300ms ease-in";
        element1.style.transition = "300ms ease-in";
    }
} 