//Petite animation de texte qui s'écrit au fur et à mesure et qui change de couleur sur la page d'accueil et sur la page  postView
const txtAnim = document.querySelector('h1');
new Typewriter(txtAnim, {
        //deleteSpeed: 20
    })
    .typeString('<span style="font-family:Homemade Apple"><strong>Play My List :</strong></span>')
    .pauseFor(300)
    .typeString('<span style="font-family:Homemade Apple">For Music Lover</span>')
    .pause(1000)
    .deleteChars(15)
    .typeString('<span style="color:red" style="font-family:Homemade Apple"> For Music Lovers...</span>')
    .start()