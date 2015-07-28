<div class="general_cont">
<?php
var_dump($rent);
foreach ($rent as $item):?>
    <div class="user_view">

                            <span>
                                <a href="index.php?ctrl=Rent&act=One&id=<?php echo $item->id_users;?>">
                                    <div><img class="avatar" src="views/lk/img/<?=$item->id_users;?>.png"></div>
                                    <?php //echo $item->value_rented; ?>

                                </a>
                            </span><br>
        <?php //echo $item->value_city; ?>
    </div>
<?php endforeach; ?>

</div>