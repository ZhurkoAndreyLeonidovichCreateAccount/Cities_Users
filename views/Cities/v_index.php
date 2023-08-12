<?php  
    $cityNum = (isset($_COOKIE['city'])) ? $_COOKIE['city'] : 0;
    $cityNum++;
    setcookie('city', $cityNum);
?>
        <h2>Список городов</h2> 
        <div class="form flrig">                     
            <form action="<?=BASE_URL?>City/add" method="post">
                    <input type="submit" name="ins" value="Добавить" >                 	   
            </form>
            <form action="<?=BASE_URL?>City/sort" method="post">
                    <input type="submit" name="sort" value="Сортировать" >             	   
            </form>	
        </div>
            <?foreach($cities as $city):?>
                <div class='cpsity'>
                    <h3><?=$city['name']?></h3>
                    <span>
                        <form action="<?=BASE_URL?>City/delete" method="post" >
                            <input type="hidden" name="id" value="<?=$city['id']?>" >
                            <input type="submit" name="del_fors_city" onclick="return confirm('Вы действительно хотите удалить город?')" value="Удалить" >
                        </form>	
                    </span>
                    <span>
                        <form action="<?=BASE_URL?>City/edit" method="post" >
                            <input type="hidden" name="id" value="<?=$city['id']?>" >
                            <input type="submit" name="edit_fors_city" value="Редактировать" >
                        </form>
                    </span>
                </div>
            <?endforeach;?>
                
    