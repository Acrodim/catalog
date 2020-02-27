<h1><?=$book['title']?></h1>
    <div class="image_panel"><img src="/app/public/images/image_02.jpg" alt="CSS Template" width="100" height="150" /></div>
  <h2>Автор: 
    <!--Вывод авторов книги-->
  <?php foreach($book['authors'] as $author) :  ?>
    <?=$author['name'];?>.&nbsp
  <?php endforeach?>
  </h2>
    <h2>Жанр: 
    <!--Вывод жанров книги-->
    <?php foreach($book['genres'] as $genre) : ?>
    <span><?=$genre['name']?></span>.&nbsp
    <?php endforeach?>
    </h2>
    
     <!--Вывод цены книги-->
    <h2>Цена: <span><?=$book['price']?> грн</span></h2>
    
     <!--Вывод описания книги-->
    <p><?=$book['fullDesc']?></p>

  <div class="card">

     <!--Форма заказа книги-->
    <div class="card-header">Оформить заказ</div>

    <div class="card-body">
        <form method="POST" action="">

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">ФИО</label>

                <div class="col-md-6">
                    <input name="title"  type="hidden" value="<?=$book['title']?>"/>
                     <input name="price"  type="hidden" value="<?=$book['price']?>"/>
                    <input id="name" type="text" name="name">

                        <span class="invalid-feedback" role="alert">
                            <strong></strong>
                        </span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Your e-mail</label>

                <div class="col-md-6">
                    <input id="email" type="email" name="email" >
                </div>
            </div>
            <div class="number">
                Количество книг
                <span class="minus">-</span>
                <input class="qty" name="qty" type="text" value="1" size="5"/>
                <span class="plus">+</span>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary" name="send">
                        Отправить заказ
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

 <!--Стили выбора количества книг-->
<style type="text/css">
        span {cursor:pointer; }
        .number{
            margin:10px 30%;
        }
        .minus, .plus{
            width:10px;
            height:10px;
            background:#f2f2f2;
            border-radius:4px;
            padding:3px 5px 3px 5px;
            border:1px solid #ddd;
        }
        input{
            height:24px;
            border:1px solid #ddd;
            border-radius:4px;
            padding:0 2px;
        }
        .qty{
            padding-left: 20px;
        }
    </style>

    <!-- Скрипт количества книг в форме заказа--> 
<script type="text/javascript" src="http://pcvector.net/templates/pcv/js/pcvector.js"></script>
<script type="text/javascript" >
        $(document).ready(function() {
            $('.minus').click(function () {
                var $input = $(this).parent().find('input');
                var count = parseInt($input.val()) - 1;
                count = count < 1 ? 1 : count;
                $input.val(count);
                $input.change();
                return false;
            });
            $('.plus').click(function () {
                var $input = $(this).parent().find('input');
                $input.val(parseInt($input.val()) + 1);
                $input.change();
                return false;
            });
        });
    </script>