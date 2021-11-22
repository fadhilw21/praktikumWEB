<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
        @import "../css/login.css";
        @import url('https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap');
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <?php
        require 'database.php';
        if(isset($_POST["submit"])){
            // var_dump(checkLogin($_POST));
            if(checkLogin($_POST)){
                echo "
                    <script>
                        alert('Berhasil login');
                    </script>
                ";
                // var_dump($_SESSION['username']); 
                header("Location: item_list.php");
                exit;
            }
            // TODO : upload image
            $error = true;

            if($error) {
                // echo "
                //     <script>
                //         alert('wrong password and username');
                //     </script>
                // ";
            }
        };
    ?>


    <div class="navbar">
        <div class="navbar-box">
            <h1 class="name-bar">VETERAN SNEAKER SHOPPING</h1>
        </div>
    </div>
    <div class="box-login">
        <div class="inside-box-login">
            <h1 id="login-title">LOGIN</h1>
            <div class="login-form">
                <form method="POST" action="">
                    <div class="mb-3 row login-username">
                        <label for="inputUsername" class="form-label">Username</label>
                        <div class="col-sm-10 inputUsername">
                            <input type="text" class="form-control" id="inputUsername" name="username" required>
                        </div>
                    </div>
                    <div class="mb-3 row login-password">
                        <label for="inputPassword" class="form-label">Password</label>
                        <div class="col-sm-10 inputPassword">
                            <input type="password" class="form-control" id="inputPassword" name="password" required>
                        </div>
                    </div>
                    <div class="signup">
                        <p>Don't have account? <a href="signup.php">Sign Up</a></p>
                    </div>
                    <button type="submit" name="submit" class="btn btn-secondary">Login</button>

                </form>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p>
            <span>&#169; 2021 Copyright to 123200112 x 123200160 all reserved</span>
        </p>
    </div>
</body>

</html>