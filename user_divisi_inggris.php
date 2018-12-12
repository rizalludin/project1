<?php  
    session_start();  
      
    if(!$_SESSION['email'])  
    {  
      
        header("Location: login.php");
    } 

    $user = $_SESSION['user'];
      
?>  
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Divisi Inggris | Sistem Informasi FOLAFO</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="user.php">SIFOFO</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="user.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user_about.php">About</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Divisi
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="user_divisi_inggris.php">Divisi Inggris</a>
                <a class="dropdown-item" href="user_divisi_prancis.php">Divisi Prancis</a>
                <a class="dropdown-item" href="user_divisi_jepang.php">Divisi Jepang</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="forum.php">Forum</a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo $user;?>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
                <a class="dropdown-item" href="profile.php">Profile</a>
                <a class="dropdown-item" href="gantipassword.php">Ganti Password</a>
                <a class="dropdown-item" href="logout.php">Logout</a>   
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">
    <div class="row">
      <div class="col-sm-10">
        <br>
        <h3>ENGLISH DIVISION</h3>
        <p align="justify">English is the International language which is already to be mastered by everyone in this age.
          Almost all aspects of life already need even require that any person can master the English language, but
          there are still many people who find them difficult for various reasons. By utilizing the
          technology development, information and communications nowadays, the author intends to create an
          english education website with waterfall method so that everyone can get the knowledge and the
          teaching of the English language easily and inexpensively without having to come in state institutions,
          formal or non- formal, also independent for web users because they do not have to come face to face
          with a tutor or teacher. In addition, the presence of English education web, everyone can learn English
          anywhere and anytime. This English education website contains subject matter of elementary school to
          middle school covering grammar, tenses and vocab with a grain of text, images, videos, articles and
          practice questions. Hopefully, by the this English education web, the ability of web users, especially in
        Indonesia could be better.</p>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-10">
        <form action="" method="get">
          <div class="input-group col-md-5 col-md-offset-7">
            <span class="input-group-addon" id="basic-addon1"><span class="glyphicon glyphicon-calendar"></span></span>
            <select type="submit" name="Angkatan" class="form-control" onchange="this.form.submit()">
              <option>Pilih angkatan ..</option>
              <?php 
              include 'include/config.php';
              ?>
              <?php
              $pil=mysqli_query($conn,"select distinct Angkatan from tbluser where Divisi = 'Divisi Inggris' order by Angkatan desc");
              while($p=mysqli_fetch_array($pil)){
                ?>
                <option><?php echo $p['Angkatan'] ?></option>
                <?php
              }
              ?>  

            </select>
          </div>
          <br>
          <?php 
          if(isset($_GET['Angkatan'])){
            $angkatan = mysqli_real_escape_string($conn,$_GET['Angkatan']);
            ?><?php
          }else{
            $ag="angkatan_post_ig.php";
          }
          ?>
          <?php 
          if(isset($_GET['Angkatan'])){
            echo "<h4> Data Anggota Sesuai Angkatan  <a style='color:blue'> ". $_GET['Angkatan']."</a></h4>";
          }
          ?>
          <table class="table">
            <tr>
              <th>No</th>
              <th>Angkatan</th>
              <th>Nama Anggota</th>
              <th>NIM</th>
              <th>Divisi</th>
              <th>Jurusan</th>            
            </tr>
            <?php 
            if(isset($_GET['Angkatan'])){
              $angkatan=mysqli_real_escape_string($conn,$_GET['Angkatan']);
              $ssg=mysqli_query($conn,"select * from tbluser where Angkatan like '$angkatan' order by Angkatan desc");
            }else{
              $ssg=mysqli_query($conn,"select * from tbluser where Divisi = 'Divisi Inggris' order by Angkatan desc");
            }
            $no=1;
            while($b=mysqli_fetch_array($ssg)){

              ?>
              <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $b['Angkatan'] ?></td>
                <td><?php echo $b['Username'] ?></td>
                <td><?php echo $b['NIM'] ?></td>
                <td><?php echo $b['Divisi'] ?></td>
                <td><?php echo $b['Jurusan'] ?></td>            
              </tr>

              <?php 
            }
            ?>
            <?php 
            ?>
          </tr>
        </table>
      </div>
    </div>
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>