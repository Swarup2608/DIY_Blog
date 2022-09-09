<!DOCTYPE html>
<html lang="en">
<?php 
    $id = $_GET['id']; 
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DIY Blog - <?php echo $id; ?></title>
  <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">
</head>

<body class="light-theme">

  <!--- #HEADER --->

  <header>

    <div class="container">

      <nav class="navbar">

        <a href="#" class="logo">
          DIY Blog
        </a>

        <div class="btn-group">

          <button class="theme-btn theme-btn-mobile light">
            <ion-icon name="moon" class="moon"></ion-icon>
            <ion-icon name="sunny" class="sun"></ion-icon>
          </button>

          <button class="nav-menu-btn">
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

        <div class="flex-wrapper">

          <ul class="desktop-nav">

            <li>
              <a href="index.php" class="nav-link">Home</a>
            </li>

            <li>
              <a href="#" class="nav-link">About Me</a>
            </li>

            <li>
              <a href="#" class="nav-link">Contact</a>
            </li>

          </ul>

          <button class="theme-btn theme-btn-desktop light">
            <ion-icon name="moon" class="moon"></ion-icon>
            <ion-icon name="sunny" class="sun"></ion-icon>
          </button>

        </div>

        <div class="mobile-nav">

          <button class="nav-close-btn">
            <ion-icon name="close-outline"></ion-icon>
          </button>

          <div class="wrapper">

            <p class="h3 nav-title">Main Menu</p>

            <ul>
              <li class="nav-item">
                <a href="index.php" class="nav-link">Home</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">About</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">Contact</a>
              </li>
            </ul>

          </div>

          <div>

            <p class="h3 nav-title">Topics</p>

            <ul>
              <li class="nav-item">
                <a href="#" class="nav-link">Database</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">Accessibility</a>
              </li>

              <li class="nav-item">
                <a href="#" class="nav-link">Web Performance</a>
              </li>
            </ul>

          </div>

        </div>

      </nav>

    </div>

  </header>





  <main>

    <!--#HERO SECTION-->

    <div class="hero">

      <div class="container">

        <div class="left">

          <h1 class="h1">
            Hi, Blogs about <b><?php echo $id; ?></b>.
            <br>
          </h1>

          <div class="btn-group">
            <a href="#" class="btn btn-primary">Contact Us</a>
            <a href="#" class="btn btn-secondary">About Us</a>
          </div>

        </div>

        <div class="right">

          <div class="pattern-bg"></div>
          <div class="img-box">
            <img src="images/hero.png" alt="Julia Walker" class="hero-img">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
          </div>

        </div>

      </div>

    </div>





    <div class="main">

      <div class="container">

        <!-- BLOG SECTION-->

        <div class="blog">

          <h2 class="h2">Latest Blog Post</h2>

          <div class="blog-card-group">

            <?php 
              include("./php/config.php");
              $sql = mysqli_query($db,"SELECT  * FROM blog WHERE type='$id'");
              if(mysqli_num_rows($sql) > 0){
                while($row = mysqli_fetch_assoc($sql)){
            ?>
            <div class="blog-card">

              <div class="blog-card-banner">
                <img src="images/<?php echo $row['image'] ?>" width="250" class="blog-banner-img">
              </div>

              <div class="blog-content-wrapper">

              <a href="taged.php?id=<?php echo $row['type'] ?>" class="blog-topic text-tiny"><?php echo $row['type'] ?></a>

                <h3>
                <a href="./blog.php?id=<?php echo $row['id'] ?>" class="h3">
                  <?php echo $row['title'] ?>
                  </a>
                </h3>

                <p class="blog-text">
                  <?php
                  $content = $row['content'];
                  $dis = implode(' ', array_slice(explode(' ', $content), 0, 40));
                  echo $dis;
                ?> ....
                </p>

                </div>

              </div>

              <?php
                  
                }
                    }
                  ?>
            </div>
        </div>

        <div class="aside">
          <div class="topics">
            <h2 class="h2">Topics</h2>
            <a href="taged.php?id=Physics" class="topic-btn">
              <div class="icon-box">
                <ion-icon name="rocket-outline"></ion-icon>
              </div>
              <p>Physics</p>
            </a>
            <a href="taged.php?id=Chemistry" class="topic-btn">
              <div class="icon-box">
                <ion-icon name="server-outline"></ion-icon>
              </div>
              <p>Chemistry</p>
            </a>
            <a href="taged.php?id=Biology" class="topic-btn">
              <div class="icon-box">
                <ion-icon name="accessibility-outline"></ion-icon>
              </div>
              <p>Biology</p>
            </a>
          </div>
          <div class="tags">
            <h2 class="h2">Tags</h2>
            <div class="wrapper">
              <?php
                  $sqlt = mysqli_query($db,"SELECT DISTINCT * FROM tags LIMIT 10");
                  if(mysqli_num_rows($sqlt) > 0){
                    while($row = mysqli_fetch_assoc($sqlt)){
              ?>
                <a href="tags.php?id=<?php echo $row['id']; ?>" class="hashtag">#<?php echo $row['tag'] ?></a> 
              <?php
                    }
                  }
              ?>
            </div>
          </div>
          <div class="contact">
            <h2 class="h2">Let's Talk</h2>
            <div class="wrapper">
              <p>
                Do you want to learn more about experiments, You can contact us through.
              </p>
              <ul class="social-link">
                <li>
                  <a href="#" class="icon-box discord">
                    <ion-icon name="logo-discord"></ion-icon>
                  </a>
                </li>
                <li>
                  <a href="#" class="icon-box twitter">
                    <ion-icon name="logo-twitter"></ion-icon>
                  </a>
                </li>
                <li>
                  <a href="#" class="icon-box facebook">
                    <ion-icon name="logo-facebook"></ion-icon>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="newsletter">
            <h2 class="h2">Newsletter</h2>
            <div class="wrapper">
              <p>
                Subscribe to our newsletter to be among the first to keep up with the latest updates.
              </p>
              <form action="#">
                <input type="email" name="email" placeholder="Email Address" required>
                <button type="submit" class="btn btn-primary">Subscribe</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  
  <script src="js/script.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
