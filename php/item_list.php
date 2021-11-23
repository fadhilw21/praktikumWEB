<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['login']) && empty($_SESSION['signup'])) {
    header("location: login.php");
    exit;
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Item</title>
    <style type="text/css">
        @import "../css/item_list.css";
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Permanent+Marker&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
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
    <br>
    <div>
        <h2 class="veteran">Veteran Stock's Details</h2>
    </div>
    <div class="tabel-database">
        <?php
        require 'database.php';
        $user_id = $_SESSION['user_id'];
        $query = mysqli_query($conn, "SELECT * FROM sneaker WHERE user_id = $user_id");
        $isFill = mysqli_fetch_array($query);

        if (empty($isFill["name"])) : ?>
            <p>--- No Item Selected ---</p>
        <?php else : ?>
            <table class="table table-hover database" id="display-list">
                <tr class="tr-atas">
                    <th>No</th>
                    <th>Shoes</th>
                    <th>Price</th>
                    <th>Size</th>
                    <th>Option</th>

                </tr>
                <?php
                $i = 1;
                $query = mysqli_query($conn, "SELECT * FROM sneaker WHERE user_id = $user_id");
                while ($data = mysqli_fetch_assoc($query)) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td> <a href="details.php?id=<?= $data["id"]; ?>" class="goto-details shoes" style="color: black;" title="See Details">
                                <?php echo $data["name"]; ?>
                            </a>
                        </td>
                        <td> &dollar;<?php echo $data["price"]; ?> </td>
                        <td> <?php echo $data["available_size"]; ?> </td>
                        <!--<td> <img src='../image/<?php echo $data["image"] ?>' width='130' height='100' /> </td>-->
                        <td> <a href=edit_item.php?id=<?= $data["id"]; ?> onclick="return confirm(" Are you sure?")>edit</a> |
                            <a href=delete.php?id=<?= $data["id"]; ?> onclick="return confirm(" Are you sure?")>hapus</a>
                        </td>
                    </tr>
                <?php $i++;
                endwhile; ?>
            <?php endif; ?>
            </table>
    </div>
    <div class="menu-logout admin-bawah ">
        <a class="btn add-item btn-success" href="add_item.php?user_id=<?= $user_id ?>">Add Item</a> <br>
        <p>
            Username : <?= $_SESSION['username']; ?>
        </p>
    </div>


</body>

</html>