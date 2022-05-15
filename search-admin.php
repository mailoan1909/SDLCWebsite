<?php
include('manage--song.php');
$search = "";
if( !empty($_GET['Search'])){
  $search = $_GET['Search'];
}
?>
<div class="container" style="margin-top: 20px">
<div class="row">
    <?php
    if(!empty($search)) {
      $rs = mysqli_query( $connect ,"SELECT * FROM song WHERE song.Song LIKE '%{$search}%'");
      while($row = mysqli_fetch_assoc($rs)){
        $Song = $row['Song'];
        $Artist = $row['Artist'];
        $Images = $row['images'];
        $File = $row['File'];
        $Note = $row['Note'];    
        $Price = $row['Price'];      
    ?>
    <div class="col-xl-2 col-lg-4 col-md-6">
        <div class="box_card" style="width: auto; margin: 15px 10px">
            <img src=" <?php echo "$Images" ?>" class="card-img-top">
            <div class="card-body">
                                                <p class="card-text" style="height:72px">
                                                    <b><?php echo "$Song" ?></b>
                                                    <br>Artist: <?php echo"$Artist" ?>
                                                    <br>File: <?php echo"$File" ?>
                                                    <br>Price: <?php echo"$Price" ?>
                                                </p>
            </div>
        </div>
    </div>   
         <?php
     }
    }
    ?>
  </div>
  </div>