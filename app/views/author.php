<h1>Список книг автора <?=$book_author[0]['name'];?></h1>
<?php if(!empty($book_author)): ?>
<?php foreach($book_author as $author): ?>
    <div class="product_box">
    	<h1><?=$author['title']?></h1>
      <img src="/app/public/images/image_01.jpg" alt="image" />
        <div class="product_info">
        	<!--p><?=$author['shortDesc']?></p-->
          <h3>Цена: <?=$author['price']?> грн</h3>
            <div class="detail_button"><a href="/book/<?=$author['id']?>">Детали</a></div>
        </div>
        <div class="cleaner">&nbsp;</div>
    </div>

<?php endforeach ?>
 <?php else: ?>
    <h2>Книг данного автора пока нет</h2>
    <?php endif;?>