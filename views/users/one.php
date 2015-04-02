<?php foreach ($this->data['user'] as $item):?>
    <h1>Логин:<?php echo $item->login;?></h1>
    <div>Пароль:<?php echo $item->password;?></div>
    <div>Имя:<?php echo $item->name_masters;?></div>
    <div>Фамилия:<?php echo $item->surname_masters;?></div>
<? endforeach?>