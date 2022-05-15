<?php
include ('header.php');
$search = "";
if (!empty($_GET['Search']))
{
    $search = $_GET['Search'];
}
?>
<div class="container" style="margin-top: 20px">
<div class="row">
    <?php
if (!empty($search))
{
    $rs = mysqli_query($connect, "SELECT * FROM song WHERE song.Song LIKE '%{$search}%' ");
    while ($row = mysqli_fetch_assoc($rs))
    {
        $Song = $row['Song'];
        $Artist = $row['Artist'];
        $Images = $row['images'];
        $File = $row['File'];
        $Note = $row['Note'];
        $Price = $row['Price'];
?>
    <div class="col-xl-4 col-lg-6 col-md-12">
        <div class="box_card" style="width: auto; margin: 15px 10px">
            <img src=" <?php echo "$Images" ?>" class="card-img-top">
            <div class="card-body">
                <p class="card-text" style="height:72px; color: whitesmoke">
                    <b><?php echo "$Song" ?></b>
                    <br> <?php echo "$Artist" ?>
                </p>
                <audio class="ado" controls controlsList="nodownload" ontimeupdate="MyAudio(this)">
                    <source src="audio/<?php echo "$File" ?>" type="audio/mpeg">
                </audio>
                <a href="song-detail.php?Song=<?php echo "$Song" ?>"><button>Buy Now</button></a>
            </div>
        </div>
    </div>   
         <?php
    }
}
?>
  </div>
  </div>
  <?php
include ('footer.php');
?>
