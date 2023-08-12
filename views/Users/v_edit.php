<form action="<?=BASE_URL?>User/edit" method="post" enctype="multipart/form-data">
            <div class="form">
                <input type="hidden" name="id" value="<?=$user['id']?>">
                <div class="cpsity">
                    <label for="name">Введите имя пользователя:</label>
                    <input id="name" type="text" name="name"  value="<?=$user['name']?>">
                </div>
                <div class="cpsity">
                    <label for="last_name">Введите фамилию пользователя:</label>
                    <input id="last_name" type="text" name="last_name" value="<?=$user['last_name']?>" >
                </div>
                <div class="cpsity">
                    <label for="name">Выберите город:</label>
                    <select size="1" name="city_id">
                        <option disabled>Выберите город</option>
                        <?foreach($cities as $city):?>
                            <?if($city['id'] === $user['city_id']):?>
                                <option selected value="<?=$city['id']?>"><?=$city['name']?></option>
                            <?else:?>
                                <option value="<?=$city['id']?>"><?=$city['name']?></option>   
                            <?endif;?>
                        <?endforeach;?>                                         
                    </select>
                </div>
                <div class="cpsity">
                    <label for="file">Добавить фотографию:</label>
                    <input id="file" type="file" name="img" >
                </div>
                <div class="cpsity">
                    <input type="submit"  value="Save" >
                    <a href="<?=BASE_URL?>Users">Отмена</a>   
                </div>                              	
            </div>          
</form>	