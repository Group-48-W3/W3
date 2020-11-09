function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
  }

  function expandContractMenu() {
    var x = document.getElementById("contracts-menu");
    if(window.innerWidth>600) {
        if (x.style.display === "none") {
            x.style.display = "flex";
            document.getElementById("contract-drop").style.transform = "rotate(180deg)";
        } else {
            x.style.display = "none";
            document.getElementById("contract-drop").style.transform = "rotate(0deg)";
        }
    }else{
        if (x.style.display === "none") {
            //scroll up menu
        } else {
            //scroll down menu
        }
    }
}
function expandAdminMenu() {
    var x = document.getElementById("admin-menu");
    if(window.innerWidth>600) {
        if (x.style.display === "none") {
            x.style.display = "flex";
            document.getElementById("admin-drop").style.transform = "rotate(180deg)";
        } else {
            x.style.display = "none";
            document.getElementById("admin-drop").style.transform = "rotate(0deg)";
        }
    }else{
        if (x.style.display === "none") {
            //scroll up menu
        } else {
            //scroll down menu
        }
    }
}