"use strict";
function ajaxOk() {
    if (window.XMLHttpRequest)
        return new XMLHttpRequest();
    return new ActiveXObject("Microsoft.XMLHTTP");
}

/*function sendMessages() {
    var request = ajaxOk();
    var message = document.getElementsByName("message")[0].value;
    var id = document.getElementsByName("id")[0].value;
    var div = document.getElementById("liste_messages");

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "addMessage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("message=" + message + "&id=" + id);
}

function noTreat() {
    var request = ajaxOk();
    var div = document.getElementById("content");

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "displayNoTreated.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}*/

function stationnement() {
    var request = ajaxOk();
    var div = document.getElementById("options_stationnement");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "print_ajax/print_stationnement.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}


function atterissage() {
    var request = ajaxOk();
    var div = document.getElementById("options_atterissage");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "print_ajax/print_atterissage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function nettoyage() {
    var request = ajaxOk();
    var div = document.getElementById("options_nettoyage");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "print_ajax/print_nettoyage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function avitaillement() {
    var request = ajaxOk();
    var div = document.getElementById("options_avitaillement");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "print_ajax/print_avitaillement.php");
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
    var div;
    var surface = document.getElementsByName("S")[0].value;
    var debut = document.getElementsByName("debut_stationnement")[0].value;
    var fin = document.getElementsByName("fin")[0].value;
    var data2 = document.getElementsByName("cat");
    div = document.getElementById("options_stationnement");

    for (i = 0; i < data2.length; i++) {
        if (data2[i].checked === true) {
            var categorie = data2[i].value;
        }
    }
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    }

    request.open("POST", "ajax_validate/validate_stationnement.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("abris=" + abris + "&surface=" + surface + "&debut=" + debut + "&fin=" + fin + "&categorie=" + categorie);
}




function checker_avitaillement() {

    var request = ajaxOk();
    var essence = null;
    var div;
    var data = document.getElementsByName("essence");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            essence = data[i].value;
        }
    }

    var debut = document.getElementsByName("debut_avitaillement")[0].value;
    div = document.getElementById("options_avitaillement");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    }
    request.open("POST", "ajax_validate/validate_avitaillement.php");
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
    var div;
    var debut = document.getElementsByName("debut_nettoyage")[0].value;
    div = document.getElementById("options_nettoyage");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    }

    request.open("POST", "ajax_validate/validate_nettoyage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("produit=" + produit + "&debut=" + debut);
}



function checker_atterissage() {
    var request = ajaxOk();
    var data = document.getElementsByName("vroomvroom");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            var avion = data[i].value;
        }
    }
    var debut = document.getElementsByName("debut_atterissage")[0].value;
    var data2 = document.getElementsByName("categorie");
    for (i = 0; i < data2.length; i++) {
        if (data2[i].checked === true) {
            var categorie = data2[i].value;

        }
    }
    var div;
    div = document.getElementById("options_atterissage");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    }
    request.open("POST", "ajax_validate/validate_atterissage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("avion=" + avion + "&categorie=" + categorie + "&debut=" + debut);
}

function t1() {
    var i = document.getElementById("options_stationnement");
    if (i.innerHTML === " " || i.innerHTML === "") {
        stationnement();
    } else {
        i.innerHTML = " ";
    }
}

function t2() {
    var i = document.getElementById("options_atterissage");
    if (i.innerHTML === " " || i.innerHTML === "") {
        atterissage();
    } else {
        i.innerHTML = " ";
    }
}

function t3() {
    var i = document.getElementById("options_avitaillement");
    if (i.innerHTML === " " || i.innerHTML === "") {
        avitaillement();
    } else {
        i.innerHTML = " ";
    }
}

function t4() {
    var i = document.getElementById("options_nettoyage");
    if (i.innerHTML === " " || i.innerHTML === "") {
        nettoyage();
    } else {
        i.innerHTML = " ";
    }
}

function t5() {
    var i = document.getElementById("panier");
    if (i.innerHTML === " " || i.innerHTML === "") {
        panier();
    } else {
        i.innerHTML = " ";
    }
}

function panier() {
    var request = ajaxOk();
    var div = document.getElementById("panier");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
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
    if (i.innerHTML === " " || i.innerHTML === "") {
        parachute();
    } else {
        i.innerHTML = " ";
    }
}

function t7() {
    var i = document.getElementById("options_bapteme");
    if (i.innerHTML === " " || i.innerHTML === "") {
        bapteme();
    } else {
        i.innerHTML = " ";
    }
}

function t8() {
    var i = document.getElementById("options_location_ulm");
    if (i.innerHTML === " " || i.innerHTML === "") {
        locationulm();
    } else {
        i.innerHTML = " ";
    }
}

function t9() {
    var i;
    i = document.getElementById("options_lecon");
    if (i.innerHTML === " " || i.innerHTML === "") {
        lecon();
    } else {
        i.innerHTML = " ";
    }
}

function parachute() {
    var request = ajaxOk();
    var div = document.getElementById("options_parachute");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_parachute.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function bapteme() {
    var request = ajaxOk();
    var div = document.getElementById("options_bapteme");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_bapteme.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function locationulm() {
    var request = ajaxOk();
    var div = document.getElementById("options_location_ulm");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_location_ulm.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function lecon() {
    var request = ajaxOk();
    var div = document.getElementById("options_lecon");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_lecon.php");
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
    var div;
    var debut = document.getElementsByName("debut_parachute")[0].value;
    div = document.getElementById("options_parachute");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    }

    request.open("POST", "ajax_validate/validate_parachute.php");
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
    var div;
    var debut = document.getElementsByName("debut_bapteme")[0].value;
    div = document.getElementById("options_bapteme");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    }

    request.open("POST", "ajax_validate/validate_bapteme.php");
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
    var div;
    var debut = document.getElementsByName("debut_lecon")[0].value;
    div = document.getElementById("options_lecon");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    }

    request.open("POST", "ajax_validate/validate_lecon.php");
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
    var div;
    var debut = document.getElementsByName("debut_location_ulm")[0].value;
    div = document.getElementById("options_location_ulm");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    }

    request.open("POST", "ajax_validate/validate_location_ulm.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("location_ulm=" + location_ulm + "&debut=" + debut);
}

function t_all(){
    var i = document.getElementById("content");
    if (i.innerHTML === " " || i.innerHTML === "") {
        allbill();
    } else {
        i.innerHTML = " ";
    }
}

function t_paid() {
    var i = document.getElementById("content");
    if (i.innerHTML === " " || i.innerHTML === "") {
        paidbills();
    } else {
        i.innerHTML = " ";
    }
}

function t_notpaid() {
    var i = document.getElementById("content");
    if (i.innerHTML === " " || i.innerHTML === "") {
        unpaidbills();
    } else {
        i.innerHTML = " ";
    }
}

function allbill() {
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_allbill.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function paidbills() {
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_paidbill.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function unpaidbills() {
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_unpaidbill.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function tb_abris() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_abris();
    } else {
        i.innerHTML = " ";
    }
}

function tb_avion() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_avion();
    } else {
        i.innerHTML = " ";
    }
}

function tb_categorie() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_categorie();
    } else {
        i.innerHTML = " ";
    }
}

function tb_grpacoustique() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_grpacoustique();
    } else {
        i.innerHTML = " ";
    }
}

function tb_produit() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_produit();
    } else {
        i.innerHTML = " ";
    }
}

function tb_redevances() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_redevances();
    } else {
        i.innerHTML = " ";
    }
}

function back_abris() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_abris.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_avion() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_avion.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_categorie() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_categorie.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_grpacoustique() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_grpacoustique.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_produit() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_produit.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_redevances() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_redevances.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function tb_Bapteme() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_Bapteme();
    } else {
        i.innerHTML = " ";
    }
}

function tb_Cotisation() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_Cotisation();
    } else {
        i.innerHTML = " ";
    }
}

function tb_Lecon() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_Lecon();
    } else {
        i.innerHTML = " ";
    }
}

function tb_LocationULM() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_LocationULM();
    } else {
        i.innerHTML = " ";
    }
}

function tb_Parachute() {
    var i = document.getElementById("options_b");
    if (i.innerHTML === " " || i.innerHTML === "") {
        back_Parachute();
    } else {
        i.innerHTML = " ";
    }
}

function back_Bapteme() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_Bapteme.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_Cotisation() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_Cotisation.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_Lecon() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_Lecon.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_LocationULM() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_LocationULM.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function back_Parachute() {
    var request = ajaxOk();
    var div = document.getElementById("options_b");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_back_Parachute.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function cotisation() {
    var request = ajaxOk();
    var div = document.getElementById("options_cotisation");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    }
    request.open("POST", "print_ajax/print_cotisation.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send();
}

function t10() {
    var i = document.getElementById("options_cotisation");
    if (i.innerHTML === " " || i.innerHTML === "") {
        cotisation();
    } else {
        i.innerHTML = " ";
    }
}

function checker_cotisation() {

    var request = ajaxOk();
    var data = document.getElementsByName("cotisation");
    for (var i = 0; i < data.length; i++) {
        if (data[i].checked === true) {
            var cotisation = data[i].value;
        }
    }

    var data2 = document.getElementsByName("license");
    for (var i = 0; i < data2.length; i++) {
        //console.log(data2[0].value);
        if (data2[i].checked === true) {
            var license = data2[i].value;
        }
    }
    var div;
    div = document.getElementById("options_cotisation");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
            updateBracket();
        }
    };

    request.open("POST", "ajax_validate/validate_cotisation.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("cotisation=" + cotisation + "&license=" + license);
}

function cancelLesson(id,user,facture) {
    var request = ajaxOk();
    var div;
    div = document.getElementById('tableau');
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "print_ajax/cancelLesson.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("id="+id+"&user="+user+"$facture="+facture);
}

function updateBracket() {
    var request = ajaxOk();
    var div = document.getElementById("total");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "print_ajax/valuePanier.php");
    request.send();
}

function display_back_modifyActivity() {
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "modifyActivity.php");
    request.send();
}

function display_back_modifyLecon(){
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "modifyLessons.php");
    request.send();
}

function display_back_modifyService(){
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "modifyService.php");
    request.send();
}

function display_back_checkFacture() {
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "checkFactures.php");
    request.send();
}

function display_back_king() {
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "king.php");
    request.send();
}

function display_back_myinfoadmin() {
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "myinfoadmin.php");
    request.send();
}

function display_back_myinfoadmin() {
    var request = ajaxOk();
    var div = document.getElementById("content");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "myinfoadmin.php");
    request.send();
}

function delete_user_plane(id) {
    var request = ajaxOk();
    var div = document.getElementById("print_planes");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "print_ajax/print_list_planes.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("id_plane="+id);
}

function display_user_plane() {
    var request = ajaxOk();
    var div = document.getElementById("print_planes");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "print_ajax/print_list_planes.php");
    request.send();
}

function form_add_plane() {
    var request = ajaxOk();
    var div = document.getElementById("print_planes");
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "addPlane.php");
    request.send();
}

function add_plane() {
    var request = ajaxOk();
    var div = document.getElementById("print_planes");
    var nom = document.getElementById("nom").value;
    var type = document.getElementById("types_avions").value;
    var superficie = document.getElementById("superficie_avion").value;
    var poids = document.getElementById("poids_avion").value;
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = " ";
            div.innerHTML = request.responseText;
        }
    };
    request.open("POST", "addPlane.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("type="+type+"&nom="+nom+"&superficie="+superficie+"&poids="+poids);
}

function update_atterissage_form(){
    var request = ajaxOk();
    var div = document.getElementById("liste_atterissage");
    var avion = document.getElementById("liste_avions").value;
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = "";
            div.innerHTML = request.responseText;
        }
    };

    request.open("POST", "print_ajax/print_update_atterissage.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("avion="+avion);
}

function update_stationnement_form(){
    var request = ajaxOk();
    var div = document.getElementById("formulaire");
    var avion = document.getElementById("liste_avions").value;
    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            div.innerHTML = "";
            div.innerHTML = request.responseText;
        }
    };

    request.open("POST", "print_ajax/print_update_stationnement.php");
    request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    request.send("avion="+avion);
}


