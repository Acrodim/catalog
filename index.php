<?php

require_once('app/config.php');
require_once('app/function.php');
require_once('app/db.php');

// Разбор URL для ЧПУ
$url = parseUrl($_SERVER['REQUEST_URI']);
$view = ($url[0]) ? $url[0] : 'main';

$genres = getGenres();

$authors = getAuthors();

// Цикл подтягивания нужной страницы в шаблон
switch($view){
    case 'main':
        $books = getBooks();
    break;
    case 'book':
        $book = getBooksById($url[1]);
        // Отправка информации о заказе на почту
        if(!empty($_POST['name'] and !empty($_POST['email']) and isset($_POST['send']))) {
            $message = "ФИО клиента: " . $_POST['name'] . ". E-mail клиента: " . $_POST['email'] . ". Заказ: " . "Название: " . $_POST['title'] . ". Кол-во: " . $_POST['qty'] . "шт. Сумма: " . 
            $_POST['price'] * $_POST['qty'] . "грн";
            mail('acrodim@gmail.com', 'Новый заказ.', $message);
        }
   
    break;
    case 'genre':
        // Вывод книг по выбранному жанру
        $book_genre = getBooksByGenre($url[1]);
    break;
    case 'author': 
        // Вывод книг по выбранному автору
        $book_author = getBooksByAuthor($url[1]);
    break;

    // Вывод 404 страницы
    default: $view = page404();

}

// Подключение шаблона
require_once('app/views/layout.php');