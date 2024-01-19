<?php
require 'db-connect.php'
?>


<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>レシピ登録</title>
  </head>
  <body>
    <h1>レシピ登録</h1>
    <form action="registrationend.php" method="post">
      <div class="form">
        <label for="name">レシピ名</label>
        <input type="text" id="title" name="title" required />
      </div>
      <div class="group">
        <label for="description">レシピ説明</label>
        <textarea id="descriptions" name="descriptions" required></textarea>
      </div>
      <div class="group">
        <label for="ingredients">材料</label>
        <input type="text" id="ingredients" name="ingredients" required />
      </div>
      <button type="submit">登録</button>
    </form>
    <a href="index.php">一覧へ戻る</a>
  </body>
</html>
