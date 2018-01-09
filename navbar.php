<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
      <a class="navbar-brand" href="#">IKLC</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample03">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
            <li class="nav-item">
              <a class="nav-link" href="login.php">Login</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-md-0" action="index.php" method="get">
          <input class="form-control" type="text" placeholder="Search" id="search-grup" name="grup">
            <input type="submit" value="cari" class="btn btn-primary">
        </form>
          <?php
          if (!isset($_SESSION['kodeA'])){
            echo 
         '<a href="logout.php" class="btn btn-primary ml-1">'.'Login'.'</a>';
          }
          else {
            echo 
         '<a href="logout.php" class="btn btn-primary ml-1">'.'Logout'.'</a>';  
          }
          ?>
      </div>
</nav>