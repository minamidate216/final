<?php
require 'db-connect.php'
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>登録完了</title>
</head>

<body>
<table>
        <tr>
          <th>レシピ名</th>
          <th>レシピ説明</th>
          <th>材料</th>
        </tr>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('insert into Recipes(`title`, `descriptions`, `ingredients`) 
    VALUES (?,?,?)');
    if (empty($_POST['title'])) {
        echo '商品名を入力して下さい。';
    } else if (empty($_POST['descriptions'])) {
        echo '商品説明を入力して下さい。';
    } else if (empty($_POST['ingredients'])) {
        echo '材料を入力して下さい。';
    } else if ($sql->execute([$_POST['title'], $_POST['descriptions'], $_POST['ingredients']])) {
        echo '<font color="red">追加に成功しました。</font>';
    } else {
        echo '<font color = "red">追加に失敗しました。</font>';
    }
    ?>

    <br><br><br>
    <table>
        <tr>
            <th>レシピ名</th>
            <th>説明</th>
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
    <form action="Registration.php" method="post">
        <button type="submit">登録画面へ戻る</button>
    </form>
    <form action="index.php" method="post">
        <button type="submit">一覧画面へ戻る</button>
    </form>
</body>

</html>