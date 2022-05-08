function slideOut() {

    var x = document.getElementById("slideOutUser");
    var y = document.getElementById("slideOutGlobal");

    var a = document.getElementById("slideIn");
    var b = document.getElementById("slideOut");

    if (x.style.right === "-600px") {
        x.style.right = "0px";
        y.style.right = "-600px";
        a.style.display = "block";
        b.style.display = "none";
        x.style.transition = "300ms ease-in";
        y.style.transition = "300ms ease-out";
    } else {
        y.style.right = "0px";
        x.style.right = "-600px";
        a.style.display = "block";
        b.style.display = "none";
        y.style.transition = "300ms ease-in";
        x.style.transition = "300ms ease-out";
    }

}

function slideIn() {

    var x = document.getElementById("slideOutUser");
    var y = document.getElementById("slideOutGlobal");

    var a = document.getElementById("slideIn");
    var b = document.getElementById("slideOut");

    x.style.right = "-600px";
    y.style.right = "-600px";
    a.style.display = "none";
    b.style.display = "block";
    x.style.transition = "300ms ease-out";
    y.style.transition = "300ms ease-out";

}

function slideOutUser() {

    var x = document.getElementById("slideOutUser");
    var y = document.getElementById("slideOutGlobal");

    y.style.right = "-600px";
    x.style.right = "0px";
    y.style.transition = "300ms ease-out";
    x.style.transition = "300ms ease-in";

}

function slideOutGlobal() {

    var x = document.getElementById("slideOutUser");
    var y = document.getElementById("slideOutGlobal");

    x.style.right = "-600px";
    y.style.right = "0px";
    x.style.transition = "300ms ease-out";
    y.style.transition = "300ms ease-in";

}