window.onload = function () {
    const music = document.getElementById('music'); // id for audio element
    // bekijkt of muziek aanwezig is en voert daarna code van afspelen



    if (music != null) {
        const pButton = document.getElementById('pButton'); // play button
        const playhead = document.getElementById('playhead'); // playhead
        const timeline = document.getElementById('timeline'); // timeline
        const backwarButton = document.getElementById('backwardButton'); // previous music
        const forwardButton = document.getElementById('forwardButton'); // next music
        let duration = music.duration; // Duration of audio clip, calculated here for embedding purposes
        let nummer = 0;

        // timeline width adjusted for playhead
        let timelineWidth = timeline.offsetWidth - playhead.offsetWidth;
        // play button event listenter
        pButton.addEventListener("click", play);

        //volgende nummer inline
        forwardButton.addEventListener("click", volgende);

        //vorige nummer inline
        backwarButton.addEventListener("click", vorige);

        // timeupdate event listener
        music.addEventListener("timeupdate", timeUpdate, false);

        // makes timeline clickable
        timeline.addEventListener("click", function (event) {
            moveplayhead(event);
            music.currentTime = duration * clickPercent(event);
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
            music.removeEventListener('timeupdate', timeUpdate, false);
        }

        // mouseUp EventListener
        // getting input from all mouse clicks
        function mouseUp(event) {
            if (onplayhead == true) {
                moveplayhead(event);
                window.removeEventListener('mousemove', moveplayhead, true);
                // change current time
                music.currentTime = duration * clickPercent(event);
                music.addEventListener('timeupdate', timeUpdate, false);
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
            var playPercent = timelineWidth * (music.currentTime / duration);
            playhead.style.marginLeft = playPercent + "px";
            if (music.currentTime == duration) {
                pButton.className = "muziekSpeler--play__Button";
                pButton.className = "fas fa-play muziekSpeler--play__Button";
            }
        }

        //Play and Pause
        function play() {
            // start music
            if (music.paused) {
                music.play();
                // remove play, add pause
                pButton.className = "muziekSpeler--play__Button";
                pButton.className = "fas fa-pause muziekSpeler--play__Button";
            } else { // pause music
                music.pause();
                // remove pause, add play
                pButton.className = "muziekSpeler--play__Button";
                pButton.className = "fas fa-play muziekSpeler--play__Button";
            }
        }

        function volgende() {
            nummer += 1;
            console.log(nummer);
            //veranderd de innerHTML in die van het volgende nummer met nummer als index
        }

        function vorige() {
            if (nummer != 0) {
                nummer -= 1;
                console.log(nummer);
                //veranderd de innerHTML in die van het vorige nummer met nummer als index
            }
        }

        // Gets audio file duration
        music.addEventListener("canplaythrough", function () {
            duration = music.duration;

        }, false);

        // getPosition
        // Returns elements left position relative to top-left of viewport
        function getPosition(el) {
            return el.getBoundingClientRect().left;
        }



    }

}

