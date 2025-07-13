<?php
  require "./articles/articlesFunctions.php";
  $articles = articlesQuery("SELECT * FROM articles");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Musholla Al-Yaqin</title>
</head>
<body>
  <h1>Musholla Al-Yaqin</h1>

  <div>
    <p>Artikel</p>
    <table border="1" cellspacing="0" cellpading="10">
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Gambar</th>
        <th>Konten</th>
        <th>Tanggal Terbit</th>
        <th>Aksi</th>
      </tr>
      <?php foreach($articles as $index => $article) : ?>
        <tr>
          <td><?= $index + 1 ?></td>
          <td><?= $article["title"] ?></td>
          <td><img src="./img/articles-image/<?= $article["image"] ?>" alt="<?= $article["title"] ?>" width="100"></td>
          <td><?= $article["content"] ?></td>
          <td><?= $article["published_date"] ?></td>
          <td>
            <a href="">Edit</a>
            |
            <a href="">Hapus</a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>
</body>
</html>