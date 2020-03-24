/*$(document).ready(function() {
    const apiUrl = 'https://www.googleapis.com/youtube/v3/playlists';
    const format = '&format = json';
    var key = 'AIzaSyDS4Qxs1LHcgXerd38MVTSeIyAlZCRxbPo';
    var playlistId = 'zJJEtBempG0';

    let artist = $('#artist');
    let title = $('#title');
    let album = $('#album');
    let image = $('#image');
    let errorMessage = $('#error-message');



    $(artist).on('blur', function() {
        let singer = $(this).val();
        //console.log(singer);
        let url = apiUrl + singer + format;
        //console.log(url);

        fetch(url, { method: 'get' }).then(response => response.json()).then(results => {
            console.log(results);
            if (results) {
                $.each(results, function(key, value) {
                    //console.log(value);
                    console.log(key, value);
                    $(title).append('<option value="' + key + '">' + value + '</option>');
                    $(album).append('<option value="' + key + '">' + value + '</option>');
                    $(image).append('<option value="' + key + '">' + value + '</option>');
                });
            } else {
                if ($(artist).val()) {
                    console.log('artiste inexistant');
                    $(errorMessage).text('artiste inexistant dans notre base').show();
                } else {
                    $(errorMessage).text('').hide();
                }
            }
        }).catch(err => {
            console.log(err);
        });
    });
});*/

var callBackGetSucess = function(data) {
    console.log("données api", data);
    //alert("info titre : " + data['data'][1]['artist'].id);
    //header("Access-Control-Allow-Origin: *");
    //alert("meteo temps :" + data.main.temp);
    var element = document.getElementById("zoneArtist");
    //element.innerHTML = data['data'][0]['artist'].name + " (id numéro : " + data['data'][0]['artist'].id + ") , est l'auteur du titre '" + data['data'][0].title + " ' issu de l'album : " + data['data'][0]['album'].title + " et la pochette de son album est visible à l'url : " + data['data'][0]['album'].cover_medium;
    document.getElementById("artistName").innerHTML = data['data'][0]['artist'].name
    document.getElementById("artistId").innerHTML = data['data'][0]['artist'].id
    document.getElementById("artistTrack").innerHTML = data['data'][0].title
    document.getElementById("albumName").innerHTML = data['data'][0]['album'].id
    document.getElementById("imageAlbum").innerHTML = data['data'][0]['album'].cover_medium
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