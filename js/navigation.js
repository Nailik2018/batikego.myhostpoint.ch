
function showMenu() {

    // Element ID austausch von Classennamen zur Darstellung auf Mobiler Ansicht
    let navbarID = "navbarText";
    let oldClassName = "collapse";
    let newClassName  = "in";

    // Element zwischenspeichern
    let navbarElement = document.getElementById(navbarID);

    if (navbarElement.classList.contains(newClassName)){
        navbarElement.classList.add(oldClassName);
        navbarElement.classList.remove(newClassName);
    }else{
        navbarElement.classList.add(newClassName);
        navbarElement.classList.remove(oldClassName);
    }
}
