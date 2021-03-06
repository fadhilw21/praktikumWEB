<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        @import "../css/edit_item.css";
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Permanent+Marker&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit</title>
</head>

<body>
    <?php
    session_start();
    if (empty($_SESSION['login']) && empty($_SESSION['signup'])) {
        header("Location: login.php");
        exit;
    }
    ?>
    <?php
    require 'database.php';
    $id = $_GET["id"];
    $result = mysqli_query($conn, "SELECT * FROM sneaker WHERE id = $id");
    $data = mysqli_fetch_assoc($result);

    if (isset($_POST["submit"])) {
        if (updateItem($_POST) > 0) {
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
    ?>
    <div class="navbar">
        <div class="navbar-box">
            <h1 class="name-bar">VETERAN SNEAKER SHOPPING</h1>
        </div>
    </div>


    <div id="inside-box-login" style="  width: 450px;
  height:420px;
  background-color: black;
  margin-top: 5vw;
  margin-left: 38vw;
  border-radius: 15px;
  position: absolute;">
        <div class="form-edit" style=" margin-left:6vw">
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?= $data["id"] ?>">
                <input type="hidden" name="user_id" value="<?= $data["user_id"] ?>">
                <br><br>
                <table border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <h6 style="color: white;">Shoes</h6>
                        <td><input style="width:6cm; height:1cm" class="form-control" type="text" name="name" value="<?= $data["name"]; ?>"></td>
                    </tr>
                </table>
                <br>
                <table border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <h6 style="color: white;">Price</h6>
                        <td><input style="width:6cm; height:1cm" class=" form-control" type="text" name="price" value="<?= $data["price"]; ?>"></td>
                    </tr>
                </table>
                <br>
                <table border="0" cellspacing="0" cellpadding="5">
                    <tr>
                        <h6 style="color: white;">Available Size</h6>
                        <td><select style="width:6cm; height:1cm" class="form-control" name="size" id="size" required aria-placeholder="<?= $data["available_size"]; ?>">
                                <option value="39">39</option>
                                <option value="40">40</option>
                                <option value="41">41</option>
                                <option value="43">42</option>
                                <option value="43">43</option>
                                <option value="44">44</option>
                                <option value="45">45</option>
                            </select></td>
                    </tr>
                </table>

                <button style="width: 5cm; margin-left:0.8vw; margin-top:1cm" class=" btn btn-danger update col-sm-2 col-form-label" type="submit" name="submit">Update</button>
            </form>
        </div>
    </div>
    <!--<div class="input">
                <div class="shoes col-xs-2">
                    <label class="col-sm-2 col-form-label" for="name">Shoes</label>
                    <input class="form-control shoes-box" type="text" name="name" value="<?= $data["name"]; ?>">
                </div>
                <div class="price col-xs-2">
                    <label class="col-sm-2 col-form-label" for="price">Price</label>
                    <input class="form-control price-box" type="text" name="price" value="<?= $data["price"]; ?>">
                </div>
                <div class="size col-xs-2">
                    <label class="col-sm-2 col-form-label" for="available_size">Available Size</label>
                    <select class="form-control size-box" name="size" id="size" required aria-placeholder="<?= $data["available_size"]; ?>">
                        <option value="39">39</option>
                        <option value="40">40</option>
                        <option value="41">41</option>
                        <option value="43">42</option>
                        <option value="43">43</option>
                        <option value="44">44</option>
                        <option value="45">45</option>
                    </select>
                </div>
            </div>-->

    </div>


</body>

</html>