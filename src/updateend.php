<?php
require 'db-connect.php'
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>商品登録完了</title>
</head>
<body>
    <?php
    $pdo = new PDO($connect, USER, PASS);
    $sql = $pdo->prepare('update Recipes set title=?, descriptions=?, ingredients=? where title=?');
    if (empty($_POST['title'])) {
        echo 'レシピ名を入力して下さい。';
    } else if (empty($_POST['descriptions'])) {
        echo '説明を入力して下さい。';
    } else if (empty($_POST['ingredients'])) {
        echo '材料を入力して下さい。';
    } else   if ($sql->execute([($_POST['title']), $_POST['descriptions'], $_POST['ingredients'],$_POST['title']])) {
        echo '更新に成功しました。';
    } else {
        echo '更新に失敗しました。';
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
            echo '<td>', $row['title'], '</td>';
            echo '<td>', $row['descriptions'], '</td>';
            echo '<td>', $row['ingredients'], '</td>';
            echo '</tr>';
            echo "\n";
          }

        ?>
    </table>
    <form action="Registration.php" method="post">
        <button type="submit">追加画面へ</button>
    </form>
    <form action="update.php" method="post">
        <button type="submit">更新画面へ戻る</button>
    </form>
    <form action="index.php" method="post">
        <button type="submit">商品一覧画面へ戻る</button>
    </form>
</body>

</html>