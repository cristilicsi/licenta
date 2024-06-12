// Funcția care actualizează valoarea afișată a sliderului
function updateSliderValue(value) {
    document.getElementById('ani-studiu-value').innerHTML = value;
}

// Funcția care calculează probabilitatea
function calculeazaProbabilitatea() {
    var aniStudiu = parseInt(document.getElementById('ani-studiu').value);
    var probabilitate; // Variabila în care vom stoca probabilitatea

    // Calculează probabilitatea în funcție de numărul de ani de studiu
    if (aniStudiu >= 0 && aniStudiu <= 1) {
        probabilitate = 0.3; 
    } else if (aniStudiu > 1 && aniStudiu <= 3) {
        probabilitate = 0.5; 
    } else if (aniStudiu > 3 && aniStudiu <= 5) {
        probabilitate = 0.7; 
    } else {
        probabilitate = 0.9; 
    }

    // Afișează rezultatul în elementul cu id-ul 'rezultat-probabilitate'
    document.getElementById('rezultat-probabilitate').innerHTML = "Probabilitatea de a fi aprobat în internship este: " + (probabilitate * 100) + "%";
}
