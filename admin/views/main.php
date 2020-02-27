<div class="card-header"><h3>Список книг</h3>
    <a href="index.php?new" class="btn btn-success">Добавить книгу</a>
</div>

    <div class="card-body">
    <?php if(!empty($_POST)) :?>
      <div class="alert alert-success" role="alert">
        Книга успешно добавлена
      </div>
     <?php endif ?> 
        <div class="media">
          <div class="media-body">
            <h5 class="mt-0"></h5> 

                <table class="table">
            <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Действия</th>
                </tr>
            </thead>

            <tbody>
            <?php foreach($books as $book): ?>
                <tr>
                    <td><?=$book['id']?></td>
                    <td><?=$book['title']?></td>
                    <td><?=$book['price']?></td>
                    <td>
                            <a href="index.php?edit_id=<?=$book['id']?>" class="btn btn-success">Редактировать</a>

                        <!--<a href="" onclick="return confirm('are you sure?')" class="btn btn-danger">Удалить</a>-->
                    </td>
                </tr>
            <?php endforeach ?>    
            </tbody>
        </table>
            
          </div>
        </div>
    </div>