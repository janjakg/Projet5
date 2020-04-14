//Petite animation de texte sur la page d'accueil
<<<<<<< HEAD

=======
>>>>>>> 4723d87a693a405cd4a12f3d5bca841af09bd651
const txtAnim = document.querySelector('h1');
new Typewriter(txtAnim, {
        //deleteSpeed: 20
    })
    .typeString('<span style="font-family:Homemade Apple"><strong>Play My List :</strong></span>')
    .pauseFor(300)
    .typeString('<span style="font-family:Homemade Apple">For Music Lover</span>')
    .pause(1000)
    .deleteChars(15)
<<<<<<< HEAD
    .typeString('<span style="color:red" style="font-family:Homemade Apple"> For Music Lovers Only...</span>')
=======
    .typeString('<span style="color:red" style="font-family:Homemade Apple"> For Music Lovers...</span>')
>>>>>>> 4723d87a693a405cd4a12f3d5bca841af09bd651
    .start()