<div class="general_cont">
    <form id="search" action="index.php?ctrl=Shop&act=Find" method="POST">
        <select size="1" name="id_spec">
            <option value="all">Cпециалист...</option>
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
//var_dump($shop);
foreach ($shop as $item):?>
    <div class="user_view">

        <a href="index.php?ctrl=Shop&act=One&id=<?php echo $item->id_shop;?>">
            <div><img class="avatar" src="views/lk/img/<?=$item->avatar;?>.png"></div>
        </a>
                            <span>
                                <?php echo $item->name_shop; ?>
                                <?php echo $item->value_city; ?>
                            </span>
        <br>
        <span>Специальность: <?php echo $item->value_goods; ?></span>

        <div><?php echo $item->comment; ?></div>

    </div>
<?php endforeach; ?>

</div>