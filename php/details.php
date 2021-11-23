<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        @import "../css/details.css";
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Permanent+Marker&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Details</title>
</head>

<body>
    <?php
    require 'database.php';
    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM sneaker WHERE id = $id");
    $data = mysqli_fetch_assoc($result);
    ?>
    <div class="navbar">
        <div class="option">
            <ul>
                <li><a href="logout.php" class="nav-link logout">Log out</a></li>
                <li><a href="#" class="nav-link">Profile</a></li>
                <li><a href="item_list.php" class="nav-link">Item list</a></li>
                <li><a href="#" class="nav-link">Home</a></li>
            </ul>
        </div>
        <div class="title">
            Veteran Stock
        </div>
    </div>
    <br><br>
    <!--<table border="1" cellpadding="5" cellspacing="0" style="
  height: 100px;
  width: 100px;
  position: absolute;
  margin-left: 30vw;">
        <tr>
            <td><img src="../image/<?= $data["image"] ?>" alt="Shoes Image"></td>
        </tr>
        <tr>
            <td><?= $data["name"] ?></td>
        </tr>
        <tr>
            <td><?= $data["price"] ?></td>
        </tr>
        <tr>
            <td><?= $data["available_size"] ?></td>
        </tr>
    </table> -->
    <div>
        <div style="margin: 30px 30vw 20px 40vw; font-family: 'Montserrat', sans-serif; font-size: 40px;">
            <?= $data["name"] ?>
        </div>
        <div class="image-detail" style="margin: 30px 30vw 20px 32vw">
            <img src="../image/<?= $data["image"] ?>" alt="Shoes Image">
        </div>

        <div class="shoes-details">
            <div style="margin: 30px 30vw 20px 40vw; font-family: 'Montserrat', sans-serif; font-size: 40px;">
                Price : &dollar;<?= $data["price"] ?>
            </div>
        </div>
    </div>
</body>

</html>