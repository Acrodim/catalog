<h1>Список книг</h1>
<?php foreach($books as $book): ?>
    <div class="product_box">
    	<h1><?=$book['title']?></h1>
      <img src="/app/public/images/image_01.jpg" alt="image" />
        <div class="product_info">
        	<!--p><?=$book['shortDesc']?></p-->
          <h3>Цена: <?=$book['price']?> грн</h3>
            <div class="detail_button"><a href="/book/<?=$book['id']?>">Детали</a></div>
        </div>
        <div class="cleaner">&nbsp;</div>
    </div>
    <?php endforeach ?>