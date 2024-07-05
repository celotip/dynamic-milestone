<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Page</title>
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
                <h3 class="mb-5">Send us a message!</h3>
                <img src="./ar-logo.png" alt="logo" id="logo">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" placeholder="Name" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email address" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Phone" id="phone" name="phone" required>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" placeholder="Message" id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Send Message</button>
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

    if (isset($_POST['submit'])){
        $name = $_POST['name'] ; 
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $stmt = $koneksi->prepare("INSERT INTO contact (name, email, phone, message) VALUES (?, ?, ?, ?)");
    
    // Bind parameters
    $stmt->bind_param("ssss", $name, $email, $phone, $message);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo "Pesan anda telah kami terima";
    } else {
        echo "Pesan gagal dikirim: " . $stmt->error;
    }
    
    // Close the statement
    $stmt->close();
    } 
    ?>

</body>
</html>


