<div class="general_cont">
    <form id="search" action="index.php?ctrl=rent&act=Find" method="POST">
        <select size="1" name="id_rented">
            <option value="%">Все наименования..</option>
            <?php foreach ($spc as $item):?>
                <option value="<?=$item->id_rented;?>"><?=$item->value_rented;?></option>
            <?php endforeach; ?>
        </select>
        <select size="1" name="city_rent">
            <option value="%">Все города..</option>
            <?php foreach ($city as $item):?>
                <option value="<?=$item->id_city;?>"><?=$item->value_city;?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Поиск">
    </form>
    <?php foreach ($city as $c):?>
    <div class="user_view">
        <h1><?=$c->value_city;?></h1>
            <?php
            $rent = Rent::getOwnValue($c->id_city);
            //var_dump($rent);
            foreach ($rent as $item):?>
                    <span>
                        <a href="index.php?ctrl=Rent&act=One&id=<?=$item->id_rented;?>"><?=$item->value_rented; ?></a>
                    </span>
            <?php endforeach; ?>
    </div>
    <?php endforeach; ?>
</div>