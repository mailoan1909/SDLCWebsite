    <!-- Footer -->
    <footer>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4 col-md-3">
                    <?php echo "$Song" ?>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="play-music">                       
                            <button><i class="fa fa-random"></i></button>
                            <button onclick="document.getElementById('audioPlay').volume -= 0.1"><i class="fa fa-arrow-left"></i></button>
                            <button onclick="document.getElementById('audioPlay').play()"><span><i class="fas fa-play-circle"></i></span></button>
                            <button onclick="document.getElementById('audioPlay').pause()"><span><i class="fas fa-pause-circle"></i></span></button>
                            <button onclick="document.getElementById('audioPlay').volume += 0.1"><i class="fa fa-arrow-right"></i></button>
                            <button><i class="fa fa-redo"></i></button>
                    </div>
                    <div class="process">
                        <input id="progress" class="progress" type="range" value="0" step="1" min="1" max="100">
                    </div>

                </div>
                <div class="col-lg-4 col-md-3">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="play-music--st">
                                    <button onclick="document.getElementById('audioPlay').volume -= 0.1"><i class='bx bx-volume-low' ></i></button>                       
                                    <button onclick="enableMute()"><i class='bx bxs-volume-mute'></i></button>
                                    <button onclick="enableUnmute()"><i class='bx bxs-volume-full'></i></button>
                                    <button onclick="document.getElementById('audioPlay').volume += 0.1"><i class='bx bx-volume-full' ></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </footer>

<script type="text/javascript">
    function MyAudio(event){
    if(event.currentTime>3){
    event.currentTime=0;
    event.pause();
    alert("Buy Premium")
    }
    }

    var alertList = document.querySelectorAll('alert')
    var alerts =  [].slice.call(alertList).map(function MyAudio(event) {
    return new bootstrap.Alert(MyAudio)
})
</script>


<script>
var vid = document.getElementById("audioPlay");

function enableMute() { 
    vid.muted = true;
}

function enableUnmute() { 
    vid.muted = false;
}

// 

//


</script>


</body>

</html>