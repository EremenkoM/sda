
    <form method="post" class="pure-form">

        <div class="profile_cont">

Вы сдаете :
            <br>
                <select id="tokenize" multiple="multiple" class="tokenize-sample" name="rented[]">
                    <?php foreach ($option as $item):?>
                        <option <?=$item->select;?> value="<?=$item->id_rented;?>"><?=$item->value_rented;?></option>
                    <?php endforeach; ?>
                </select><br><br>

                <button type="submit" class="pure-button pure-button-primary" name="rent">Изменить</button>
        </div>

        Если вы больше не хотите сдавать в аренду оборудование нажмите->
        <button  class="pure-button" formaction="index.php?ctrl=Rent&act=DeleteRent" >Удалить</button>
    </form>



