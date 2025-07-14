<?php 
  require "articlesFunctions.php";

  if (isset($_POST["submit"])) {
    if (addArticle($_POST) > 0) {
      echo "<script>
        alert('Artikel berhasil ditambahkan');
        document.location.href = 'index.php';
      </script>";
    } else {
      echo "<script>
        alert('Artikel gagal ditambahkan');
        document.location.href = 'index.php';
      </script>";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Artikel</title>
</head>
<body>
  <h1>Tambah  Artikel</h1>
  <a href="index.php">Kembali</a>

  <form action="" method="post" enctype="multipart/form-data">
    <div>
      <label for="title">Judul Artikel</label>
      <input type="text" id="title" name="title" placeholder="Masukkan judul artikel" required>
    </div>
    <div>
      <label for="content">Konten Artikel</label>
      <textarea id="content" name="content" placeholder="Masukkan kontent artikel" required></textarea>
    </div>
    <div>
      <label for="image">Gambar Artikel</label>
      <input type="file" id="image" name="image">
    </div>
    <div>
      <label for="published_date">Tanggal Terbit Artikel</label>
      <input type="date" id="published_date" name="published_date" required>
    </div>
    <button type="submit" name="submit">Tambah Artikel</button>
  </form>
</body>
</html>