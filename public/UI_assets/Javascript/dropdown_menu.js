function myFunction() {
    var x = document.getElementById("myLinks");
    if (x.style.top === "50px") {
      x.style.top = "-5000px";
      x.style.transition = "300ms ease-in";
    } else {
      x.style.top = "50px";
      x.style.transition = "300ms ease-in";
    }
  }