<?php
require 'db-connect.php'
    ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <title>更新</title>
</head>

<body>
    <h1>レシピ更新</h1>
    <table>
        <tr>
            <th>レシピ名</th>
            <th>説明</th>
            <th>材料</th>
        </tr>
        <?php
        $pdo = new PDO($connect, USER, PASS);
        foreach ($pdo->query('select * from Recipes') as $row) {
            echo '<form action="updateend.php" method="post">';
            echo '<tr>';

            echo '<td><input type="text" name="title" value="', $row['title'], '"></td>';

            echo '<td><input type="text" name="descriptions" value="', $row['descriptions'], '"></td>';
            echo '<td><input type="text" name="ingredients" value="', $row['ingredients'], '"></td>';
            echo '<td><div class="td2"><input type="submit" value="更新"></div></td>';
            echo '<tr>';
            echo '</form>';
            echo "\n";
        }
        ?>
    </table>
    <a href="index.php">一覧へ戻る</a>
</body>

</html>