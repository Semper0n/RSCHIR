<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Ассортимент</title>
</head>
<body>
<div class="container">
    <header class="d-flex justify-content-center py-3">
      <ul class="nav nav-pills">
        <li class="nav-item"><a href="index.html" class="nav-link active" aria-current="page">Главная</a></li>
        <li class="nav-item"><a href="products.php" class="nav-link">Ассортимент</a></li>
        <li class="nav-item"><a href="menu.php" class="nav-link">Меню</a></li>
        <li class="nav-item"><a href="about.html" class="nav-link">О нас</a></li>
      </ul>
    </header>
  </div>
<h1 class="text-center">Доступные виды блюд</h1>
<ol>
    <?php
    $mysqli = new mysqli("my-sql", "user", "password", "appDB");
    $result = $mysqli->query("SELECT name FROM products");
    foreach ($result as $row){
        echo "<li>{$row['name']}</li>";
    }
    ?>
</ol>
</body>
</html>