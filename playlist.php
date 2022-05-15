<?php include('header.php'); ?>
<!-- HEADER -->
<div class="content-playlist">
    <div class="container">
        <div class="row">
            <div class="col-xl-4">
                <div class="my--profile">
                <?php
                        include ("connect.php");
                        if(isset($_SESSION['Username'])){
                            $Username = $_SESSION['Username']; 
                            $sql = "Select * from `users` where Username = '$Username'";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($result))
                            {
                                $Username = $row['Username'];
                                $Password = $row['Password'];
                                $DoB = $row['DoB'];
                                $Email = $row['Email'];
                                $Phonenumber = $row['Phonenumber'];
                                $Role = $row['Role'];
                            ?>

                            <div class="card mb-3" style="max-width: 500px; color: white">
                                <div class="row g-0">
                                    <div class="col-xl-4">
                                        <img src="images/User.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="card-body" style="background-color: #20202a">
                                            <h5 class="card-title">#<?php echo "$Username" ?></h5>
                                            <p class="card-text">Birthday: <?php echo "$DoB" ?></p>
                                            <p class="card-text">Email: <?php echo "$Password" ?></p>
                                            <p class="card-text">Status: <small class="text-muted"><?php echo "$Role" ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
} } ?>
                </div>
            </div>
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
                                            <!-- ADD PLAYLIST -->
<?php 
	include("connect.php");
	if (isset($_GET["add_playlist"])) {	
		$Song =  $_GET['add_playlist'];
		if (isset($_SESSION['Username']) && $_SESSION['Username'] != null){
			$Username = $_SESSION['Username'];
			$sql="SELECT * FROM `cart` WHERE Username = '$Username' and Song = '$Song'";
			$result = mysqli_query($connect, $sql);
			$check_song = mysqli_num_rows($result);
			if ($check_song > 0) {
				echo "<script>alert('Song is already in the Playlist')</script>";
			}
			else {
				$sql = "INSERT INTO `cart`(`Playlist`, `Username`, `Song`) VALUES ('NULL','$Username','$Song')";
				$result = mysqli_query($connect, $sql);	
				if ($result) {
					echo "<script>alert('Song added to the cart successfully!')</script>";
				}
				else {
					echo "<script>alert('Error')</script>";
				}
			}
		}
		else {
			echo "<script>alert('You need to be logged in to perform this action')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}
	}					
?>
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
<!-- ========================================================================================== -->
                                <!-- ADD PLAYLIST -->
            <div class="col-xl-8">
                <div class="my--playlist">
                <?php
                        include ("connect.php");
                        if(isset($_SESSION['Username'])){
                            $Username = $_SESSION['Username']; 
                            $sql = "SELECT * FROM cart INNER JOIN song ON song.Song = cart.Song WHERE Username = '$Username'";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($result))
                            {
                                $Playlist = $row['Playlist'];
                                $Username = $row['Username'];
                                $Song = $row['Song'];
                                $Artist = $row['Artist'];
                                $Images = $row['images'];
                                $File = $row['File'];
                                $Note = $row['Note'];
                            ?>
                            <div class="card mb-3" style="max-width: 500px; color: white; background-color: #20202a">
                                <div class="row g-0">
                                    <div class="col-xl-4">
                                        <img src="<?php echo "$Images" ?>" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-xl-8">
                                        <div class="card-body" style="background-color: #20202a">
                                            <h5 class="card-title"><?php echo "$Song" ?></h5>
                                            <p class="card-text">Artist: <?php echo "$Artist" ?></p>
                                            <audio id="audioPlay" controls="controls"  preload="none" src="<?php echo"audio/$File" ?>"></audio>
                                            <a href="playlist.php?remove_playlist=<?php echo"$Playlist"?>">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
} } ?>
                </div>
            </div>
        </div>

        <!-- ===================================== -->
<?php 
	include("connect.php");
	if (isset($_GET["remove_playlist"])) {	
		$Playlist =  $_GET['remove_playlist'];
		if (isset($_SESSION['Username']) && $_SESSION['Username'] != null){
			$Username = $_SESSION['Username'];
			$sql="SELECT * FROM `cart` WHERE Username = '$Username' and Song = '$Song'";
			$result = mysqli_query($connect, $sql);
			$check_song = mysqli_num_rows($result);
			if ($check_song < 0) {
				echo "<script>alert('Song is already in the Playlist')</script>";
			}
			else {
				$sql_rm = "DELETE FROM `cart` WHERE Playlist = '$Playlist'";
				$result = mysqli_query($connect, $sql_rm);	
				if ($result) {
                    echo "<div class='alert alert-success' role='alert'>
                    Remove Successfully 
                    <script>window.open('playlist.php', '_self');</script>
                        </div>
                    ";
				}
				else {
                    echo "<div class='alert alert-danger' role='alert'>
                    Remove Unsuccessfully! Try Again
                    </div>";
				}
			}
		}
		else {
			echo "<script>alert('You need to be logged in to perform this action')</script>";
			echo "<script>window.open('login.php','_self')</script>";
		}
	}					
?>
        <!-- ===================================== -->
        <div class="row">
            <div class="col-xl-12">
                <div class="marketing-song">
                    <div class="album">
                        <div class="row ">                             
<!--------------------------------- PHP --------------------------------->           
                            <?php
                                include ('connect.php');
                                $sql = "Select * from `song` ORDER BY RAND() LIMIT 4";
                                $result = mysqli_query($connect, $sql);
                                while ($row = mysqli_fetch_array($result))
                                {
                                    $Song = $row['Song'];
                                    $Artist = $row['Artist'];
                                    $Images = $row['images'];
                                    $File = $row['File'];
                                    $Note = $row['Note'];
                                    $Price = $row['Price'];
                                ?>
<!--------------------------------- PHP --------------------------------->                                     
                                <div class="col-xl-3 col-lg-6 col-md-9">
                                    <div class="random--song">
                                        <div class="box_card" style="width: auto; margin: 15px 10px">
                                            <img src=" <?php echo "$Images" ?>" class="card-img-top">
                                            <div class="card-body">
                                                <p class="card-text" style="height:72px">
                                                    <b><?php echo "$Song" ?></b>
                                                    <br> <?php echo "$Artist" ?>
                                                </p>
                                                <a href="playlist.php?add_playlist=<?php echo"$Song" ?>"><i class="fas fa-heart"></i></a>
                                            </div>
                                        </div> 
                                    </div>
                                </div> <?php } ?> 
                        </div>
                    </div>  
                </div>        
            </div>
        </div>
    </div>
</div>

<!-- FOOTER -->
<?php include('footer.php'); ?>