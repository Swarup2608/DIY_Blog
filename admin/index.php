<?php 
  include('../php/config.php');

  $sql = mysqli_query($db,"SELECT * FROM blog");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DIY Blog - Admin Page</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"rel="stylesheet"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
  </head>
  <body>
    <nav>
      <div class="logo">
        <i class="bx bx-menu menu-icon"></i>
        <span class="logo-name">DIY Science Blog</span>
      </div>
      <div class="sidebar">
        <div class="logo">
          <i class="bx bx-x menu-icon"></i>
          <span class="logo-name">DIY Science Blog</span>
        </div>

        <div class="sidebar-content">
          <ul class="lists">
            <li class="list">
              <a href="index.php" class="nav-link">
                <i class="bx bx-home-alt icon"></i>
                <span class="link">Dashboard</span>
              </a>
            </li>
            <li class="list">
              <a href="add.html" class="nav-link">
                <i class="bx bx-plus icon"></i>
                <span class="link">Add Blog</span>
              </a>
            </li>
            
          </ul>

          <div class="bottom-cotent">
            
            <li class="list">
              <a href="#" class="nav-link">
                <i class="bx bx-log-out icon"></i>
                <span class="link">Logout</span>
              </a>
            </li>
          </div>
        </div>
      </div>
    </nav>

    <section class="overlay"></section>
  <main>
    <div class="containers">
      <div class="add">
        <a href="add.html" class="btn">Add Blog</a>
      </div>
      <div class="cards">

      <?php 
        if(mysqli_num_rows($sql) > 0){
          while($row = mysqli_fetch_assoc($sql)){
      ?>
        <div class="card">
          <div class="imgBx">
            <img src="../images/<?php echo $row['image']?>" alt="">
          </div>
          <div class="contBx">
            <a href="#" class="h3">
              <?php echo $row['title'] ?>
            </a>  
            <p class="content">
            <?php
              $content = $row['content'];
              $dis = implode(' ', array_slice(explode(' ', $content), 0, 40));
              echo $dis;
            ?> ....
            </p>      
            <div class="btns">
              <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn">Edit</a>
              <a href="./php/remove.php?id=<?php echo $row['id'] ?>" class="btn">Remove</a>
            </div>
          </div>
        </div>
      <?php 
          }
        }
      ?>
      </div>
    
    </div>
    
  </main>
    <script src="./js/main.js"></script>
  </body>
</html>

