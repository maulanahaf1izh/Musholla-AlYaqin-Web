<?php
  $conn = mysqli_connect("localhost", "root", "", "musholla-alyaqin");

  function articlesQuery($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $articles = [];
    while ($article = mysqli_fetch_assoc($result)) {
      $articles[] = $article;
    }

    return $articles;
  }

  function addArticle($data) {
    global $conn;
    $title = htmlspecialchars($data["title"]);
    $image = imageUpload();
    if (!$image) {
      return false;
    }
    $content = htmlspecialchars($data["content"]);
    $published_date = htmlspecialchars($data["published_date"]);

    $query = "INSERT INTO articles VALUES('', '$title', '$image', '$content', '$published_date')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
  }

  function imageUpload() {
    $imageName = $_FILES["image"]["name"];
    $imageSize = $_FILES["image"]["size"];
    $error = $_FILES["image"]["error"];
    $imageTmpDir = $_FILES["image"]["tmp_name"];

    if ($error === 4) {
      return "default.jpg";
    }

    $validImageExtension = ["jpg", "jpeg", "png"];
    $imageExtension = explode(".", $imageName);
    $imageExtension = strtolower(end($imageExtension));
    
    if (!in_array($imageExtension, $validImageExtension)) {
      echo "<script>
        alert('Yang Anda upload bukan gambar bertipe jpg/jpeg/png');
      </script>";

      return false;
    }

    if ($imageSize > 2000000) {
      echo "<script>
        alert('Gambar Anda terlalu besar');
      </script>";

      return false;
    }

    $newImageName = uniqid();
    $newImageName .= ".";
    $newImageName .= $imageExtension;
    move_uploaded_file($imageTmpDir, "../img/articles-image/" . $newImageName);

    return $newImageName;
  }
?>