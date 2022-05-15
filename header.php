<?php
session_start();
 include('connect.php')
 ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="images/favicon-1.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer"
    /><link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <title>TuneSource Music</title>
</head>

<body>
    <h1> edit by nhanh 1</h1>
 <h2> Thêm dòng để người khác pull về </h2>
 
 <h1> Demo Conflict </h1>
 
    <!-- Header -->
    <div class="container-fluid">
        <header>
            <div class="row">
                <div class="col-lg-3 col-md-3 ">
                    <!-- Logo -->
                    <a class="logogo" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><h1><span style="color: #fbead7; font-family: 'Pacifico', cursive; ">TuneSource <i class="fas fa-bars" style="text-align: center"></i></span></h1></a>
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <!-- Search -->
                <form action="search.php" method="GET">
                    <div class="box_search">
                        <i class="fas fa-search" aria-hidden="true"></i>
                        <input type="search" name="Search" >
                    </div>
                </form>
                </div>
                <div class="col-lg-3 col-md-3 ">
                <!-- Display -->
                    <!--Login -->
                    <a href="#login"><button><span style="color: #fbead7; font-family: 'Pacifico', cursive; ">
                                                <!-- test -->
                                                <?php                                      
                                                include('connect.php');
                                                if(isset($_SESSION['Username'])) 
                                                {
                                                    $Username = $_SESSION['Username'];
                                                    if($_SESSION['Username'])
                                                    {                                              
                                                        echo "$Username";
                                                    }
                                                    else
                                                    {
                                                        echo "$Username";

                                                    }
                                                }   
                                                else
                                                {
                                                    echo "Login";
                                                }   
                            ?>
                            <!-- test -->
                    </span></button></a>
                    <div class="dialog overlay" id="login">
                        <div class="dialog-body">
                            <h3 style="text-align: center">Login
                            </h3>
                            <a class="dialog-close-btn" href="#">&times;</a>
                            <form class="diglog-form" action="#" method="POST">
                                <table>
                                    <tr>
                                        <th>Username</th>
                                        <th><input type="text" placeholder="Enter Username" name="Username"></th>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <th><input type="password" placeholder="Enter Password" name="Password"></th>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><button name="login">Signin</button></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><a href="#signup">Create a account</a></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                    <!-- --------------------------------------------------------- -->
                    <?php
                        include ('connect.php');
                        if(isset($_POST['login']))
                        {
                            $Username = $_POST['Username'];
                            $Password = $_POST['Password'];
                            $sql = "SELECT * FROM users WHERE Username = '$Username' and Password = '$Password' ";
                            $result = mysqli_query($connect, $sql);
                            $row_user = mysqli_fetch_array($result);
                            $check_login = mysqli_num_rows($result);
                            if($check_login > 0){
                                echo "
                                <script>alert('Welcome $Username');
                                    window.open('index.php', '_self');</script>
                                ";
                                $_SESSION['Username'] = $Username;
                                $_SESSION['Role'] = $row_user['Role'];
                            }else {
                                echo "<div class='alert alert-danger' role='alert' style='text-align:center'>
                                                    Login Unsuccessfull ! Try Again!
                                                </div>";
                            }
                    }

                    ?>
                    <!-- --------------------------------------------------------- -->

                    <!-- Signup -->
                    <div class="dialog overlay" id="signup">
                        <div class="dialog-body">
                            <h3 style="text-align: center">Signup</h3>
                            <a class="dialog-close-btn" href="#">&times;</a>
                            <form class="diglog-form" action="#" method="POST">
                                <table>
                                    <tr>
                                        <th>Username</th>
                                        <th><input type="text" placeholder="Enter your username" name="Username"></th>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <th><input type="password" placeholder="Enter your password"  name="Password"></th>
                                    </tr>
                                    <tr>
                                        <th>Birthday</th>
                                        <th><input type="date" placeholder="Enter your birthday"  name="DoB"></th>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <th><input type="email" placeholder="Enter your email"  name="Email"></th>
                                    </tr>
                                    <tr>
                                        <th>Phone Number</th>
                                        <th><input type="number" min="0900000001" placeholder="Enter your phone number"  name="Phonenumber"></th>
                                    </tr>
                                    <tr>
                                        <td><input type="checkbox" style="height: 15px;"></td>
                                        <td>Share my registration data with <br> TuneSource's content providers for <br> marketing purposes.</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><a href="#login"><button name="signup">Create Account</button></a></td>
                                    </tr>                                   
                                </table>
                                <!-- ---------------------------------------------------------------- -->
                                <?php
                                    include ('connect.php');
                                    if(isset($_POST['signup']))
                                    {
                                        $Username = $_POST['Username'];
                                        $Password = $_POST['Password'];
                                        $DoB = $_POST['DoB'];
                                        $Email = $_POST['Email'];
                                        $Phonenumber = $_POST['Phonenumber'];
                                        $Role = $_POST['Role'];
                                        $sql = " INSERT INTO `users`(`Username`, `Password`, `DoB`, `Email`, `Phonenumber`, `Role`) VALUES ('$Username','$Password','$DoB','$Email','$Phonenumber','Standard') ";
                                        $signup = mysqli_query($connect,$sql);
                                        if($signup){
                                                echo "<div class='alert alert-success' role='alert'>
                                                Sign-Up Successfully 
                                                <script>alert('Welcome $Username, Login Now!');
                                                window.open('index.php#login', '_self');</script>
                                                    </div>
                                                ";
                                        }
                                        else{
                                                echo "Error!";
                                        }
                                    }
                                ?>
                                <!-- ---------------------------------------------------------------- -->
                            </form>
                        </div>
                    </div>                  
                </div>
            </div>
            <!-- MENU HIDDEN -->
            <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Welcome TuneSource, <hr> <?php
                        include ("connect.php");
                        if(isset($_SESSION['Username'])){
                            $Username = $_SESSION['Username']; 
                            $sql = "Select * from `users` where Username = '$Username'";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($result))
                            {
                                $Role = $row['Role']; 
                            echo " <span style='font-family: Be Vietnam Pro, sans-serif; font-size: 18px'>Username: $Username</span> <br> "; 
                            echo " <span style='font-family: Be Vietnam Pro, sans-serif; font-size: 18px'>Status: <span style='color: Green;'> $Role </span></span>";
                            
                        }
                    ?></h5>
                    <!-- ----------------------------------------------------------------------------------- -->
                    <h6><?php  } ?></h6>  
                    <!-- ----------------------------------------------------------------------------------- -->
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                        </div>
                        <div class="offcanvas-body">
                            <a href="index.php"> <button ><i class="fas fa-home"></i> Home</button></a>
                            <?php                                      
                                include('connect.php');
                                if(isset($_SESSION['Username']))
                                {
                                    if($Role == "Admin")
                                    {
                                      echo "                            
                                      <a href='#myProfile'><button><i class='fas fa-user-circle'></i> Profile</button></a>
                                      <a href='playlist.php'><button><i class='bx bxs-playlist' ></i> Playlist</button></a>
                                      <a href='./Logout.php'><button><i class='fas fa-sign-out-alt'></i> Log Out</button></a>";  
                                    }
                                    elseif($Role == "Standard")
                                    {
                                      echo "                            
                                      <a href='#myProfile'><button><i class='fas fa-user-circle'></i> Profile</button></a>
                                      <a href='./Logout.php'><button><i class='fas fa-sign-out-alt'></i> Log Out</button></a>";  
                                    }
                                    elseif($Role == "Premium")
                                    {
                                      echo "                            
                                      <a href='#myProfile'><button><i class='fas fa-user-circle'></i> Profile</button></a>
                                      <a href='playlist.php'><button><i class='bx bxs-playlist' ></i> Playlist</button></a>
                                      <a href='./Logout.php'><button><i class='fas fa-sign-out-alt'></i> Log Out</button></a>";  
                                    }
                                }
                            ?>

                        </div>
            </div>
            <!-- MENU HIDDEN -->

                            <!-- <a href="#myProfile"><button><i class="fas fa-user-circle"></i> Profile</button></a>
                            <a href="#"><button><i class='bx bxs-playlist' ></i> Playlist</button></a>
                            <a href="./Logout.php"><button><i class="fas fa-sign-out-alt"></i> Log Out</button></a> -->


            <!-- DIALOG PROFILE -->
                    <div class="dialog overlay" id="myProfile">
                        <div class="dialog-body">
                            <h3 style="text-align: center">My Profile</h3>
                            <a class="dialog-close-btn" href="#">&times;</a>
                            <form class="diglog-form" action="#" method="POST">
                                <table>
                                    <?php                                      
                                        include('connect.php');
                                        if(isset($_SESSION['Username'])){
                                            $Username = $_SESSION['Username']; 
                                            $sql = "Select * from users where username = '$Username'";
                                            $result = mysqli_query($connect, $sql);
                                            if($Role == "Admin")
                                            {                                              
                                                while ($row = mysqli_fetch_array($result))
                                                {
                                                    $Username = $row['Username'];
                                                    $Password = $row['Password'];
                                                    $DoB = $row['DoB'];
                                                    $Email = $row['Email'];
                                                    $Phonenumber = $row['Phonenumber'];
                                                    $Role = $row['Role'];  
                                                    echo"
                                                    <tr>
                                                        <th>My Profile : </th>
                                                        <td colspan='2'>$Username</td>
                                                    </tr>
                                                    <tr>
                                                        <th>My Birthday : </th>
                                                        <td colspan='2'>$DoB</td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Email : </th>
                                                        <td colspan='2'>$Email</td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Phone Number : </th>
                                                        <td colspan='2'>$Phonenumber</td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Type Account : </th>
                                                        <td colspan='2'>$Role</td> 
                                                    </tr>
                                                    <tr>
                                                        <th> <a class='afakebutton' href='manage--profile.php'> Manage Profile </a></th>
                                                        <th> <a class='afakebutton' href='manage--song.php'> Manage Song </a></th>
                                                        <th> <a class='afakebutton' href='manage--artist.php'> Manage Artist </a></th>
                                                    </tr>
                                                    ";
                                                }
                                            }
                                            elseif($Role == "Standard")
                                            {
                                                while ($row = mysqli_fetch_array($result))
                                                {
                                                    $Username = $row['Username'];
                                                    $Password = $row['Password'];
                                                    $DoB = $row['DoB'];
                                                    $Email = $row['Email'];
                                                    $Phonenumber = $row['Phonenumber'];
                                                    $Role = $row['Role'];                                                                                                                                                       
                                                ?>
                                                    <tr>
                                                        <th>My Profile : </th>
                                                        <td><?php echo "$Username" ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>My Birthday : </th>
                                                        <td><?php echo "$DoB" ?></td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Email : </th>
                                                        <td><?php echo "$Email" ?></td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Phone Number : </th>
                                                        <td><?php echo "$Phonenumber" ?></td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Type Account : </th>
                                                        <td><?php echo "$Role" ?></td> 
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"><button type="button" onclick="location.href='#updatePremium'">Update Premium</button></th>
                                                    </tr>
                                                
                                            <?php } }

                                                    else{

                                                        while ($row = mysqli_fetch_array($result))
                                                        {
                                                            $Username = $row['Username'];
                                                            $Password = $row['Password'];
                                                            $DoB = $row['DoB'];
                                                            $Email = $row['Email'];
                                                            $Phonenumber = $row['Phonenumber'];
                                                            $Role = $row['Role'];                                                                                                                                                       
                                                        ?>
                                                        <tr>
                                                        <th>My Profile : </th>
                                                        <td><?php echo "$Username" ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>My Birthday : </th>
                                                        <td><?php echo "$DoB" ?></td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Email : </th>
                                                        <td><?php echo "$Email" ?></td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Phone Number : </th>
                                                        <td><?php echo "$Phonenumber" ?></td> 
                                                    </tr>
                                                    <tr>
                                                        <th>Type Account : </th>
                                                        <td><?php echo "$Role" ?></td> 
                                                    </tr>
                                                    <?php }}}?>
                                                    
                                                                             
                                                        
                                </table>
                            </form>
                        </div>
                    </div>
            <!-- DIALOG PROFILE -->
            <div class="dialog overlay" id="updatePremium">
                <div class="dialog-body">
                    <a class="dialog-close-btn" href="#">&times;</a>
                    <h3 style="text-align: center; font-family: 'Pacifico', cursive;">TuneSource Premium</h3>
                    <form method="POST">
                        <h4>Please Choose Plan : </h4>
                       <button onclick="location.href='#pay_1'">One Month</button>
                       <button onclick="location.href='#pay_3'">Three Months</button>
                       <button onclick="location.href='#pay_12'">One Year</button>
                    </form>
                </div>
            </div>
            <div class="dialog overlay" id="pay_1">
                <div class="dialog-body">
                    <h2 style="font-family: 'Pacifico', cursive;">Purchase One Month</h2><a class="dialog-close-btn" href="#">&times;</a><br>
                    <!--  -->
                    <?php
                        include ("connect.php");
                        if(isset($_SESSION['Username'])){
                            $Username = $_SESSION['Username']; 
                            $sql = "Select * from `users` where Username = '$Username'";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($result))
                            {
                                $Role = $row['Role']; 
                            ?>
                            <table>
                                <tr>
                                    <th>Username:</th>
                                    <td><?php echo "$Username" ?></td>
                                </tr>
                                <tr>
                                    <th>Status Account:</th>
                                    <td><?php echo "$Role" ?></td>
                                </tr>
                            </table>
                            <?php }} ?>
                    <!--  -->
                    <div class="Donate">
                        <div class="MOMO">
                            <a href="https://me.momo.vn/Tunnie/nXe0885zEYYXexr"><button type="button"> One Month</button></a>
                            <form method="post">
                                <input type="submit" value="Complete Payment" name="updateUser">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dialog overlay" id="pay_3">
                <div class="dialog-body">
                    <h2 style="font-family: 'Pacifico', cursive;">Purchase Three Months</h2><a class="dialog-close-btn" href="#">&times;</a><br>
                     <!--  -->
                     <?php
                        include ("connect.php");
                        if(isset($_SESSION['Username'])){
                            $Username = $_SESSION['Username']; 
                            $sql = "Select * from `users` where Username = '$Username'";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($result))
                            {
                                $Role = $row['Role']; 
                            ?>
                            <table>
                                <tr>
                                    <th>Username:</th>
                                    <td><?php echo "$Username" ?></td>
                                </tr>
                                <tr>
                                    <th>Status Account:</th>
                                    <td><?php echo "$Role" ?></td>
                                </tr>
                            </table>
                            <?php }} ?>
                    <!--  -->
                    <div class="Donate">
                        <div class="MOMO">
                            <a href="https://me.momo.vn/Tunnie/JxboZZM48BnNagw"><button type="button"> Three Months</button></a>
                            <form method="post">
                                <input type="submit" value="Complete Payment" name="updateUser">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dialog overlay" id="pay_12">
                <div class="dialog-body">
                    <h2 style="font-family: 'Pacifico', cursive;">Purchase One Year</h2><a class="dialog-close-btn" href="#">&times;</a><br>
                     <!--  -->
                     <?php
                        include ("connect.php");
                        if(isset($_SESSION['Username'])){
                            $Username = $_SESSION['Username']; 
                            $sql = "Select * from `users` where Username = '$Username'";
                            $result = mysqli_query($connect, $sql);
                            while ($row = mysqli_fetch_array($result))
                            {
                                $Role = $row['Role']; 
                            ?>
                            <table>
                                <tr>
                                    <th>Username:</th>
                                    <td><?php echo "$Username" ?></td>
                                </tr>
                                <tr>
                                    <th>Status Account:</th>
                                    <td><?php echo "$Role" ?></td>
                                </tr>
                            </table>
                            <?php }} ?>
                    <!--  -->
                    <div class="Donate">
                        <div class="MOMO">
                            <a href="https://me.momo.vn/Tunnie/WPe999qMY7RYeLy"><button type="button"> One Year</button></a>
                            <form method="post">
                                <input type="submit" value="Complete Payment" name="updateUser">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<!-- UPDATE -->
<!-- window.open('index.php', '_self'); -->
<?php
                                    include ('connect.php');
                                    if(isset($_SESSION['Username']))
                                    {
                                        $Username = $_SESSION['Username']; 
                                        if(isset($_POST['updateUser']))
                                        {
                                            $sql_updateUser = " UPDATE `users` SET `Role`='Premium' WHERE Username = '$Username' ";
                                            $updateUser = mysqli_query($connect,$sql_updateUser);
                                            if($updateUser)
                                            {
                                                echo "<div class='alert alert-success' role='alert'>
                                                        <h5 class='alert-heading'>Successfully</h5>
                                                    </div>
                                                    <script>window.open('index.php', '_self');</script>
                                                ";
                                            }
                                            else {
                                                echo "<div class='alert alert-danger' role='alert' style='text-align:center'>
                                                    Update Premium Unsuccessfully! Try Again!
                                                </div>";
                                            }
                                        }
                                    }
                				?>
<!-- UPDATE -->


<!--  -->
<script>var alertList = document.querySelectorAll('.alert')
alertList.forEach(function (alert) {
  new bootstrap.Alert(alert)
})
var myAlert = document.getElementById('myAlert')
var bsAlert = new bootstrap.Alert(myAlert)
</script>
<!--  -->




            </div>
        </header>



