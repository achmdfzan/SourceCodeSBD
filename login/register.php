<?php
session_start();
include('function.php');

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan');
            document.location.href = 'index.php';
        </script>
    ";
    } else {
        echo mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Register | Arsip Buku</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="signin.css">
</head>

<body class="text-center">
    <form class="form-signin" action="" method="post">
        <img class="mb-4" src="icons8-the-flash-sign.svg" alt="" width="86" height="86">

        <h1 class="h3 mb-3 font-weight-normal">SI MBKM</h1>

        <label for="email" class="sr-only">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email" required autofocus>

        <label for="password" class="sr-only">Password</label>
        <input style="margin-bottom: 0;" type="password" name="password" id="password" class="form-control" placeholder="Password" required>

        <label for="password" class="sr-only">Confirm Password</label>
        <input type="password" name="password2" id="password" class="form-control" placeholder="Confirm Password" required>

        <label for="nim" class="sr-only">NIM</label>
        <input type="nim" name="nim" id="nim" class="form-control" placeholder="NIM" required>


        <!-- <div class="checkbox mb-3">
            <label for="remember">
                <input type="checkbox" name="remember" id="remember"> Remember Me
            </label>
        </div> -->
        <button class="btn btn-lg btn-primary btn-block mt-4" type="submit" name="register">Register</button>
        <p class="mt-1">
            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="./index.php">
                Punya Akun
            </a>
        </p>
        <?php if (isset($error)) : ?>
            <script>
                alert('kolom tidak boleh kosong!')
            </script>
        <?php endif; ?>
        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
    </form>
</body>

</html>