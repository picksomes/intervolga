<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Студенты</title>
    <style>
     table {
        border-collapse: collapse;
    }
    table td,  table th {
        border: 1px solid black;
    }
    </style>
</head>

<body>
<table>
<tr>
<td></td>
<?php foreach ($subjects as $subject): ?>
<td><?=$subject;?></td>
<?php endforeach;?>
</tr>
<?php foreach ($sortData as $key => $value): ?>
<tr>
  <td> <?=$key?></td>
    <?php
foreach ($subjects as $subject) {
    echo "<td>";
    foreach ($value as $key_ => $value_) {
        if ($subject == $key_) {
            echo $value_;
        }
    }
    echo "</td>";
}
?>
</tr>
<?php endforeach;?>
</table>
</body>
</html>