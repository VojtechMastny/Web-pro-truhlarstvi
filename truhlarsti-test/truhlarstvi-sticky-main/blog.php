<?php
session_start();
require_once 'Database.php';

$db = new Database();
$stmt = $db->conn->prepare("SELECT * FROM categories");
$stmt->execute();
$categories = $stmt->fetchAll();

?>


<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="assets/styles/style.css">
    <link rel="stylesheet" href="assets/styles/blog.css">
</head>
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
<body>

<div id="result" class ="result">
<?php
    require_once 'Database.php';
    $db = new Database();
    $conn = $db->conn;

    $sql = "SELECT title, content, category_id, date FROM blog ORDER BY date DESC";
  

    $result = $conn->query($sql);

    if ($result && $result->rowCount() > 0) {
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            echo "<div class='result-box'>";
            echo "<div class='title-bg'><h2>" . $row["title"] . "</h2></div>";
            echo "<p>" . $row["content"] . "</p>";
            
            // Fetch category display name from the categories array
            $categoryDisplayName = '';
            foreach ($categories as $category) {
                if ($category['id'] == $row['category_id']) {
                    $categoryDisplayName = $category['display_name'];
                    break;
                }
            }
            
            echo "<p><strong> Kategorie: </strong>" . $categoryDisplayName . "</p>";
            echo "<p><strong> Datum: </strong>" . $row["date"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "No news available";
    }
    ?>
</div>



<?php if (isset($_SESSION['loggedin']) && $_SESSION['username'] === 'admin'): ?>
    <div class="container-blog"> 
        <div class="form-box">
            <form id="contactForm" action="comp.php" method="POST">
                <div>
                    <label for="title">Nadpis:</label>
                    <input type="text" id="title" name="title" required>
                </div>
                <div>
                    <label for="message">Zpráva:</label>
                    <textarea id="message" name="message" required></textarea>
                </div>
                <div>
                    <label for="category">Kategorie:</label>
                    <select id="category" name="category">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $category['id'] ?>"><?= $category['display_name'] ?></option>
                    <?php endforeach; ?>
                    </select>
                </div>
                <button type="submit">Odeslat</button>
            </form>
        </div>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['blog_result'])): ?>
    <?= htmlspecialchars($_SESSION['blog_result']); ?>
    <?php unset($_SESSION['blog_result']); ?>
<?php endif; ?>


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