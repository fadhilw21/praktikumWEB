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
    if (empty($_SESSION['login']) && empty($_SESSION['signup'])) {
        header("Location: login.php");
        exit;
    }
    ?>
    <div class="navbar">
        <div class="option">
            <ul>
                <li><a href="logout.php" class="nav-link logout">Log out</a></li>
                <li><a href="#" class="nav-link">Profile</a></li>
                <li><a href="item-list.php" class="nav-link">Item list</a></li>
                <li><a href="#" class="nav-link">Home</a></li>
            </ul>
        </div>
        <div class="title">
            Veteran Stock
        </div>
    </div>
    <?php
    require 'database.php';
    if (isset($_POST["submit"])) {
        if (addItem($_POST) > 0) {
            echo "
                <script>
                    alert('Your list added successfull!');
                </script>
            ";
            header("Location: item_list.php");
            exit;
        } else {
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
        <form method="POST" action="" enctype="multipart/form-data">
            <input type="hidden" name="user_id" value="<?= "$user_id" ?>">
            <br><br>
            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td><label for="name">Shoes</label></td>
                    <td> </td>
                    <td><input class="form-control" type="text" name="name" placeholder="Name Shoes"></td>
                </tr>
                <tr>
                    <td><label for="price">Price</label></td>
                    <td> </td>
                    <td><input class="form-control" type="text" name="price" placeholder="0"></td>
                </tr>
                <tr>
                    <td><label for="available_size">Available Size &nbsp;</label></td>
                    <td> </td>
                    <td><select class="form-control" name="size" id="size" required>
                            <option value="39">39</option>
                            <option value="40">40</option>
                            <option value="41">41</option>
                            <option value="43">42</option>
                            <option value="43">43</option>
                            <option value="44">44</option>
                            <option value="45">45</option>
                        </select></td>
                </tr>
                <tr>
                    <td><label for="image">Image</label></td>
                    <td> </td>
                    <td><input class="form-control" type="file" name="image" id="image" required></td>
                </tr>
            </table>
            <button class="btn btn-success" type="submit" name="submit">ADD</button>
        </form>
    </div>
</body>

</html>