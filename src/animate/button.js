function hamburger() {
    var x = document.getElementById("nav-link");
    if (x.style.display === "block") {
      x.style.display = "none";
    } else {
      x.style.display = "block";
    }
  }
  var i = 0;
  function showadd() {
      if (i == 0) {
          document.getElementById("input-area-add").style.display = "flex";
          i = 1;
      } else if (i == 1) {
          document.getElementById("input-area-add").style.display = "none";
          i = 0;
      }
  }
  function showdel() {
      document.getElementById("input-area-del").style.display = "none";
  }