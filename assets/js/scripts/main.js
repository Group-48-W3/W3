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
function expandReportMenu() {
    var x = document.getElementById("reports-menu");
    if(window.innerWidth>600) {
        if (x.style.display === "none") {
            x.style.display = "flex";
            document.getElementById("report-drop").style.transform = "rotate(180deg)";
        } else {
            x.style.display = "none";
            document.getElementById("report-drop").style.transform = "rotate(0deg)";
        }
    }else{
        if (x.style.display === "none") {
            //scroll up menu
        } else {
            //scroll down menu
        }
    }
}
