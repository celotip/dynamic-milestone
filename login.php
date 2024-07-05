<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style type="text/css">
        .grid-demo{
            width: 65%;
            text-align: center;
            margin-top: 170px;
        }


        #logo {
            width: 150px;
        }

        .btn {
            width: 100%;
        }
    </style>
</head>
<body>
<div class="container grid-demo ">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
             <div class="container">
             <h3 class="mb-5">Please sign in</h3>
                <img src="./ar-logo.png" alt="logo" id="logo">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET">
                    <div class="form-group mt-3">
                        <input type="email" class="form-control" placeholder="Email address" id="email" name="email" required>
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" id="pw" name="pw" required>
                    </div>
                    <input type="checkbox">Remember me <br><br>
                    <button type="submit" class="btn btn-primary" name="submit_post">Sign in</button>
                </form><br><br>
                <p>© 2024</p>
            </div>
        </div>
        <div class="col-md-4"></div>
    </div>
  </div>
  <p class="mt-5">Pesan php:</p>

    <?php
    include "koneksi.php";

    if (isset($_GET['submit_post'])){
        $email = $_GET['email'];
        $pw = $_GET['pw'];

        $stmt = $koneksi->prepare("SELECT name FROM users WHERE email = ? AND password = ?");
    
    // Bind parameters
    $stmt->bind_param("ss", $email, $pw);
    
    if ($stmt->execute()) {
        // Bind result variables
        $stmt->bind_result($name);

        // Fetch the result
        if ($stmt->fetch()) {
            echo "Selamat datang " . $name;
        } else {
            echo "Login gagal, email/password salah.";
        }
    } else {
        echo "Get data gagal: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
    } 
    ?>

</body>
</html>