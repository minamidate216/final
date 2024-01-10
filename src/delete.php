<?php
require 'db-connect.php'
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title>商品削除</title>
  </head>
  <body>
    <h1>商品を削除しました</h1>
    <?php
    $pdo=new PDO($connect, USER, PASS);
    $sql=$pdo->prepare('delete from Recipes where title=?');
    if($sql->execute([$_GET['title']])){
        echo '削除に成功しました.';
    } else {
        echo '削除に失敗しました。';
    }
?>
    <br><hr><br>
    <table>
        <tr>
          <th>商品名</th>
          <th>商品説明</th>
          <th>材料</th>
        </tr>
        <?php
        foreach ($pdo->query('select * from Recipes') as $row) {
          echo '<tr>';
          echo '<td>', $row['title'],'</td>';
          echo '<td>', $row['descriptions'], '</td>';
          echo '<td>', $row['ingredients'], '</td>';
          echo '</tr>';
          echo "\n";
        }
        ?>
  </table>
    <a href="index.php">商品一覧へ戻る</a>
  </body>
</html>
