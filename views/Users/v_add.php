<form action="<?=BASE_URL?>User/add" method="post" enctype="multipart/form-data">
            <div class="form">
                <div class="cpsity">
                    <label for="name">Введите имя пользователя:</label>
                    <input id="name" type="text" name="name" >
                </div>
                <div class="cpsity">
                    <label for="last_name">Введите фамилию пользователя:</label>
                    <input id="last_name" type="text" name="last_name" >
                </div>
                <div class="cpsity">
                    <label for="name">Выберите город:</label>
                    <select size="1" name="city_id">
                        <option disabled>Выберите город</option>
                        <?foreach($cities as $city):?>
                            <option value="<?=$city['id']?>"><?=$city['name']?></option>
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