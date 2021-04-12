window.onload = function () {
    //deze variableen worden globaal gemaakt omdat de onclick functies anders niet werken
    // de globalen variabelen moeten in de onload omdat de variablen anders geen items bevatten
    muziek = document.getElementById('js--muziek'); // id for audio element
    // bekijkt of muziek aanwezig is en voert daarna code van afspelen
    audio = document.getElementById('js--muziek-audio');
    nummerNaam = document.getElementById('js--nummerNaam');
    nummerArtiest = document.getElementById('js--nummerArtiest');
    volgendNummerButton = document.getElementById('js--volgendNummerButton');

    if (muziek != null) {
        const pButton = document.getElementById('js--pButton'); // play knop
        const playhead = document.getElementById('js--playhead'); // playhead
        const timeline = document.getElementById('js--timeline'); // tijdlijn
        let duration = muziek.duration; // De duratie van het nummer

        // timeline width adjusted for playhead
        let timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
        // play button event listenter
        pButton.addEventListener("click", play);
        // timeupdate event listener
        muziek.addEventListener("timeupdate", timeUpdate, false);

        // makes timeline clickable
        timeline.addEventListener("click", function (event) {
            moveplayhead(event);
            muziek.currentTime = duration * clickPercent(event);
        }, false);

        // returns click as decimal (.77) of the total timelineWidth
        function clickPercent(event) {
            return (event.clientX - getPosition(timeline)) / timelineWidth;
        }

        // makes playhead draggable
        playhead.addEventListener('mousedown', mouseDown, false);
        window.addEventListener('mouseup', mouseUp, false);

        // Boolean value so that audio position is updated only when the playhead is released
        var onplayhead = false;

        // mouseDown EventListener
        function mouseDown() {
            onplayhead = true;
            window.addEventListener('mousemove', moveplayhead, true);
            muziek.removeEventListener('timeupdate', timeUpdate, false);
        }

        // mouseUp EventListener
        // getting input from all mouse clicks
        function mouseUp(event) {
            if (onplayhead == true) {
                moveplayhead(event);
                window.removeEventListener('mousemove', moveplayhead, true);
                // change current time
                muziek.currentTime = duration * clickPercent(event);
                muziek.addEventListener('timeupdate', timeUpdate, false);
            }
            onplayhead = false;
        }
        // mousemove EventListener
        // Moves playhead as user drags
        function moveplayhead(event) {
            var newMargLeft = event.clientX - getPosition(timeline);

            if (newMargLeft >= 0 && newMargLeft <= timelineWidth) {
                playhead.style.marginLeft = newMargLeft + "px";
            }
            if (newMargLeft < 0) {
                playhead.style.marginLeft = "0px";
            }
            if (newMargLeft > timelineWidth) {
                playhead.style.marginLeft = timelineWidth + "px";
            }
        }

        // timeUpdate
        // Synchronizes playhead position with current point in audio
        function timeUpdate() {
            var playPercent = timelineWidth * (muziek.currentTime / duration);
            console.log(playPercent);
            playhead.style.marginLeft = playPercent + "px";
            if (muziek.currentTime == duration) {
                //wanneer muziek klaar is word de muziek gestopt
                pButton.className = "muziekSpeler--play__Button";
                pButton.className = "fas fa-play muziekSpeler--play__Button";
                //wanneer nummer klaar is zou het volgende nummer moeten gaan spelen
                //de funtie volgendNummer() kan niet zomaar aangeroepen worden omdat
                //er een object vanuit de database meegegeven moet worden dus word er een onclick nagebootst
                volgendNummerButton.click();
            }
        }

        //Play and Pause
        function play() {
            // start music
            if (muziek.paused) {
                muziek.play();
                // remove play, add pause
                pButton.className = "muziekSpeler--play__Button";
                pButton.className = "fas fa-pause muziekSpeler--play__Button";
            } else { // pause music
                muziek.pause();
                // remove pause, add play
                pButton.className = "muziekSpeler--play__Button";
                pButton.className = "fas fa-play muziekSpeler--play__Button";
            }
        }





        // Gets audio file duration
        muziek.addEventListener("canplaythrough", function () {
            duration = muziek.duration;

        }, false);

        // getPosition
        // Returns elements left position relative to top-left of viewport
        function getPosition(el) {
            return el.getBoundingClientRect().left;
        }

    }

}

//de functies moeten buiten de onload funcatie aangemaakt worden anders kunnen ze niet aan geroepen worden door de onclick die een object meegeeft
let nummer = 0;
//functie die de lijst van nummers binnen krijgt word gebruikt in de html
const vorigNummer = (afspeellijst) => {
    if (nummer != 0) {
        nummer -= 1;
        //selecteerd het vorige nummer in de lijst
        const vorige = afspeellijst[nummer].bestandLocatie;
        //zet het vorige nummer in van de lijst
        audio.setAttribute('src', "/muziek/" + vorige);
        //muziek wordt op pauze gezet
        muziek.pause();
        //laad het vorige nummer in van de lijst
        muziek.load();
        //veranderd de innerhtml naar de bijbehoordende nummer
        nummerNaam.innerHTML = afspeellijst[nummer].naam;
        nummerArtiest.innerHTML = afspeellijst[nummer].artiest;
        //speeld het nummer af
        muziek.play();
    }
}


//functie die de lijst van nummers binnen krijgt word aangeroepen in de html
const volgendNummer = (afspeellijst) => {
    //selecteerd het volgende nummer in de lijst
    nummer += 1;
    console.log(afspeellijst[nummer])
    if (afspeellijst[nummer] != undefined) {
        const volgende = afspeellijst[nummer].bestandLocatie;
        // zet het volgende nummer in van de lijst
        audio.setAttribute('src', "/muziek/" + volgende);
        //muziek wordt op pauze gezet
        muziek.pause();
        //laad het volgende nummer in van de lijst
        muziek.load();
        //veranderd de innerhtml naar de bijbehoordende nummer
        nummerNaam.innerHTML = afspeellijst[nummer].naam;
        nummerArtiest.innerHTML = afspeellijst[nummer].artiest;
        //speeld het nummer af
        muziek.play();
    } else {
        console.log("nope")
        //afspeellijst word gereset
        nummer = 0;
        //de button click voor volgendnummer word na gebootst
        volgendNummerButton.click();
    }
}

