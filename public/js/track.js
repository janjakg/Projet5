$(document).ready(function() {
    const apiUrl = 'https://api.deezer.com/artist/';
    const format = '&format = json';

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
            // console.log(results);
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
});