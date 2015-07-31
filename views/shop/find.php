<div class="general_cont">
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