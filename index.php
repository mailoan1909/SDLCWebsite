<?php include ('header.php') ?>  
       <!-- Content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="TuneSource--CongTuan">
                                            <img src="images/Intro.png" style="width:91% ;padding:10px; margin-left: 30px">
                                        </div>
                                    </div>
                                    <div class="col-lg-8">
                                        <div class="slide-banner">
                                            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                                                <!-- Slide  -->
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img src="images/Slider/5.png" class="d-block w-100">
                                                    </div>
                                                    <!-- d-block w-100 -->
                                                    <div class="carousel-item">
                                                        <img src="images/Slider/1.png" class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="images/Slider/2.png" class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="images/Slider/3.png" class="d-block w-100">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img src="images/Slider/4.png" class="d-block w-100">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="row">
                                <!-- Đây là Chia Artist  -->
                                <div class="col-xl-4 col-lg-2">
                                <div class="artist">
                                <div class="row">
                                    <!--------------------------------- PHP --------------------------------->
                                    <?php
include ('connect.php');
$sql = "Select * from `artist`";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result))
{
    $Artist = $row['Artist'];
    $DoB = $row['DoB'];
    $Genre = $row['Genre'];
    $Images = $row['Images'];
    $Note = $row['Note'];

?>
<!--------------------------------- PHP --------------------------------->                                     
                                    <div class="col-xl-6 col-lg-12 ">
                                        <div class="artist--cart">
                                            <div class="box_card" style="width: auto; margin: 15px 10px">
                                                <img src="<?php echo "$Images" ?>" class="card-img-top">
                                                <div class="card-body">
                                                    <p class="card-text" style="height:72px">
                                                        <b><?php echo "$Artist" ?></b>
                                                        <br> <?php echo "$DoB" ?>
                                                        <br> <?php echo "$Genre" ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                           
                                <?php
} ?>
                                </div>
                            </div>
                                </div>


                                <!-- ADD PLAYLIST -->
                                <?php 
	include("connect.php");
	if (isset($_GET["add_playlist"])) {	
		$song_id =  $_GET['add_playlist'];
		if (isset($_SESSION['Username']) && $_SESSION['Username'] != null){
			$Username = $_SESSION['Username'];
			$sql="select * from `cart` where song = $Song AND users ='$Username'";
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

                                <!-- ADD PLAYLIST -->
                                <!-- Đây là chia Song -->
                                <div class="col-xl-8 col-lg-10 col-md-12">
                                <div class="album">
                                        <div class="row ">                             
<!--------------------------------- PHP --------------------------------->           
                                    <?php
                                        include ('connect.php');
                                        $sql = "Select * from `song`";
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
                                        <div class="box_card" style="width: auto; margin: 15px 10px"> 

                                        <?php                                      
                                                include('connect.php');
                                                if(isset($_SESSION['Username']))
                                                {
                                                    if($Role == "Admin")
                                                    {                                              
                                                        echo "<a href='song-detail.php?Song=$Song'>
                                                                <div class='img'>
                                                                    <img src='$Images' class='card-img-top'> 
                                                                </div>
                                                            </a>";
                                                    }
                                                    elseif($Role == "Premium") 
                                                    {
                                                        echo "<a href='song-detail.php?Song=$Song'>
                                                                <div class='img'>
                                                                    <img src='$Images' class='card-img-top'> 
                                                                </div>
                                                            </a>";
                                                    }
                                                    else
                                                    {
                                                        echo "<img src='$Images' class='card-img-top'>";
                                                    }
                                                }
                                                else
                                                {
                                                    echo "<img src='$Images' class='card-img-top'>";
                                                }
                                            ?>                                                       
                                        <div class="card-body">
                                            <p class="card-text" style="height:72px">
                                                <b><?php echo "$Song" ?></b>
                                                <br><?php echo "$Artist"?>
                                            </p>
                                            <audio id="audioPlay" controls controlsList="nodownload" ontimeupdate="MyAudio(this)" >
                                                <source src="audio/<?php echo "$File" ?>" type="audio/mpeg">
                                            </audio>
                                            
                                            <?php                                      
                                                include('connect.php');
                                                if(isset($_SESSION['Username']))
                                                {
                                                    if($Role == "Admin")
                                                    {                                              
                                                        echo "<a href='song-detail.php?Song=$Song'><button><span><i class='fas fa-play-circle'></i></span></button></a>";
                                                    }
                                                    elseif($Role == "Premium") 
                                                    {
                                                        echo "<a href='song-detail.php?Song=$Song'><button><span><i class='fas fa-play-circle'></i></span></button></a>";
                                                    }
                                                    else 
                                                    {
                                                        echo "<a href='index.php#updatePremium'><button style='width: 10rem'>Update Premium</button></a>";
                                                        
                                                    }
                                                }
                                            ?>
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
        </div>
    </div>
<!-- Footer -->
<?php include ('footer.php') ?>
