<h1>Список книг жанра <?=$book_genre[0]['name'];?></h1>
<?php if(!empty($book_genre)): ?>
<?php foreach($book_genre as $genre): ?>
    <div class="product_box">
    	<h1><?=$genre['title']?></h1>
      <img src="/app/public/images/image_01.jpg" alt="image" />
        <div class="product_info">
        	<!--p><?=$genre['shortDesc']?></p-->
          <h3>Цена: <?=$genre['price']?> грн</h3>
            <div class="detail_button"><a href="/book/<?=$genre['id']?>">Детали</a></div>
        </div>
        <div class="cleaner">&nbsp;</div>
    </div>
    <?php endforeach ?>
    <?php else: ?>
    <h2>Книг данного жанра пока нет</h2>
    <?php endif;?>
