<?php
$success = 0;
$user = 0;
$invalid = 0;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $email = $_POST['email'];
  $cpassword = $_POST['cpassword'];
  $salt = "asktfxwvrwu*&%$#!";
  $pepper = "AAFQYCSfafQCFxMBJs)+=_:'?<$#";
  $hash = password_hash($password, PASSWORD_DEFAULT);
  
  $sql = "SELECT * from `registration` WHERE username = '$username'";

  $result =mysqli_query($con,$sql);
  if($result) {
      $num=mysqli_num_rows($result);
      if($num>0) {
          $user=1;
      }else{
          if($password===$cpassword){

    $kalimat = str_replace(".", "Xx", $_POST['email']);
    $key = 5;

    for ($i = 0; $i < strlen($kalimat); $i++) {
    $kode[$i] = ord($kalimat[$i]); //rubah ASCII ke desimal
    $b[$i] = ($kode[$i] + $key) % 256; //proses enkripsi
    $c[$i] = chr($b[$i]); //rubah desimal ke ASCII
    }
    $hsl = "";

    $kalimat;

    for ($i = 0; $i < strlen($kalimat); $i++) {
      $c[$i];
      $hsl = $hsl . $c[$i];
    }

    $key = 2;
    $isi = $hsl;
    $isis = "";

    for($i=0;$i<strlen($isi);$i++) // menghitung panjang striing
      {
      $kode[$i]=ord($isi[$i]); // rubah ASII ke desimal
      $b[$i]=($kode[$i] - $key ) % 256; // proses dekripsi Caesar
      $c[$i]=chr($b[$i]); //rubah desimal ke ASCII
      }
      // echo "kalimat ciphertext : ";
      for($i=0;$i<strlen($isi);$i++)
      {
        //echo
       $isi[$i];
      }
      echo "<br>";
      // echo "hasil dekripsi =";
      for ($i=0;$i<strlen($isi);$i++)
      {
        //echo
       $c[$i];
      $isis = $isis . $c[$i];
      }

      $nisn = $_POST['nisn'] . $isis . $hsl;
      $aman = md5($nisn);
  
      $sql = "insert into `registration` (username, password, nisn, email) values ('$username', '$hash', '$aman', '$email')";

      $result=mysqli_query($con,$sql);
      if ($result) {
          $success = 1;
          echo "<script>alert('Registrasi berhasil! <br>
        );
          
          </script>";
      }
      }else{
          $invalid = 1;
      }
      }

      
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>

  <?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Ups! Maaf...</strong> Username sudah ada, silakan coba yang lain <button type="button" class="btn-close" aria-label="Close"> <span aria-hidden="true">&times;</span> </button> </div> ';
  }
  ?>

<?php
  if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert"> <strong>Ups! Maaf...</strong>Password tidak sama, Silakan masukkan lagi!
      <button class="btn-close" data-dismiss="alert" aria-label="Close"> 
        <span aria-hidden="true">&times;</span> 
      </button> 
    </div> ';
  }
?>

<?php
  if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert"> <strong>Berhasil,</strong> Kamu telah terdaftar!
    <button class="btn btn-light" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"><a href="login.php">login</a></span> <br>
    </button> </div> ';
  }
  ?>
  <section class="vh-150" style="background-color: #53ACF8;">
  <div class="container py-5 h-150">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="bg.png"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

              <form action="index.php" method="POST">

    <div class="divider d-flex align-items-center my-4">
    <p class="text-center fw-bold mx-3 mb-0">REGISTER DISINI</p>
    </div>

<!-- username input -->
<div class="form-outline mb-1">
<label class="form-label" for="form3Example3">Username</label>
  <input type="text" id="form3Example3" class="form-control form-control-lg" name="username"
    placeholder="Masukkan Username" />
</div>

<div class="form-outline mb-1">
<label class="form-label" for="form3Example3">Email</label>
  <input type="email" id="form3Example3" class="form-control form-control-lg" name="email"
    placeholder="Masukkan Email" />
</div>

<div class="form-outline mb-1">
<label class="form-label" for="form3Example3">NIS</label>
  <input type="text" id="form3Example3" class="form-control form-control-lg" name="nisn"
    placeholder="Masukkan NIS" />
</div>

<!-- Password input -->
<div class="form-outline mb-1">
<label class="form-label" for="form3Example4">Password</label>
  <input type="password" id="form3Example4" class="form-control form-control-lg" name="password"
    placeholder="Masukkan Password" />
</div>

<div class="form-outline mb-1">
<label class="form-label" for="form3Example4">Konfirmasi Password</label>
  <input type="password" id="form3Example4" class="form-control form-control-lg" name="cpassword"
    placeholder="Konfirmasi Password" />
</div>

<div class="text-center text-lg-start mt-3 pt-3">
  <button type="submit" class="btn btn-primary btn-lg"
    style="padding-left: 2.5rem; padding-right: 2.5rem;">Register</button>
    <p class="small fw-bold mt-2 pt-0 mb-0">Sudah Memiliki Akun? <a href="login.php"
      class="link-danger">Login</a></p>
</div>

</form>
</section>
  </body>
</html>