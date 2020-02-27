<?php

// Функция для тестирования массивов
function dump($data)
{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
}

// Функция для распарсивания строки url
function parseUrl($url)
{
		$data = [];
		$data = parse_url($url);
		$path = trim($data['path'], '/');
		return explode('/', $path);
}

// Функкция для передачи 404 страницы
function page404()
	{
		header('HTTP/1.0 404 Page Not Found');
		return '404';
	}