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
        <div class="navbar-box">
            <h1 class="name-bar">VETERAN SNEAKER SHOPPING</h1>
        </div>
    </div>

    <table border="0" cellpadding="5" cellspacing="0">
        <tr>
            <td><img src="../image/<?= $data["image"]?>" alt="Shoes Image" ></td>
        </tr>
        <tr>
            <td><?= $data["name"]?></td>
        </tr>
        <tr>
            <td><?= $data["price"]?></td>
        </tr>
        <tr>
            <td><?= $data["available_size"]?></td>
        </tr>
    </table>
</body>
</html>