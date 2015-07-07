<style>
    #parent_popup {
        background: #000;
        height: 100%;
        opacity: 1.0;
        position: fixed;
        width: 100%;
        z-index: 100;
        top: 0;
        left: 0;
    }
    #popup {
        background-color: #fafff8;
        height: 400px;
        opacity: 1.0;
        position: fixed;
        top: 100px;
        left: 40%;
        color: #2d2d2d;
        width: 400px;
    }
</style>


<form class="pure-form" method="post">
    <fieldset>
        <legend>Регистрация в несколько кликов...</legend>

<br>
        <p>Вы хотите зарегестрироваться как:</p>
        <p>
            <select size="1" name="id_spec">
                <option>Выберите...</option>
                <option value="1">Организация</option>
                <option value="2">Мастер</option>
                <option value="3">Магазин</option>
            </select>
        </p>
        <p><em class='result_email'></em></p>
        <input type="email" class="email" name="email" placeholder="Ваш Email" size="35" required>
        <p><em class='result_password'></em></p>
        <input type="password" placeholder="Ваш пароль" class='password' name="password" size="35" required > <br><br>

        <br><br>
        <img src="views/lk/captcha/img.php">
        <br>
        <input type="text" name="captcha" placeholder="Введите ссуму чисел" size="35">
        <br><br>
     <p><strong>Внимание!</strong> - После регистрации, на ваш email прийдет активационное письмо..</p>
        <br><br>
        <button type="submit" name="signup" class="pure-button pure-button-primary">Зарегистрироваться</button>
       	
    </fieldset>

</form>