<div class="general_cont">
<?php
//var_dump($masters);
foreach ($masters as $item):?>
    <div class="user_view">

        <a href="index.php?ctrl=Masters&act=One&id=<?php echo $item->id_masters;?>">
            <div><img class="avatar" src="views/lk/img/<?=$item->avatar;?>.png"></div>
        </a>
                    <span><?php echo $item->name_masters; ?>
                        <?php echo $item->surname_masters; ?></span><br>
        <span> <?=$item->city;?></span>
        <br>
        <span>Специальность: <?php echo $item->value_prof; ?></span>

        <div><?php echo $item->comment; ?></div>

    </div>
<?php endforeach; ?>

</div>