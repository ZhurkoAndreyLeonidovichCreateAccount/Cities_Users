
<form action="<?=BASE_URL?>City/edit" method="post">
            <div class="form">
                <div class="cpsity">
                    <label for="name">Введите название города:</label>
                </div>
                <div class="cpsity">
                    <input id="name" type="text" name="name" value="<?=$name?>">
                </div>
                <div class="cpsity">
                    <input type="submit"  value="Save" >
                    <a href="<?=BASE_URL?>">Отмена</a> 
                </div>                              	
            </div>
            <input  type="hidden" name="id" value="<?=$id?>">
</form>	



