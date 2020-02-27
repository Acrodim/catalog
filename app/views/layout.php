<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Book Store</title>
<link href="/app/public/css/style.css" rel="stylesheet" type="text/css" />
<link href="/app/public/css/form.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
</head>
<body>
<div id="container">
	<div id="menu">
        <ul>
            <li><a href="/">Главная</a></li>          
            <li><a href="/admin" class="admin" target="blank">Admin</a></li>
        </ul>
    </div> <!-- end of menu -->
    
    <div id="header">
    	<div id="special_offers">
        	
        </div>
        
        <div id="new_books">
        	
        </div>
    </div> <!-- end of header -->
    
    <div id="content">
    	
        <div id="content_left">
        	<div class="content_left_section">
            	<h1>Жанры</h1>
                <ul>
                    <?php foreach($genres as $genre): ?>
                    <li><a href="/genre/<?=$genre['id']?>"><?=$genre['name']?></a></li>
                    <?php endforeach ?>
            	</ul>
            </div>
			<div class="content_left_section">
            	<h1>Авторы</h1>
                <ul>
                    <?php foreach($authors as $author): ?>
                    <li><a href="/author/<?=$author['id']?>"><?=$author['name']?></a></li>
                    <?php endforeach ?>
            	</ul>
            </div>
        </div> <!-- end of content left -->
        
        <div id="content_right">
           
                <?php require_once 'app/views/' . $view . '.php';?>

            <div class="cleaner_with_width">&nbsp;</div>
            
        </div> <!-- end of content right -->
    
    	<div class="cleaner_with_height">&nbsp;</div>
    </div> <!-- end of content -->
    
    <div id="footer">
    
</div> <!-- end of container -->

</body>
</html>