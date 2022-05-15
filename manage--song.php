<?php include ('connect.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="admin.css">
    <title>Manage</title>
</head>

<body>
    <header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <a href="index.php#myProfile">
                        <h1>TuneSource</h1>
                    </a>
                </div>
                <div class="col-lg-6">
                    <form action="search-admin.php" method="GET">
                        <div class="search">
                            <input type="search" placeholder="Enter Artist | User | Song you want to search" name="Search">
                        </div>
                    </form>
                </div>
                <div class="col-lg-3">

                </div>
            </div>
        </div>
    </header>
    <div class="content">
    <h1 style="text-align: center; font-family: 'Be Vietnam Pro', sans-serif;">Song Management</h1><br><br><br><br>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="form-song">
                        <div class="song-manage">
                            <?php
include('connect.php');
$sql = "Select * from `song`";
$result = mysqli_query($connect, $sql);
while ($row = mysqli_fetch_array($result))
{
    $Song = $row['Song'];
    $Artist = $row['Artist'];
    $images = $row['images'];
    $File = $row['File'];
    $Note = $row['Note'];
    $Price = $row['Price'];  
?>

                            <div class="card mb-3" style="max-width: 550px;background-color: #20202a">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?php echo"$images" ?>" class="img-fluid rounded-start" style="width:100%; padding: 5px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="background-color: #20202a">
                                            <h5 class="card-title"><?php echo "$Song" ?></h5>
                                            <p class="card-text">Artist: <?php echo "$Artist" ?></p>
                                            <p class="card-text">Price: <?php echo "$$Price" ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
} ?>
                        </div>
                 </div>
            </div>
            <div class="col-lg-6">
            <form action="" method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Song</td>
                                    <td><input type="text" name="Song"></td>
                                </tr>
                                <tr>
                                    <td>Artist</td>
                                    <td>
                                        <select name="Artist">
                                            <?php 
                                                    include ("connect.php");
                                                    $sql = "SELECT * FROM artist";
                                                    $result = mysqli_query($connect, $sql);
                                                    while($row = mysqli_fetch_array($result)){
                                                        $Artist = $row['Artist'];
                                                ?>
                                                <option value="<?php echo $Artist ?>" ><?php echo $Artist ?></option>
                                                <?php } ?>
                                        </select>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Images</td>
                                    <td><input type="file" name="images"></td>
                                </tr>
                                <tr>
                                    <td>File Audio</td>
                                    <td><input type="file" name="File"></td>
                                </tr>
                                <tr>
                                    <td>Note</td>
                                    <td><textarea name="Note" cols="45" rows="10"></textarea></td>
                                </tr>
                                <tr>
                                    <td>Price</td>
                                    <td><input type="number" min="0" name="Price"></td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Insert" name="addSong"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Remove" name="removeSong"></td>
                                    <td><input type="submit" value="Update" name="updateSong"></td>
                                </tr>
                            </table>
                        </form>
            </div>
        </div>
    </div>
<!-- PHP SONG -->
<?php
                                    include ('connect.php');
                                    if(isset($_POST['addSong']))
                                    {
                                        $Song = $_POST['Song'];
                                        $Artist = $_POST['Artist'];

                                        $images = $_FILES['images']['name'];
                                        $images_tmp = $_FILES['images']['tmp_name'];
                                        move_uploaded_file($images_tmp,"images/$images");


                                        $File = $_FILES['File']['name'];
                                        $File_tmp = $_FILES['File']['tmp_name'];
                                        move_uploaded_file($File_tmp,"audio/$File");

                                        $Note = $_POST['Note'];
                                        $Price = $_POST['Price'];

                                        // $images_tmp = $_FILES['image']['tmp_name'];
                                        // move_uploaded_file($File_tmp,"audio/$File");
                                        

                                        $sqladdSong= "INSERT INTO `song`(`Song`, `Artist`, `images`, `File`, `Note`, `Price`) VALUES ('$Song','$Artist','images/$images','$File','$Note','$Price')
                                        ";
                                        $addSong = mysqli_query($connect,$sqladdSong);
                                        if($addSong){
                                                echo " <div class='alert alert-success' role='alert' style='text-align:center'>
                                                            Insert Song Successfully!
                                                        </div>";
                                        }
                                        else{
                                                echo "Error!";
                                        }
                                    }
                				?>
                                <?php
                                    include ('connect.php');
                                    if(isset($_POST['updateSong']))
                                    {
                                        $Song = $_POST['Song'];
                                        $Artist = $_POST['Artist'];

                                        $images = $_FILES['images']['name'];
                                        $images_tmp = $_FILES['images']['tmp_name'];
                                        move_uploaded_file($images_tmp,"images/$images");


                                        $File = $_FILES['File']['name'];
                                        $File_tmp = $_FILES['File']['tmp_name'];
                                        move_uploaded_file($File_tmp,"audio/$File");

                                        $Note = $_POST['Note'];
                                        $Price = $_POST['Price'];
                                        $sql_updateSong = " UPDATE `song` SET `Artist`='$Artist',`images`='images/$images',`File`='$File',`Note`='$Note',`Price`='$Price' WHERE Song = '$Song' ";
                                        $updateSong = mysqli_query($connect,$sql_updateSong);
                                        if($updateSong)
                                        {
                                            echo "<div class='alert alert-success' role='alert' style='text-align:center'>
                                            Update Successfully!
                                                </div>";
                                        }
                                        else {
                                                echo 'Error!';
                                        }
                                    }
                				?>
                                <?php
                                    include ('connect.php');
                                    if(isset($_POST['removeSong']))
                                    {
                                        $Song = $_POST['Song'];
                                        $Artist = $_POST['Artist'];

                                        $images = $_FILES['images']['name'];
                                        $images_tmp = $_FILES['images']['tmp_name'];
                                        move_uploaded_file($images_tmp,"images/$images");


                                        $File = $_FILES['File']['name'];
                                        $File_tmp = $_FILES['File']['tmp_name'];
                                        move_uploaded_file($File_tmp,"audio/$File");

                                        $Note = $_POST['Note'];
                                        $Price = $_POST['Price'];
                                        $sql_removeSong = " DELETE FROM `song` WHERE Song = '$Song'";
                                        $removeSong = mysqli_query($connect,$sql_removeSong);
                                        if($removeSong)
                                        {
                                            echo "<div class='alert alert-info' role='alert'>
                                            Remove Successfully
                                            </div>";
                                        }
                                        else {
                                                echo "Error!";
                                        }
                                    }
                				?>
<!-- PHP SONG -->
</body>
</html>
