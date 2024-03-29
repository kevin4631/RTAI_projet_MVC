function hiddenPopup() {
    document.getElementById("blur").style.visibility = "hidden";
}

function showPopup(pageLink) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            // Ci-dessous on traitera la réponse quand elle arrivera
            var popup = this.responseText;
            document.getElementById("popup").innerHTML = popup;
            document.getElementById("blur").style.visibility = "visible";
        } else if (this.readyState == 4) {
            alert(this.status);
        }
    };

    var params = "pageLink=" + pageLink;
    xhr.open('POST', 'php/getPopup.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(params);
}
