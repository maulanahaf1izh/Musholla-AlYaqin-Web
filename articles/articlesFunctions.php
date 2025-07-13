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
?>