function toggleSubLinkContainer() {
    var element1 = document.getElementById("subLinkContainer");
    var element2 = document.getElementById("subLinkContainer2");
    var element3 = document.getElementById("subLinkContainer3");
    var element4 = document.getElementById("subLinkContainer4");

    if(element1.classList.contains("disNone")){
        element1.classList.remove("disNone");
        element2.classList.add("disNone");
        element3.classList.add("disNone");
        element4.classList.add("disNone");
        element1.style.transition = "300ms ease-out";
        element2.style.transition = "300ms ease-out";
        element3.style.transition = "300ms ease-out";
        element4.style.transition = "300ms ease-out";
    }else{
        element1.classList.add("disNone");
        element1.style.transition = "300ms ease-in";
        element2.style.transition = "300ms ease-in";
        element3.style.transition = "300ms ease-in";
        element4.style.transition = "300ms ease-in";
    }
} 

function toggleSubLinkContainer2() {
    var element1 = document.getElementById("subLinkContainer");
    var element2 = document.getElementById("subLinkContainer2");
    var element3 = document.getElementById("subLinkContainer3");
    var element4 = document.getElementById("subLinkContainer4");

    if(element2.classList.contains("disNone")){
        element2.classList.remove("disNone");
        element1.classList.add("disNone");
        element3.classList.add("disNone");
        element4.classList.add("disNone");
        element2.style.transition = "300ms ease-out";
        element1.style.transition = "300ms ease-out";
        element3.style.transition = "300ms ease-out";
        element4.style.transition = "300ms ease-out";
    }else{
        element2.classList.add("disNone");
        element2.style.transition = "300ms ease-in";
        element1.style.transition = "300ms ease-in";
        element3.style.transition = "300ms ease-in";
        element4.style.transition = "300ms ease-in";
    }
} 

function toggleSubLinkContainer3() {
    var element1 = document.getElementById("subLinkContainer");
    var element2 = document.getElementById("subLinkContainer2");
    var element3 = document.getElementById("subLinkContainer3");
    var element4 = document.getElementById("subLinkContainer4");

    if(element3.classList.contains("disNone")){
        element3.classList.remove("disNone");
        element2.classList.add("disNone");
        element1.classList.add("disNone");
        element4.classList.add("disNone");
        element3.style.transition = "300ms ease-out";
        element2.style.transition = "300ms ease-out";
        element1.style.transition = "300ms ease-out";
        element4.style.transition = "300ms ease-out";
    }else{
        element3.classList.add("disNone");
        element3.style.transition = "300ms ease-in";
        element2.style.transition = "300ms ease-in";
        element1.style.transition = "300ms ease-in";
        element4.style.transition = "300ms ease-in";
    }
} 

function toggleSubLinkContainer4() {
    var element1 = document.getElementById("subLinkContainer");
    var element2 = document.getElementById("subLinkContainer2");
    var element3 = document.getElementById("subLinkContainer3");
    var element4 = document.getElementById("subLinkContainer4");

    if(element4.classList.contains("disNone")){
        element4.classList.remove("disNone");
        element2.classList.add("disNone");
        element1.classList.add("disNone");
        element3.classList.add("disNone");
        element3.style.transition = "300ms ease-out";
        element2.style.transition = "300ms ease-out";
        element1.style.transition = "300ms ease-out";
        element4.style.transition = "300ms ease-out";
    }else{
        element4.classList.add("disNone");
        element3.style.transition = "300ms ease-in";
        element2.style.transition = "300ms ease-in";
        element1.style.transition = "300ms ease-in";
        element4.style.transition = "300ms ease-in";
    }
} 

function openPassChange() {
    var modal = document.getElementById("passChanger");
    var openBtn = document.getElementById("openPassChanger");
    var closeBtn = document.getElementById("closePassChanger");

    modal.style.display = "grid";
    openBtn.style.display = "none";
    closeBtn.style.display = "block";
}

function closePassChange() {
    var modal = document.getElementById("passChanger");
    var openBtn = document.getElementById("openPassChanger");
    var closeBtn = document.getElementById("closePassChanger");

    modal.style.display = "none";
    openBtn.style.display = "block";
    closeBtn.style.display = "none";
}