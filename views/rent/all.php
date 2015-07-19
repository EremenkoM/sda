<div class="general_cont">
    <form id="search" action="index.php?ctrl=rent&act=Find" method="POST">
        <select size="1" name="id_spec">
            <option value="all">Инструмент...</option>
            <?php foreach ($prof as $item):?>
                <option value="<?=$item->id_prof;?>"><?=$item->value_prof;?></option>
            <?php endforeach; ?>
        </select>
        <select size="1" name="city_shop">
            <option value="all">Город...</option>
            <?php foreach ($city as $item):?>
                <option value="<?=$item->id_city;?>"><?=$item->value_city;?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Поиск">
    </form>

<?php
//var_dump($rent);
foreach ($rent as $item):?>
    <div class="rent_view">
                            <span>
                                <a href="index.php?ctrl=Rent&act=One&id=<?php echo $item->id_users;?>"><?php echo $item->value_rented; ?></a>
                            </span><br>
        <?php echo $item->value_city; ?>
    </div>
<?php endforeach; ?>

</div>