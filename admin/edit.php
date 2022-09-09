<?php 
  include('../php/config.php');
  $id = $_GET['id'];
  $sql = mysqli_query($db,"SELECT * FROM blog where id='$id'");
  $row = mysqli_fetch_assoc($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>DIY Blog - Add Blog</title>
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
    <main class="form">
        <div class="wrapper">
            <div class="title">
                Edit Form
            </div>
            <div class="msg"></div>
            <form class="form">
              <input type="hidden" value='<?php echo $id ?>' name='id'>
               <div class="inputfield">
                  <label>Title </label>
                  <input type="text" class="input" placeholder="Enter the Title" value="<?php echo $row['title']; ?>" name='title'>
               </div>  
                
              <div class="inputfield">
                  <label>Enter Content</label>
                  <textarea class="textarea" placeholder="Enter the Content" name='content'><?php echo $row['content'] ?></textarea>
               </div> 
              
              <div class="inputfield">
                <input type="submit" value="Submit" class="btn">
              </div>
            </form>
        </div>	
    </main>
    
    </main>
      <script src="./js/main.js"></script>
      <script src="./js/edit.js"></script>
    </body>
  </html>