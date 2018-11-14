<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/style.css">
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="js/btn.js"></script>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<div id="zatemnenie">
    <div id="okno" >
    <form enctype='multipart/form-data' action='?option=main&action=addTicket' method='POST' id="add_ticket" class="form-group">
        <input type='hidden' name='id' value="0">
        <h2>Заголовок тикета:</h2><br>
        <input type='text' name='title' class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите заголовок тикета"></p>
        <h2>Описание проблемы</h2><br>
        <textarea name='disc' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        <select name='cat' class="form-control">
            <option value="todo">todo</option>
            <option value="doing">doing</option>
            <option value="done">done</option>
        </select>
        <input type='submit' name='button' value='Сохранить' onclick="hideWindow()" class="btn btn-primary btn-lg" role="button"> 
    </form>
      <div id="comments"></div>
      <a onclick="hideWindow()" class="close btn btn-primary btn-lg" role="button">Закрыть окно</a>
    </div>
</div>
    <section class="header">
        <div class="container">
            <div class="header__middle">
                <div class="header__title">Cписок задач</div>
                <div class="header__menu">
                    <ul>
                        <li>
                            <a href="?option=main">Список задач</a>
                        </li>
                        <li>
                            <a onclick="showWindow();">Создать задачу</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class="main">
        <div class="container">
            <div class="main__middle">