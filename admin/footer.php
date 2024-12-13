        </div>

        <div class="col-sm-3 p-0 clearfix" style="background: #FF00AD;">
          <div class="list-group" style="font-weight: bold; background: #FF00AD;">
            <li href="#" class="list-group-item list-group-item-action active text-center" style="background: #6b0055; color: white; border-color: white">
              <?php echo $ambil2 ?>
            </li>
            <a href="<?php echo $home; ?>" class="list-group-item list-group-item-action menu">HOME</a>
            <?php 
              if($ambil2 == 'Administrator') {
                echo '<a href="kab-kota.php" class="list-group-item list-group-item-action menu">DATA KAB/KOTA</a>';
              }
             ?>
            
            <a href="oleh-oleh.php" class="list-group-item list-group-item-action menu">DATA OLEH-OLEH</a>
            <a href="toko.php" class="list-group-item list-group-item-action menu">DATA TOKO</a>
            <a href="ubah-pass.php" class="list-group-item list-group-item-action menu">UBAH PASSWORD</a>
            <a href="../config/keluar.php" class="list-group-item list-group-item-action menu">KELUAR</a>
          </div>
        </div>
</div>
      </div>
      <div class="row text-light text-center p-2" style="background: #A50973">
        <div class="col-sm">
          &copy; 2020
        </div>
      </div>
    </div>

    <script src="../js/jquery-3.3.1.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>