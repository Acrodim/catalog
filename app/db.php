<?php

// Подключение к БД
function connect() {
    $link = @mysqli_connect(HOST, DB_USER, DB_PASSWORD, DB_NAME) or die("Ошибка соединения с базой");
    mysqli_set_charset($link, "utf8") or die("Error coding");
    return $link;
}

// Выбор из БД списка жанров
function getGenres() {
	$link = connect();			
	$query = "SELECT id, name FROM genres ORDER BY name ASC";
	$result = mysqli_query($link, $query);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Выбор из БД списка авторов
function getAuthors() {
	$link = connect();			
	$query = "SELECT id, name FROM authors ORDER BY name ASC";
	$result = mysqli_query($link, $query);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Сбор данных по всем книгам в массив
function getBooks() {
		$link = connect();
		$query = "SELECT id, name AS `title`, shortDesc, price FROM books ORDER BY id DESC";
		$result = mysqli_query($link, $query);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

// Выборка книг по жанру
function getBooksByGenre($id) {
		$link = connect();
		$query = "SELECT g.name, b.id, b.name AS `title`, b.shortDesc AS `shortDesc`, b.fullDesc AS `fullDesc`, b.price AS `price` FROM books b
				LEFT JOIN `books_genres` bg ON bg.book_id = b.id
				LEFT JOIN `genres` g ON g.id = bg.genre_id
				WHERE bg.genre_id = $id";
		$result = mysqli_query($link, $query);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
	}

// Выборка книг по жанру
function getBooksByAuthor($id) {
	$link = connect();
	$query = "SELECT a.name, b.id, b.name AS `title`, b.shortDesc AS `shortDesc`, b.fullDesc AS `fullDesc`, b.price AS `price` FROM books b
			LEFT JOIN `books_authors` ba ON ba.book_id = b.id
			LEFT JOIN `authors` a ON a.id = ba.author_id
			WHERE ba.author_id = $id";
	$result = mysqli_query($link, $query);
	return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

//функция для получения данных о книге из массива по id
function getBooksById($id_book) {
		$id_book = intval($id_book);
		$link = connect();
		$query = "SELECT id, name AS `title`, shortDesc, fullDesc, price FROM books
				 WHERE id = $id_book";
		$result = mysqli_query($link, $query);
		$book = mysqli_fetch_assoc($result);
		
		$query = "SELECT a.id, a.name FROM authors a
				LEFT JOIN `books_authors` ba ON ba.author_id = a.id
				WHERE ba.book_id = $id_book";
		$result = mysqli_query($link, $query);
		$authors = mysqli_fetch_all($result, MYSQLI_ASSOC);

		$query = "SELECT g.id, g.name FROM genres g
				LEFT JOIN `books_genres` bg ON bg.genre_id = g.id
				WHERE bg.book_id = $id_book";
		$result = mysqli_query($link, $query);
		$genres = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		$book['genres'] = $genres;
		$book['authors'] = $authors;
		
		return $book;
	}

// Сохранение в базу после редактирования    
function editBook() {
	$link = connect();
	$query = "UPDATE `books` SET `name`='{$_POST['title']}',`shortDesc`='{$_POST['shortDesc']}',`fullDesc`='{$_POST['fullDesc']}',`price`='{$_POST['price']}' WHERE `id`='{$_POST['id']}'";
	$result = mysqli_query($link, $query);

	$query = "DELETE FROM `books_authors` WHERE `book_id` = '{$_POST['id']}'";
	$result = mysqli_query($link, $query);

	foreach($_POST['author_id'] as $author) {
	$query = "INSERT INTO `books_authors`(`author_id`, `book_id`) VALUES ('$author','{$_POST['id']}')";
	$result = mysqli_query($link, $query);
	}

	$query = "DELETE FROM `books_genres` WHERE `book_id` = '{$_POST['id']}'";
	$result = mysqli_query($link, $query);

	foreach($_POST['genre_id'] as $genre) {
	$query = "INSERT INTO `books_genres`(`genre_id`, `book_id`) VALUES ('$genre','{$_POST['id']}')";
	$result = mysqli_query($link, $query);
	}	
}

// Добавление новой книги в БД    
function addBook() {
	$link = connect();
    $query = "INSERT INTO `books`(`name`, `shortDesc`, `fullDesc`, `price`) VALUES ('{$_POST['name']}','{$_POST['shortDesc']}','{$_POST['fullDesc']}','{$_POST['price']}')";
    $result = mysqli_query($link, $query);

    //Вычисляем кол-во строк в таблице Books
    $query = "SELECT `id` FROM `books`";
	$result = mysqli_query($link, $query);
	$count_book_id = mysqli_num_rows($result);

	// Вставляем в таблицу books_authors id автора и книги
	$query = "INSERT INTO `books_authors`(`author_id`, `book_id`) VALUES ('{$_POST['author_id']}','$count_book_id')";
    $result = mysqli_query($link, $query);

    // Вставляем в таблицу books_genres id жанра и книги
    $query = "INSERT INTO `books_genres`(`genre_id`, `book_id`) VALUES ('{$_POST['genre_id']}','$count_book_id')";
    $result = mysqli_query($link, $query);
}

// Список авторов
function authors($link) {
		$link = connect();
        $query = "SELECT a.id AS `author_id`, a.name AS `author` FROM authors a ORDER BY `author`";
		$result = mysqli_query($link, $query);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

// Список жанров
function genres($link) {
		$link = connect();
        $query = "SELECT g.id AS `genre_id`, g.name AS `genre` FROM genres g ORDER BY `name`";
    	$result = mysqli_query($link, $query);
		return mysqli_fetch_all($result, MYSQLI_ASSOC);
}


?>