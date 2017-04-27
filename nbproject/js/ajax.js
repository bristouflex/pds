function ajaxOk() {
    if (window.XMLHttpRequest)
        return new XMLHttpRequest();
    return new ActiveXObject("Microsoft.XMLHTTP");
}

function sendMessages() {
    var request = ajaxOk();
    var message = document.getElementsByName("message")[0].value;
    var id = document.getElementsByName("id")[0].value;
    var div = document.getElementById("liste_messages");

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "addMessage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("message=" + message + "&id=" + id);
}

function noTreat() {
    var request = ajaxOk();
    var div = document.getElementById("content");

    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "displayNoTreated.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function stationnement() {
    var request = ajaxOk();
    var div = document.getElementById("options_stationnement");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_stationnement.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}


function atterissage() {
    var request = ajaxOk();
    var div = document.getElementById("options_atterissage");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_atterissage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function nettoyage() {
    var request = ajaxOk();
    var div = document.getElementById("options_nettoyage");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_nettoyage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function avitaillement() {
    var request = ajaxOk();
    var div = document.getElementById("options_avitaillement");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_avitaillement.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function checker_stationnement() {

    var request = ajaxOk();
    var data = document.getElementsByName("abris");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            var abris = data[i].value;
        }
    }

    var surface = document.getElementsByName("S")[0].value;
    var debut = document.getElementsByName("debut_stationnement")[0].value;
    var fin = document.getElementsByName("fin")[0].value;
    var data2 = document.getElementsByName("cat");
    div = document.getElementById("options_stationnement");

    for (i = 0; i < data2.length; i++) {
        if (data2[i].checked == true) {
            var categorie = data2[i].value;
        }
    }
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }

    request.open("POST", "validate_stationnement.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("abris=" + abris + "&surface=" + surface + "&debut=" + debut + "&fin=" + fin + "&categorie=" + categorie);
}




function checker_avitaillement() {

    var request = ajaxOk();
    var data = document.getElementsByName("essence");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked == true) {
            var essence = data[i].value;
        }
    }

    var debut = document.getElementsByName("debut_avitaillement")[0].value;
    div = document.getElementById("options_avitaillement");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "validate_avitaillement.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("essence=" + essence + "&debut=" + debut);

}




function checker_nettoyage() {

    var request = ajaxOk();
    var data = document.getElementsByName("produit");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            var produit = data[i].value;
        }
    }

    var debut = document.getElementsByName("debut_nettoyage")[0].value;
    div = document.getElementById("options_nettoyage");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }

    request.open("POST", "validate_nettoyage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("produit=" + produit + "&debut=" + debut);

}



function checker_atterissage() {
    var request = ajaxOk();
    var data = document.getElementsByName("vroomvroom");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked == true) {
            var avion = data[i].value;
        }
    }
    var debut = document.getElementsByName("debut_atterissage")[0].value;
    var data2 = document.getElementsByName("categorie");
    for (i = 0; i < data2.length; i++) {
        if (data2[i].checked == true) {
            var categorie = data2[i].value;

        }
    }

    div = document.getElementById("options_atterissage");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "validate_atterissage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("avion=" + avion + "&categorie=" + categorie + "&debut=" + debut);
}

function t1() {
    var i = document.getElementById("options_stationnement");
    if (i.innerHTML == " " || i.innerHTML == "") {
        stationnement();
    } else {
        i.innerHTML = " ";
    }
}

function t2() {
    var i = document.getElementById("options_atterissage");
    if (i.innerHTML == " " || i.innerHTML == "") {
        atterissage();
    } else {
        i.innerHTML = " ";
    }
}

function t3() {
    var i = document.getElementById("options_avitaillement");
    if (i.innerHTML == " " || i.innerHTML == "") {
        avitaillement();
    } else {
        i.innerHTML = " ";
    }
}

function t4() {
    var i = document.getElementById("options_nettoyage");
    if (i.innerHTML == " " || i.innerHTML == "") {
        nettoyage();
    } else {
        i.innerHTML = " ";
    }
}

function t5() {
    var i = document.getElementById("panier");
    if (i.innerHTML == " " || i.innerHTML == "") {
        panier();
    } else {
        i.innerHTML = " ";
    }
}

function panier() {
    var request = ajaxOk();
    var div = document.getElementById("panier");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "panier.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function t6() {
    var i = document.getElementById("options_parachute");
    if (i.innerHTML == " " || i.innerHTML == "") {
        parachute();
    } else {
        i.innerHTML = " ";
    }
}

function t7() {
    var i = document.getElementById("options_bapteme");
    if (i.innerHTML == " " || i.innerHTML == "") {
        bapteme();
    } else {
        i.innerHTML = " ";
    }
}

function t8() {
    var i = document.getElementById("options_location_ulm");
    if (i.innerHTML == " " || i.innerHTML == "") {
        locationulm();
    } else {
        i.innerHTML = " ";
    }
}

function t9() {
    var i = document.getElementById("options_lecon");
    if (i.innerHTML == " " || i.innerHTML == "") {
        lecon();
    } else {
        i.innerHTML = " ";
    }
}

function parachute() {
    var request = ajaxOk();
    var div = document.getElementById("options_parachute");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_parachute.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function bapteme() {
    var request = ajaxOk();
    var div = document.getElementById("options_bapteme");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_bapteme.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function locationulm() {
    var request = ajaxOk();
    var div = document.getElementById("options_location_ulm");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_location_ulm.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function lecon() {
    var request = ajaxOk();
    var div = document.getElementById("options_lecon");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_lecon.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function checker_parachute() {

    var request = ajaxOk();
    var data = document.getElementsByName("parachute");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            var parachute = data[i].value;
        }
    }

    var debut = document.getElementsByName("debut_parachute")[0].value;
    div = document.getElementById("options_parachute");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }

    request.open("POST", "validate_parachute.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("parachute=" + parachute + "&debut=" + debut);

}

function checker_bapteme() {

    var request = ajaxOk();

    var data = document.getElementsByName("bapteme");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            var bapteme = data[i].value;
        }
    }

    var data2 = document.getElementsByName("instructeur");
    for (i = 0; i < data2.length; i++) {
        if (data2[i].checked === true) {
            var instructeur = data2[i].value;
        }
    }

    var debut = document.getElementsByName("debut_bapteme")[0].value;
    div = document.getElementById("options_bapteme");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }

    request.open("POST", "validate_bapteme.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("bapteme=" + bapteme + "&instructeur=" + instructeur + "&debut=" + debut);

}

function checker_lecon() {

    var request = ajaxOk();
    var data = document.getElementsByName("lecon");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            var lecon = data[i].value;
        }
    }

    var data2 = document.getElementsByName("instructeur");
    for (var i = 0; i < data2.length; i++) {
        if (data2[i].checked === true) {
            var instructeur = data2[i].value;
        }
    }

    var debut = document.getElementsByName("debut_lecon")[0].value;
    div = document.getElementById("options_lecon");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }

    request.open("POST", "validate_lecon.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("lecon=" + lecon + "&instructeur=" + instructeur + "&debut=" + debut);

}

function checker_location_ulm() {

    var request = ajaxOk();
    var data = document.getElementsByName("location_ulm");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            var location_ulm = data[i].value;
        }
    }

    var debut = document.getElementsByName("debut_location_ulm")[0].value;
    div = document.getElementById("options_location_ulm");
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }

    request.open("POST", "validate_location_ulm.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("location_ulm=" + location_ulm + "&debut=" + debut);

}