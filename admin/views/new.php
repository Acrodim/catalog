 <div class="card-header"><h3>Добавить новую книгу</h3></div>

  <div class="card-body">
      <form action="index.php" method="post">
          <div class="form-group">
           <p><label for="exampleFormControlTextarea1">Название книги</label>
              <input name="name" class="form-control" id="exampleFormControlTextarea1" /></p>
          <p><label for="author">Автор книги</label>
              <select id="author" name="author_id">
                   <?php foreach($authors as $author): ?>
                      <option value="<?=$author['id']?>"><?=$author['name']?></option>
                  <?php endforeach ?>
              </select>
          </p>
          
          <p><label for="genre">Жанр книги</label>
          
              <select id="genre" name="genre_id">
                   <?php foreach($genres as $genre): ?>
                      <option value="<?=$genre['id']?>"><?=$genre['name']?></option>
                  <?php endforeach ?>
              </select></p>
              
          <label for="price">Цена (грн)</label>
          <input name="price" class="form-control" id="price" />
              
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Краткое описание</label>
          <textarea name="shortDesc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Полное описание</label>
          <textarea name="fullDesc" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button type="submit" name="send" class="btn btn-success" onclick="window.location='index.php'">Добавить</button>
      </form>
  </div>