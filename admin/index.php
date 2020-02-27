<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(-1);

// Подключение к базе данных
require_once('../app/db.php');

//подключение файла с функциями
require_once("../app/function.php");

//подключение файла с константами подключения к БД
require_once("../app/config.php");

//массив со всеми данными по всем книгам
$books = getBooks();


// Условие для редактирования книги
if(isset($_GET['edit_id'])) {
	$book = getBooksById($_GET['edit_id']);
}

// Выбор из БД списка авторов
$authors = getAuthors();

// Выбор из БД списка жанров
$genres = getGenres();

// Добавление новой книги
if(isset($_POST['send']) and !empty($_POST['name']) and !empty($_POST['price']) and !empty($_POST['genre_id']) and !empty($_POST['author_id']) and !empty($_POST['fullDesc'])) {
       //dump($_POST);die;
       addBook();
       header('Location: index.php');
}

// Редактирование книги
if(isset($_POST['save']) and !empty($_POST['title']) and !empty($_POST['price']) and !empty($_POST['shortDesc']) and !empty($_POST['fullDesc'])) {
      // dump($_POST);
       editBook();
       header('Location: index.php');
}

// Подключение шаблона админки
include('views/layout.php');
?>