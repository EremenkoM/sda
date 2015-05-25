<div class="general_cont">
    <a href="index.php?ctrl=Admin&act=ViewInsert">Добавить мастера</a>

<?php foreach ($org as $item):?>
    <div class="user_view">

        <a href="index.php?ctrl=Org&act=One&id=<?php echo $item->id_org;?>">
            <div class="avatar" ><?php echo 'avatar'?></div>
        </a>
                            <span>
                                <?php echo $item->name_org; ?>
                                <?php echo $item->city_org; ?>
                            </span>
        <br>
        <span>Специальность: <?php echo $item->specification; ?></span>

        <div><?php echo $item->comment; ?></div>

    </div>
<?php endforeach; ?>

</div>