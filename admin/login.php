<?php
    include '../config/koneksi.php';
    session_start();

    $sql = mysqli_query($koneksi, "SELECT * FROM admin");
    $data = mysqli_fetch_array($sql);
    $aksess = $data['hak_akses'];
    
    if(isset($_SESSION['user'])) {
        if ($aksess == 'Administrator') {
          header("location: administrator.php");
        }
        else {
          header("location: index.php");
        }
    }   
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
    <style>
      .login {
        background: #FF00AD;
        border-color: grey; 
        border-radius: 8px; 
        font-weight: bold;
      }
      button:hover {
        background:black;
      }
    </style>

    <title>LOGIN | SISTEM INFORMASI PENGADUAN HUKUM</title>
  </head>

  <body style="background: #CC00FF">

    <div> 
      <div class="row text-center text-light p-3" style="background: #A50973;">
        <dv class="col">
          <h3>Sistem Informasi Geografis Toko Oleh-Oleh Khas Sultra</h3>
        </dv>
      </div>
    </div>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
               
              <div class="row">
                <div class="col-lg">
                  <div class="p-5">
                    <div class="text-center">
                      <div class="text-light p-1 login" style="border-radius: 5px">
                        <h4>LOGIN ADMIN</h4>
                      </div>
                    </div>
                    <hr>
                    <form class="user" method="post" action="../config/proses-login.php">
                      <div class="form-group row">
                        <div class="col">
                          <input type="text" class="form-control text-center" name="username" required="" id="username" placeholder="admin">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col">
                          <input type="password" class="form-control text-center" name="password" required="" id="password" placeholder="123">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="col">
                          <select class="custom-select form-control" name="akses" id="akses" style="text-align-last: center;">
                            <option>--Pilih Hak Akses--</option>
                            <?php 

                            include '../config/koneksi.php';
                            $data = mysqli_query($koneksi, "SELECT * FROM admin ORDER BY hak_akses");
                            while ($d = mysqli_fetch_array($data)) {
                              $akses = $d['hak_akses'];
                              echo '<option value="'.$akses.'">'.$akses.'</option>';
                             ?>
                            
                          <?php } ?>
                        </select>
                        </div>
                      </div>
                      <button type="submit" class="btn btn-dark btn-user btn-block p-2 login">
                        Login
                      </button>
                    </form>
                    
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    
    <footer class="text-light text-center">
      &copy; 2020
    </footer>

    <script src="../js/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="../js/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="../js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>