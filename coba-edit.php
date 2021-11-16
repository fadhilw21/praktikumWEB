<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style type="text/css">
        @import "coba-edit-style.css";
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
    <?php
    include 'connection.php';
    $no_pelanggan = $_GET['no_pelanggan'];
    $query = mysqli_query($connection, "SELECT * from pelanggan where
no_pelanggan='$no_pelanggan'");
    $data = mysqli_fetch_array($query);
    ?>
    <div class="form-edit">
        <form method="POST" action="proses.php">
            <input type="hidden" name="no_pelanggan" value="<?php echo $data['no_pelanggan']; ?>"></br>
            Shoes :<br><input type="text" name="nama" placeholder="Nama" value="<?php echo $data['nama']; ?>"></br>
            Price :<br><input type="text" name="email" placeholder="Email" value="<?php echo $data['email']; ?>"><br>
            Available Size :<br> <textarea name="krisan" placeholder="Pesan" rows="5" cols="25"><?php echo $data['krisan']; ?></textarea><br>
            <input type="submit" name="submit" value="kirim">
        </form>
    </div>
</body>

</html>