<div class="general_cont">
<?php
//var_dump($rent);
foreach ($rent as $item):?>
    <div class="user_view">

                            <span>
                                <a href="index.php?ctrl=Rent&act=One&id=<?php echo $item->id_users;?>">
                                    <div><img class="avatar" src="views/lk/img/<?=$item->id_users;?>.png"></div>


                                </a>
                            </span><br>
        <p><strong><?=$item->name; ?></strong> </p>
        <p><strong>Грод:</strong> <?=$item->value_city; ?> </p>
        <p><strong>Что дает в аренду:</strong>
            <?=$item->value_rented;?>
        </p>

    </div>
<?php endforeach; ?>

</div>