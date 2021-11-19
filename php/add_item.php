<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style type="text/css">
        @import "../css/add_item.css";
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Permanent+Marker&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <?php 
        session_start();
        if(empty($_SESSION['login']) && empty($_SESSION['signup'])){
            header("Location: login.php");
            exit;
        }
    ?>
    <div class="navbar">
        <div class="navbar-box">
            <h1 class="name-bar">VETERAN SNEAKER SHOPPING</h1>
        </div>
    </div>
    <?php
    require 'database.php';
    if(isset($_POST["submit"])){
        if(addItem($_POST) > 0){
            echo "
                <script>
                    alert('Your list added successfull!');
                </script>
            ";
            header("Location: item_list.php");
            exit;
        }else{
            echo "
                <script>
                    alert('Your list not added!');
                </script>
            ";
        }
    }
    $user_id = $_GET['user_id'];
    // $query = mysqli_query($conn, "SELECT * from sneaker where user_id ");
    // $data = mysqli_fetch_array($query);
    ?>
    <div class="form-edit">
        <form method="POST" action="">
        <input type="hidden" name="user_id" value="<?= "$user_id"?>">
            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td><label for="name">Shoes</label></td>
                    <td> : </td>
                    <td><input type="text" name="name" placeholder="Name Shoes"></td>
                </tr>
                <tr>
                    <td><label for="price">Price</label></td>
                    <td> : </td>
                    <td><input type="text" name="price" placeholder="0"></td>
                </tr>
                <tr>
                    <td><label for="available_size">Available Size</label></td>
                    <td> : </td>
                    <td><input type="text" name="available_size" placeholder="Size"></td>
                </tr>
            </table>
            <button class="btn" type="submit" name="submit" >ADD</button>
        </form>
    </div>
</body>

</html>