<div class="general_cont">
<a href="index.php?ctrl=Admin&act=ViewInsert">Добавить мастера</a>
<?php
//var_dump($users);
foreach ($users as $item):?>
    <div class="user_view">

        <a href="index.php?ctrl=Users&act=One&id=<?php echo $item->id_masters;?>">
            <div class="avatar" ><?php echo 'avatar'?></div>
        </a>
                    <span><?php echo $item->name_masters; ?>
                        <?php echo $item->surname_masters; ?></span>
        <br>
        <span>Специальность: <?php echo $item->profession; ?></span>

        <div><?php echo $item->comment; ?></div>

    </div>
<?php endforeach; ?>

</div>