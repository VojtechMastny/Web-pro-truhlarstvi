<!DOCTYPE html>
<html lang="cs-cz" dir="ltr">
<head> 
  <meta charset="UTF-8"> 
  <meta id="viewport" name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, initial-scale=1, user-scalable=no">
  <link rel="stylesheet" href="assets/styles/calc.css">
  <link rel="stylesheet" href="assets/styles/style.css">
  
</head>
<body>
    <header>
        <div class="navber">
            <nav class="nav">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="index.php" class="nav-link">Domů</a>
                    </li>
                    <li class="nav-item">
                        <a href="gallery.php" class="nav-link">Galerie</a>
                    </li>
                    <li class="nav-item">
                        <a href="blog.php" class="nav-link">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="calcu.php" class="nav-link">Kalkulace</a>
                    </li>
                    <li class="nav-item">
                        <a href="kontakty.html" class="nav-link">Kontakty</a>
                    </li>
                    <li class="nav-item">
    <?php if (isset($_SESSION['loggedin'])): ?>
        <a href="logout.php" class="nav-link">Odhlásit</a>
    <?php else: ?>
        <a href="login.php" class="nav-link">Přihlášení</a>
    <?php endif; ?>
</li>

                </ul>

                <div class="hamburger">
                    <span class="bar"></span>
                    <span class="bar"></span>
                    <span class="bar"></span>
                </div>
            </nav>
        </div>
    </header>
    
<div class="calc">

  
  <div class="pow">
    <div class="item">    
      <div class="img col-tcenter">
        <img class="lazy" src="assets/images/skrin-1m-l.jpg">
      </div>
      <div class="text">
        <h3 class="tcenter">Vestavěná skříň 1m</h3>
        <p>Cena: <strong>14.920,- Kč</strong></p>
      </div>        
    </div> 
 </div>


 <?php if (isset($_SESSION['loggedin']) && $_SESSION['username'] === 'admin'): ?>
 <div class="container-calc"> 
        <div class="form-box">
            <form id="contactForm" action="post_calc.php" method="POST">
              <div>
            <input type="file" name="fileToUpload" id="fileToUpload">
      
              </div>
                <div>
                    <label for="title">Název:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div>
                    <label for="message">Cena:</label>
                     <input type="number" id="message" name="message" required>
                </div>
                <button type="submit">Odeslat</button>
            </form>
        </div>
    </div>
    <?php endif; ?>
 <script src="assets/scripts/script.js"></script>

 <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer-col">
                    <ul>
                        <li><a href="index.html">Domů</a></li>
                        <li><a href="gallery.html">Galerie</a></li>
                        <li><a href="blog.html">Blog</a></li>
                        <li><a href="kontakty.html">Kontakty</a></li>

                    </ul>
                    <h4>Stanislav malec</h4>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="assets/scripts/script.js"></script>
</html>