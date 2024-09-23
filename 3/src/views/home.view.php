<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-size: 14pt;
        }

        form.add-comment
        {
            display: flex;
            flex-direction: column;
            width: 300px;
            margin: 50px auto;
        }

        form.add-comment input, form.add-comment textarea, form.add-comment button {
            width: 100%;
        }

        div.header-table {
            text-align: center;
            font-size: 2.5rem;
            font-family: Arial, Helvetica, sans-serif;
        }

        table.table-list-comments {
            display: flex;
            flex-direction: column;
            width: 500px;
            margin: 50px auto;
        }


        table.table-list-comments tr:nth-child(odd) td {
        font-size: 1.5em;
        border-bottom: 1px solid red;
        }

        table.table-list-comments tr:nth-child(odd) td:first-child:after{
            content: ":";
        }

        table.table-list-comments button.delete-comment-button{
            font-size: 0.7rem;
            padding: 5px;
            font-family: Arial, Helvetica, sans-serif;
            background-color: antiquewhite;
        }

        div.container-buttons-action{
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        div.container-buttons-action div.update-container form{
            display: flex;
            flex-direction: row;
        }

    </style>
</head>
<body>
<div class="container">
<form class="add-comment" action="add" method="post">
    <label>
    Ваше имя:
    <input type="text" name="name"></label>
    <label>
    Ваше сообщение:
    <textarea name="text" id="">

    </textarea>
    </label>
  <button type="submit">Добавить</button>
</form>
    </div>
<div class="container">
    <div class="header-table">Что пишут</div>
        <table class="table-list-comments">
        <?php foreach ($data as $rowData): ?>
            <tr>
                <td>
                    <?=$rowData['name'];?>
                </td>
            </tr>

            <tr>
                <td>
                    <div><?=$rowData['text'];?></div>
                    <div class="container-buttons-action">
                    <div class="delete-container">
                        <form action="delete" method="post">
                            <input type="hidden" name="id" value="<?=$rowData['id']?>">
                            <button name="buttonDelete" class="delete-comment-button" type="submit">Удалить</button>
                        </form>
                    </div>
                    <div class="update-container">
                        <form action="update" method="post">
                            <input type="hidden" name="id" value="<?=$rowData['id']?>">
                            <textarea name="text"></textarea>
                            <button name="buttonUpdate" class="delete-comment-button" type="submit">Обновить</button>
                        </form>
                    </div>
                    </div>
                </td>
            </tr>
            <?php endforeach;?>
        </table>
</div>
</body>
</html>
