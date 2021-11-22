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
        if(empty($_SESSION['login']) && empty($_SESSION['signup'])){
            header("Location: login.php");
            exit;
        }
    ?>
    <?php 
        require 'database.php';
        $id = $_GET["id"];
        $result = mysqli_query($conn,"SELECT * FROM sneaker WHERE id = $id");
        $data = mysqli_fetch_assoc($result);

        if(isset($_POST["submit"])){
            if(updateItem($_POST) > 0){
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
    ?>
    <div class="navbar">
        <div class="navbar-box">
            <h1 class="name-bar">VETERAN SNEAKER SHOPPING</h1>
        </div>
    </div>
    <div class="form-edit">
        <form method="POST" action="">
        <input type="hidden" name="id" value="<?= $data["id"] ?>">
        <input type="hidden" name="user_id" value="<?= $data["user_id"] ?>">
            <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td><label for="name">Shoes</label></td>
                    <td> : </td>
                    <td><input type="text" name="name" value="<?= $data["name"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="price">Price</label></td>
                    <td> : </td>
                    <td><input type="text" name="price" value="<?= $data["price"]; ?>"></td>
                </tr>
                <tr>
                    <td><label for="available_size">Available Size</label></td>
                    <td> : </td>
                    <td><select name="size" id="size" required aria-placeholder="<?= $data["available_size"]; ?>">
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
            <button class="btn" type="submit" name="submit" >Update</button>
        </form>
    </div>    


</body>
</html>