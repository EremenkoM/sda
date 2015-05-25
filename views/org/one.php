<div class="general_cont">
    <div class="user_view">
        <?php
        var_dump($org);
        foreach ($org as $item):?>

           <a href="index.php?ctrl=Admin&act=ViewUpdate&id=<?=$item->id_org; ?>">Изменить данные</a>
            <br>
                <div class="avatar" >
                    <?php echo 'avatar'?>
                </div>

                        <span>
                            <?php echo $item->name_org; ?>
                            <?php echo $item->city_org; ?>
                        </span>
                <br>

                <div>
                    <?php echo $item->specification; ?>
                </div>


        <?php endforeach; ?>
    </div>
</div>