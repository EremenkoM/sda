<div class="general_cont">
    <?php
    var_dump($org);
    foreach ($org as $item):?>
        <div class="user_view">

            <a href="index.php?ctrl=Org&act=One&id=<?php echo $item->id_org;?>">
                <div><img class="avatar" src="views/lk/img/<?=$item->avatar;?>.png"></div>
            </a>
                            <span>
                                <?php echo $item->name_org; ?>
                                <?php echo $item->city_org; ?>
                            </span>
            <br>
            <span>Специальность: <?php echo $item->value_spec; ?></span>

            <div><?php echo $item->comment; ?></div>

        </div>
    <?php endforeach; ?>
</div>