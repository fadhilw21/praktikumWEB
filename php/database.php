<?php
$hostname = "localhost";
$user = "root";
$pass = "";
$db = "prakweb_item_list";
$conn = mysqli_connect($hostname, $user, $pass, $db);

function checkLogin($data)
{
    session_start();
    global $conn;
    // var_dump($data);
    $username = $data["username"];
    $password = $data["password"];
    $query = "SELECT * FROM user_account WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        // var_dump($row);
        // var_dump((strcmp($password,$row["password"]) === 0));
        if (password_verify($password, $row["password"])) {
            $_SESSION['username'] = $username;
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row["id"];
            return true;
        };
    };

    return false;
}
function insertUserAccount($data)
{
    session_start();
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $password = mysqli_real_escape_string($conn, htmlspecialchars($data["password"]));
    $valpassword = mysqli_real_escape_string($conn, htmlspecialchars($data["valpassword"]));
    $email = htmlspecialchars($data["email"]);

    $checkEmail = mysqli_query($conn, "SELECT * FROM user_account WHERE email = '$email'");
    $checkUsername = mysqli_query($conn, "SELECT * FROM user_account WHERE username = '$username'");

    if (mysqli_fetch_assoc($checkEmail)) {
        echo "
            <script>
                alert('The email already exist');
            </script>
        ";
        return false;
    } else if (mysqli_fetch_assoc($checkUsername)) {
        echo "
            <script>
                alert('The username already exist');
            </script>
        ";
        return false;
    }

    if ($password !== $valpassword) {
        echo "
            <script>
                alert('No Matching Password');
            </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    $_SESSION['signup'] = true;
    $_SESSION['username'] = $username;
    $query = "INSERT INTO user_account VALUES
    ('','$email','$username','$password')";
    $result = mysqli_query($conn, $query);
    $result = mysqli_query($conn, "SELECT id FROM user_account WHERE username = '$username'");
    $row = mysqli_fetch_assoc($result);
    $_SESSION['user_id'] = $row["id"];

    return mysqli_affected_rows($conn);
}

function addItem($data)
{
    global $conn;
    $user_id = $data["user_id"];
    $name = htmlspecialchars($data["name"]);
    $price = htmlspecialchars($data["price"]);
    $available_size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);

    // image
    $image = uploadImage();

    $query = "INSERT INTO sneaker VALUES ('',$user_id,'$name',$price,'$available_size','$image')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function uploadImage()
{

    $imageName = $_FILES['image']['name'];
    $imageSize = $_FILES['image']['size'];
    $tmpName = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if ($error === 4) {
        echo "
            <script>
                alert('Please choose an image');
            </script>
        ";
        return false;
    }

    $exFileValid = ['jpg', 'jpeg', 'png'];
    $exFile = explode('.', $imageName);
    $exFile = strtolower(end($exFile));

    if (!in_array($exFile, $exFileValid)) {
        echo "
            <script>
                alert('Your file must be an image');
            </script>
        ";
        return false;
    }

    if ($imageSize > 5000000) {
        echo "
            <script>
                alert('Your image size too large');
            </script>
        ";
        return false;
    }

    $imageName = uniqid();
    $imageName .= '.';
    $imageName .= $exFile;

    move_uploaded_file($tmpName, '../image/' . $imageName);

    return $imageName;
}

function updateItem($data)
{
    global $conn;
    $id = $data["id"];
    $user_id = $data["user_id"];
    $name = htmlspecialchars($data["name"]);
    $price = htmlspecialchars($data["price"]);
    $available_size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);

    $query = "UPDATE sneaker SET
            name = '$name',
            price = $price,
            available_size = '$available_size'
            WHERE id = '$id' AND user_id = '$user_id'
            ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
// include 'connection.php';
// $no_pelanggan = $_POST['no_pelanggan'];
// $nama = $_POST['nama'];
// $email = $_POST['email'];
// $krisan = $_POST['krisan'];
// $query = mysqli_query($connection, "UPDATE pelanggan SET nama='$nama',
// email='$email',krisan='$krisan' where no_pelanggan='$no_pelanggan'")
//     or die(mysqli_error($connection));
// if ($query) {
//     echo "Proses update berhasil, ingin lihat hasil
// <a href='coba-output.php'> disini </a>";
// } else {
//     echo "Proses Input gagal";
// }
// 
