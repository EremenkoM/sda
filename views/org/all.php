<div class="general_cont">
    <form id="search" action="index.php?ctrl=Org&act=Find" method="POST">
        <select size="1" name="id_spec">
            <option value="%">Все наименования..</option>
            <?php foreach ($spc as $item):?>
                <option value="<?=$item->id_spec;?>"><?=$item->value_spec;?></option>
            <?php endforeach; ?>
        </select>
        <select size="1" name="city_org">
            <option value="%">Все города..</option>
            <?php foreach ($city as $item):?>
                <option value="<?=$item->id_city;?>"><?=$item->value_city;?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Поиск">
    </form>
<?php
//var_dump($org);
foreach ($org as $item):?>
    <div class="user_view">

        <a href="index.php?ctrl=Org&act=One&id=<?php echo $item->id_org;?>">
            <div><img class="avatar" src="views/lk/img/<?=$item->avatar;?>.png"></div>
        </a>
                            <span>
                                <?php echo $item->name_org; ?>
                                <?php echo $item->value_city; ?>
                            </span>
        <br>
        <span>Специальность: <?php echo $item->value_spec; ?></span>

        <div><?php echo $item->comment; ?></div>

    </div>
<?php endforeach; ?>

</div>