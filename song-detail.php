<?php include('header.php');?>
<!-- Content -->
                    <div class="content">
                        <div class="container-fluid">
                            <div class="album">
                                <div class="row ">   
                                    <div class="col-xl-3">

                                    </div>
                                    <div class="col-xl-6">
                                        <div class="detail--total">
                                            <div class="container-fluid">
                                                <div class="row">
                <!--------------------------------- PHP --------------------------------->
                                                        <?php
                                                            include('connect.php');
                                                            $Song = $_GET["Song"];
                                                            $sql = "SELECT * FROM song where Song = '$Song'";
                                                            $result = mysqli_query($connect, $sql);
                                                            while($row =mysqli_fetch_assoc($result)) 
                                                            {
                                                                $Song = $row['Song'];
                                                                $Artist = $row['Artist'];
                                                                $Images = $row['images'];
                                                                $File = $row['File'];
                                                                $Note = $row['Note'];                                          
                                                        ?>
                <!--------------------------------- PHP --------------------------------->
                                                        
                                                        <div class="col-md-5">
                                                            <div class="displayImages">
                                                                <div class="images-detail">
                                                                    <img src="<?php echo"$Images"?>">                                    
                                                                </div>
                                                                <div class="process" >
                                                                    <audio class="audioPlay" id="audioPlay">
                                                                        <source src="audio/<?php echo "$File" ?>" type="audio/mpeg">
                                                                    </audio>
                                                                </div>
                                                                <div class="process">
                                                                    <br><input id="progress" class="progress" type="range" value="0" step="1" min="1" max="100"><br>
                                                                </div>
                                                                <div class="play-music">                       
                                                                    <button onclick="document.getElementById('audioPlay').volume -= 0.1"><i class='bx bx-volume-low' ></i></button>
                                                                    <button onclick="document.getElementById('audioPlay').play()"><span><i class="fas fa-play-circle"></i></span></button>
                                                                    <button onclick="document.getElementById('audioPlay').pause()"><span><i class="fas fa-pause-circle"></i></span></button>
                                                                    <button onclick="document.getElementById('audioPlay').volume += 0.1"><i class='bx bx-volume-full' ></i></button>
                                                                    <button><a href="audio/<?php echo"$File" ?>" download="audio/<?php echo"$File" ?>"><i class='bx bx-cloud-download'></i></a></button>

                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-7">
                                                            <div class="displayInfo">
                                                                <div class="body-detail">
                                                                    <h4><?php echo"$Song" ?></h4>
                                                                    <p>Artist: <?php echo"$Artist" ?></h5><br><br>
                                                                    <h5 style="color: #F7DAD9;font-size: 15px;"><a style="color: #F7DAD9;font-size: 15px;" href='playlist.php?add_playlist=<?php echo"$Song"?>'><i class='fas fa-heart'></i> Add to playlist</a></h5><br>
                                                                    <textarea cols="40" rows="10" disabled><?php echo"$Note" ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3">

                                    </div>                          
                                </div>
                            </div>
                        </div>
                    </div>                                     
    <!-- Footer -->
    <?php include('footer.php');?>