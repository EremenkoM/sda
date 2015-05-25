<div class="general_cont">

    <?php foreach ($users as $item):?>
        <a href="index.php?ctrl=Admin&act=ViewUpdate&id=<?=$item->id_masters; ?>">Изменить данные</a>
        <div class="user_view">
                <div class="avatar" ><?php echo 'avatar'?></div>

                    <span><?php echo $item->name_masters; ?>
                        <?php echo $item->surname_masters; ?>
                    </span>
            <br>
            <span>Специальность: <?php echo $item->profession; ?></span>

            <div><?php echo $item->comment; ?></div>

        </div>
    <?php endforeach; ?>

</div>