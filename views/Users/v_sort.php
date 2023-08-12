
<form action="<?=BASE_URL?>User/sort" method="post">
            <div class="form">
                <div class="cpsity">
                    <label for="name">Выберите поле:</label>
                    <select size="1" name="name">
                        <option disabled>Выберите поле</option>
                        <?foreach($columnNames as $columnName):?>
                            <option value="<?=$columnName['COLUMN_NAME']?>"><?=$columnName['COLUMN_NAME']?></option>
                        <?endforeach;?>                                         
                    </select>
                </div>
                <div class="cpsity">
                    <label for="name">Выберите направление:</label>
                    <select size="1" name="direc">
                        <option disabled>Выберите направление:</option>
                        <option  value="asc">по возрастанию</option>
                        <option  value="desc">по убыванию</option>                                           
                    </select>
                </div>           
                <div class="cpsity">
                    <input type="submit"  value="filter" >   
                </div>                              	
            </div>
           
</form>	



