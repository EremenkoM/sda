<div class="general_cont">

    <form id="search" action="index.php?ctrl=Masters&act=Find" method="POST">
        <select size="1" name="id_prof">
            <option value="all">Cпециалист...</option>
            <?php foreach ($prof as $item):?>
                <option value="<?=$item->id_prof;?>"><?=$item->value_prof;?></option>
            <?php endforeach; ?>
        </select>
        <select size="1" name="city">
            <option value="all">Город...</option>
            <?php foreach ($city as $item):?>
                <option value="<?=$item->id_city;?>"><?=$item->value_city;?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Поиск">
    </form>

    <?php foreach ($masters as $item):?>
    <div class="user_view">

        <a href="index.php?ctrl=Masters&act=One&id=<?php echo $item->id_masters;?>">
            <div><img class="avatar" src="views/lk/img/<?=$item->avatar;?>.png"></div>
        </a>
                    <span><?php echo $item->name_masters; ?>
                        <?php echo $item->surname_masters; ?></span><br>
        <span> <?=$item->value_city;?></span>
        <br>
        <span>Специальность: <?php echo $item->value_prof; ?></span>

        <div><?php echo $item->comment; ?></div>

    </div>
<?php endforeach; ?>

</div>