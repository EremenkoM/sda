<div class="general_cont">
<?php

foreach ($users as $item):?>
    <div class="user_view">

        <a href="index.php?ctrl=Users&act=One&id=<?php echo $item->id_masters;?>">
            <div><img class="avatar" src="lk/views/img/<?=$item->avatar;?>.png"></div>
        </a>
                    <span><?php echo $item->name_masters; ?>
                        <?php echo $item->surname_masters; ?></span>
        <br>
        <span>Специальность: <?php echo $item->profession; ?></span>

        <div><?php echo $item->comment; ?></div>

    </div>
<?php endforeach; ?>

</div>