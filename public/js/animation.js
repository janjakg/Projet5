//Petite animation de texte sur la page d'accueil

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