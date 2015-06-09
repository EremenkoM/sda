<div class="general_cont">
    <div class="user_view">
        <?php
        foreach ($org as $item):?>

            <br>
            <div><img class="avatar" src="lk/views/img/<?=$item->avatar;?>.png"></div>

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