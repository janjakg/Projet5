var callBackGetSucess = function(data) {
    console.log("données api", data);
    //alert("info titre : " + data['data'][1]['artist'].id);
    //header("Access-Control-Allow-Origin: *");
    //alert("meteo temps :" + data.main.temp);
    var element = document.getElementById("zoneArtist");
    //element.innerHTML = data['data'][0]['artist'].name + " (id numéro : " + data['data'][0]['artist'].id + ") , est l'auteur du titre '" + data['data'][0].title + " ' issu de l'album : " + data['data'][0]['album'].title + " et la pochette de son album est visible à l'url : " + data['data'][0]['album'].cover_medium;
    //document.getElementById("infoToPaste").innerHTML = "à l'aide de ces données remplissez le formulaire avant envoi"
    document.getElementById("artistName").innerHTML = data['data'][0]['artist'].name + '  '
    document.getElementById("artistId").innerHTML = data['data'][0]['artist'].id + '  '
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

/*(() => {
    const button = document.querySelector('#btnCopy');

    button.addEventListener('click', () => {
        const text = document.querySelector('#artistName');
        const range = document.createRange();

        range.selectNode(text);
        window.getSelection().addRange(range);

        try {
            if (document.execCommand('copy')) {
                alert('texte copié')
            }
        } catch (error) {
            alert('copie impossible');
        }
        //  window.getSelection().removeAllRanges();
    });

})();*/

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