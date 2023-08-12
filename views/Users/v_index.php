
        <h2>Список Пользователей</h2> 
        <p><a name="top"></a></p>
                <!--Сортирвка-->
            <h3><a href="#down">Вниз</a></h3>
            <div style="display:inline-block">
                <form action="<?=BASE_URL?>User/add" method="post" >
                    <input type="submit" name="ins2" value="Добавить" >
                </form>
                
                <form action="<?=BASE_URL?>User/sort" method="post" >
                    <input type="submit" name="sort2" value="Сортировать" >
                </form>	
            </div>
            <!--Создадим выпадающий список "Города"-->
            <div class="filter">
                <form action="<?=BASE_URL?>User/filter" method="post">
                    <h3>Фильтр по Городам</h3>
                    <select size="1" name="id">
                        <option disabled>Выберите город</option>
                        <?foreach($cities as $city):?>
                            <option  value="<?=$city['id']?>"> <?=$city['name']?></option>
                        <?endforeach;?>
                    </select>
                    <input type="submit" name="sort_fc" onclick="hhh()" value="Показать">
                </form>
            </div>
            <?foreach($users as $user): ?>
                <div class='users'>
                    <img width='100' src="<?=BASE_URL . $user['image_url']?>" class='image' alt="Фотография">
                    <div class='userdan'>
                        <h4><?=$user['name']." "?> <?=$user['last_name']?></h4>
                        <p><?=$user['city']?></p>
                        <form action="<?=BASE_URL?>User/delete" method="post">
                            <input type="hidden" name="id" value="<?=$user['id']?>">
                            <input type="submit" name="del_fors_names" value="Удалить" onclick="return confirm('Вы действительно хотите удалить пользователя?')">
                        </form>	
                        <form action="<?=BASE_URL?>User/edit" method="post">
                            <input type="hidden" name="id" value="<?=$user['id']?>">
                            <input type="submit" name="edit_fors_names" value="Редактировать" >
                        </form>
                    </div>
                </div>
            <?endforeach;?>    
                
                    
                <a name="down"></a>
                <h3><a href="#top">Наверх</a></h3>   
