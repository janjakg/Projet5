//Ce fichier est relatif au player Deezer que nous utilisons grace à l'API
$(document).ready(function() {
    $("#controlers input").attr('disabled', true);
    $("#slider_seek").click(function(evt, arg) {
        var left = evt.offsetX;
        DZ.player.seek((evt.offsetX / $(this).width()) * 100);
    });
});

function event_listener_append() {
    var pre = document.getElementById('event_listener');
    var line = [];
    for (var i = 0; i < arguments.length; i++) {
        line.push(arguments[i]);
    }
    pre.innerHTML += line.join(' ') + "\n";
}

function onPlayerLoaded() {
    $("#controlers input").attr('disabled', false);
    event_listener_append('player_loaded');
    DZ.Event.subscribe('current_track', function(arg) {
        event_listener_append('current_track', arg.index, arg.track.title, arg.track.album.title);
    });
    DZ.Event.subscribe('player_position', function(arg) {
        event_listener_append('position', arg[0], arg[1]);
        $("#slider_seek").find('.bar').css('width', (100 * arg[0] / arg[1]) + '%');
    });
}
document.addEventListener('DOMContentLoaded', function() {
    DZ.init({
        appId: '8',
        channelUrl: 'https://developers.deezer.com/examples/channel.php',
        player: {
            container: 'player',
            playlist: true,
            width: 'auto',
            height: 100,
            onload: onPlayerLoaded
        }
    });
});