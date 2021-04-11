window.onload = function () {
    muziek = document.getElementById('js--muziek'); // id for audio element
    // bekijkt of muziek aanwezig is en voert daarna code van afspelen
    audio = document.getElementById('js--muziek-audio');
    nummerNaam = document.getElementById('js--nummerNaam');
    nummerArtiest = document.getElementById('js--nummerArtiest');

    if (muziek != null) {
        const pButton = document.getElementById('js--pButton'); // play button
        const playhead = document.getElementById('js--playhead'); // playhead
        const timeline = document.getElementById('js--timeline'); // timeline
        let duration = muziek.duration; // Duration of audio clip, calculated here for embedding purposes

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
            playhead.style.marginLeft = playPercent + "px";
            if (muziek.currentTime == duration) {
                pButton.className = "muziekSpeler--play__Button";
                pButton.className = "fas fa-play muziekSpeler--play__Button";
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

let nummer = 0;
const basisURL = 'http://127.0.0.1:8000/nummers/'


function vorigNummer(afspeellijst) {
    if (nummer != 0) {
        nummer -= 1;
        const vorige = afspeellijst[nummer].bestandLocatie;
        audio.setAttribute('src', "/muziek/" + vorige);
        muziek.load();
        nummerNaam.innerHTML = afspeellijst[nummer].naam;
        nummerArtiest.innerHTML = afspeellijst[nummer].artiest;
        muziek.play();
    }
}

function volgendNummer(afspeellijst) {
    nummer += 1;
    const volgende = afspeellijst[nummer].bestandLocatie;
    console.log(afspeellijst[nummer]);
    audio.setAttribute('src', "/muziek/" + volgende);
    muziek.load();
    nummerNaam.innerHTML = afspeellijst[nummer].naam;
    nummerArtiest.innerHTML = afspeellijst[nummer].artiest;
    muziek.play();
    console.log(nummerNaam);

}
