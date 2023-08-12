                      
<!--форма для поиска по имени и фамилии-->
<form action="<?=BASE_URL?>search" method="post">
    <div class='form'>
        <h3>Поиск по имени и/или фамилии пользователя</h3>
        <span>
            <input type="search" pattern="[A-Za-zА-Яа-яЁё]{3,16}" name="search" value='' required placeholder="Введите запрос">
        </span>
        <input type="submit" name="sub_sh_name" value="Поиск">
    </div>
</form>
