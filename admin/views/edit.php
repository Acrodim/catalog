 <!--?php
 dump($book);
 ?-->

 <div class="card-header"><h3>Редактирование книги</h3></div>
 <div class="card-body">
<form action="index.php" method="post">
    <div class="form-group">
    <input name="id"  type="hidden" class="form-control"  value="<?=$book['id']?>"/>
     <p><label for="exampleFormControlTextarea1">Название книги</label>
        <input name="title" class="form-control" id="exampleFormControlTextarea1" value="<?=$book['title']?>"/></p>
    <p><label for="author">Автор книги</label>
    
        <select id="author" name="author_id[]" multiple>
             <?php foreach($authors as $author):?>
               <?php 
               $check = false;
               foreach($book['authors'] as $a){ 
                    if ($author['id'] == $a['id']){
                        $check = true;
                        break;
                    }
                }
                ?>
                <option value="<?=$author['id']?>" <?=$check ? 'selected':'';?>><?=$author['name']?></option>
            <?php endforeach;?>
        </select>
    </p>
    
    <p><label for="genre">Жанр книги</label>
    
        <select id="genre" name="genre_id[]" multiple>
             <?php foreach($genres as $genre): ?>
                <?php 
               $check = false;
               foreach($book['genres'] as $g){ 
                    if ($genre['id'] == $g['id']){
                        $check = true;
                        break;
                    }
                }
                ?>
                <option value="<?=$genre['id']?>" <?=$check ? 'selected':'';?>><?=$genre['name']?></option>
            <?php endforeach;?>
        </select></p>
        
    <label for="price">Цена (грн)</label>
    <input name="price" class="form-control" id="price" value="<?=$book['price']?>"/>
        
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Краткое описание</label>
    <textarea name="shortDesc" class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$book['fullDesc']?></textarea>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Полное описание</label>
    <textarea name="fullDesc" class="form-control" id="exampleFormControlTextarea1" rows="3"><?=$book['fullDesc']?></textarea>
  </div>
  <button type="submit" name="save" class="btn btn-success">Сохранить</button>
</form>
</div>