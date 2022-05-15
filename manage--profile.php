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
    <h1 style="text-align: center; font-family: 'Be Vietnam Pro', sans-serif;">User Management</h1><br><br><br><br>

        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-profile">
                        <div class="admin-manage">
                            <?php
include ('connect.php');
$sql = "Select * from `users`";
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

                            <div class="card mb-3" style="max-width: 500px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="images/User.png" class="img-fluid rounded-start">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body" style="background-color: #20202a">
                                            <h5 class="card-title">#<?php echo "$Username" ?></h5>
                                            <p class="card-text">Birthday: <?php echo "$DoB" ?></p>
                                            <p class="card-text">Email: <?php echo "$Password" ?></p>
                                            <p class="card-text">Role: <small class="text-muted"><?php echo "$Role" ?></small></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
} ?>
                        </div>
                 </div>
            </div>
            <div class="col-lg-3">
            <form action="" method="POST" enctype="multipart/form-data">
                            <table>
                                <tr>
                                    <td>Username</td>
                                    <td><input type="text" name="Username"></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><input type="password" name="Password"></td>
                                </tr>
                                <tr>
                                    <td>Date of Birth</td>
                                    <td><input type="date" name="DoB"></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><input type="text" name="Email"></td>
                                </tr>
                                <tr>
                                    <td>Phone Number</td>
                                    <td><input type="number" name="Phonenumber"></td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td>
                                        <select name="Role" id="Role">
                                            <option value="Standard">Standard</option>
                                            <option value="Premium">Premium</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2"><input type="submit" value="Insert" name="signup"></td>
                                </tr>
                                <tr>
                                    <td><input type="submit" value="Remove" name="removeUser"></td>
                                    <td><input type="submit" value="Update" name="updateUser"></td>
                                </tr>
                            </table>
                        </form>
            </div>
        </div>
    </div>
<!-- PHP USER -->
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
                                        $sql_addUser = " INSERT INTO `users`(`Username`, `Password`, `DoB`, `Email`, `Phonenumber`, `Role`) VALUES ('$Username','$Password','$DoB','$Email','$Phonenumber','Standard') ";
                                        $signup = mysqli_query($connect,$sql_addUser);
                                        if($signup){
                                                echo "  <div class='alert alert-success' role='alert' style='text-align:center'>
                                                            Sign-Up Successfully!
                                                        </div> ";
                                        }
                                        else{
                                                echo "Error!";
                                        }
                                    }
                				?>
                                <?php
                                    include ('connect.php');
                                    if(isset($_POST['removeUser']))
                                    {
                                        $Username = $_POST['Username'];
                                        $Password = $_POST['Password'];
                                        $DoB = $_POST['DoB'];
                                        $Email = $_POST['Email'];
                                        $Phonenumber = $_POST['Phonenumber'];
                                        $Role = $_POST['Role'];
                                        $sql_removeUser = " DELETE FROM `users` WHERE Username ='$Username'";
                                        $removeUser = mysqli_query($connect,$sql_removeUser);
                                        if($removeUser)
                                        {
                                            echo "  <div class='alert alert-success' role='alert' style='text-align:center'>
                                                        Remove Successfully!
                                                    </div>";
                                        }
                                        else {
                                                echo 'Error!';
                                        }
                                    }
                				?>
                                <?php
                                    include ('connect.php');
                                    if(isset($_POST['updateUser']))
                                    {
                                        $Username = $_POST['Username'];
                                        $Password = $_POST['Password'];
                                        $DoB = $_POST['DoB'];
                                        $Email = $_POST['Email'];
                                        $Phonenumber = $_POST['Phonenumber'];
                                        $Role = $_POST['Role'];
                                        $sql_updateUser = " UPDATE `users` SET `Password`='$Password',`DoB`='$DoB',`Email`='$Email',`Phonenumber`='$Phonenumber',`Role`='$Role' WHERE Username = '$Username' ";
                                        $updateUser = mysqli_query($connect,$sql_updateUser);
                                        if($updateUser)
                                        {
                                            echo "<div class='alert alert-success' role='alert' style='text-align:center'>
                                                    Update Successfully!
                                                </div>";
                                        }
                                        else {
                                                echo "Error!";
                                        }
                                    }
                				?>
<!-- PHP USER -->
</body>
</html>
