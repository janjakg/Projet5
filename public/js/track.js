var callBackGetSucess = function(data) {
    console.log("données api", data);
    var element = document.getElementById("zoneArtist");
    document.getElementById("artistName").innerHTML = data['data'][0]['artist'].name + '  '
    document.getElementById("artistTrack").innerHTML = data['data'][0].title + '  '
    document.getElementById("albumName").innerHTML = data['data'][0]['album'].id + '  '
    document.getElementById("imageAlbum").innerHTML = data['data'][0]['album'].cover_medium + '  '
}

function buttonClickGet() {

    var artist = document.getElementById("artist").value;
    var apiUrl = "https://api.deezer.com/search?q=" + artist;


    $.get(apiUrl, callBackGetSucess).done(function() {
            //alert(second success);
            document.getElementById("zoneArtist").style.display = "block";
            document.getElementById("instructions").innerHTML = "Vous pouvez maintenant copier-coller les infos nécessaires dans le formulaire suivant :"
        })
        .fail(function() {
            alert("error");
        })
        .always(function() {
            // alert(finished);
        });
}

//Pour pouvoir faire un copier coller au moment de la création du titre
function copyToClip(str) {
    function listener(e) {
        e.clipboardData.setData("text/html", str);
        e.clipboardData.setData("text/plain", str);
        e.preventDefault();
    }
    document.addEventListener("copy", listener);
    document.execCommand("copy");
    document.removeEventListener("copy", listener);
};