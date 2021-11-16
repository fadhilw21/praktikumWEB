<!DOCTYPE html>
<?php
session_start();
if (empty($_SESSION['username'])) {
    header("location:login.php?pesan=belum_login");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
    <style type="text/css">
        @import "coba-output.-style.css";
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@500&family=Permanent+Marker&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="navbar">
        <div class="navbar-box">
            <h1 class="name-bar">VETERAN SNEAKER SHOPPING</h1>
        </div>
    </div>
    <br>
    <div>
        <h2 class="veteran">Veteran Stock's Details</h2>
    </div>
    <div class="tabel-database">
        <table class="table table-dark table-hover database">
            <tr class="tr-atas">
                <td>Shoes</td>
                <td>Price</td>
                <td>Available Size</td>
                <td>option</td>

            </tr>

            <?php
            include 'connection.php';
            $query = mysqli_query($connection, "SELECT * from pelanggan");
            while ($data = mysqli_fetch_array($query)) { ?>
                <tr>
                    <td> <?php echo $data['nama']; ?> </td>
                    <td> <?php echo $data['email']; ?> </td>
                    <td> <?php echo $data['krisan']; ?> </td>
                    <td> <a href=coba-edit.php?no_pelanggan=<?php echo $data['no_pelanggan']; ?>>edit</a>
                        <a href=delete.php?no_pelanggan=<?php echo $data['no_pelanggan']; ?>>hapus</a>
                    </td>


                </tr>

            <?php } ?>
        </table>
    </div>
    <div class="menu-logout admin-bawah ">
        <?php
        echo $_SESSION['username'];
        ?>
        <a class="dropdown-item logout" href="logout.php">Logout</a>
    </div>


</body>

</html>