<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8" />
  <title>レシピ一覧</title>
</head>
<?php require 'db-connect.php'?>
<body>
  <h1>レシピ一覧</h1>
  <table>
    <form action="update.php" method="post">
      <form action="delete.php" method="post">
        <tr>
          <th>レシピ名</th>
          <th>レシピ説明</th>
          <th>材料</th>
          <th>削除</th>
        </tr>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        foreach ($pdo->query('select * from Recipes') as $row) {
          echo '<tr>';
          echo '<td>', $row['title'], '</td>';
          echo '<td>', $row['descriptions'], '</td>';
          echo '<td>', $row['ingredients'], '</td>';
          echo '<td>','<a href="delete.php?title=',$row['title'],'">削除</a>' , '</td>';
          echo '</tr>';
          echo "\n";
        }
        ?>
  </table>
  <div class="link">
    <a href="Registration.php">新規登録</a>
    <a href="update.php">更新</a>
  </div>
  </form>
  </form>
</body>

</html>