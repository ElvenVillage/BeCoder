<?php
include_once('main.php');
$module =new Main();
if($id=$module->check_cookie()){
$ui=$module->user_info($id);
include_once "module/header.php";
?>
<div class="nav">
<div class="container">


        <div class="nav__row">
            <div class="null">
                <div class="logo__list">
                <div><a href="" class="nav__logo"><img src="icon/logo.svg"></a></div>

                </div>
            </div>
            <div class="nav__menu menu">
                <div class="menu__icon icon__menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <nav class="menu__body">
                    <ul class="menu__list">
                        <li><a href="" class="menu__link">Профиль</a></li>
                        <li><a href="" class="menu__link">Статистика</a></li>
                        <li><a href="" class="menu__link">О проекте</a></li>
                        <li><a href="" class="menu__link">Контакты</a></li>
                    </ul>
                </nav>
            </div>
            <div class="nav__actions act-nav">
               <a class="act-nav__region"><span>поиск</span></a>
            </div>
    </div>
    </div>
</div>
    <div class="info__content screen1">
            <div class="info__lk lk">
                <div class="lk__content">
                    <div class="lk__img">
                      <?php
                      if($ui['photo']){?>
                      <img src="../user_images/<?php echo $ui['photo'];?>" alt="">
                    <?php }else{ echo '<img src="img/foto.jpg" alt="" >'; } ?>
                    </div>
                    <div class="lk__name name">
                        <div class="name__contennt">
                            <div class="name__name"><?php echo $ui['name']; ?></div>
                            <div class="name__surname"><?php echo $ui['surname']; ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="info__proj proj">
                <div class="proj__contentn">
                    <div class="proj__ended"><p>Готовые проекты:</p> <div>6</div></div>
                    <div class="proj__started"><p>Начатые проекты: </p><div>8</div></div>
                </div>
            </div>
        </div>
        <div class="choos__content">
            Ваши проекты
        </div>
        <div class="bloks__content">
          <?php
          $res=$module->user_projects($id);
          foreach($res as $val){
              echo'
            <div class="block">
                <div class="block__content">
                    <div class="block__img">
                        <img src="img/1.jpg" alt="">
                    </div>
                    <div class="block__block-info block-info">
                        <div class="block-info__content">
                            <div class="block-info__top block-top">
                                <div class="block-top__contetn">
                                    <div class="block-top__title block-title">
                                        <div class="block-title__content">
                                            <div class="block-title__title">'.$val['name'].'</div>
                                            <div class="block-title__text">
                                                '.$val['description'].'
                                                    </div>
                                        </div>
                                    </div>
                                        <div class="block-top__progress progress">
                                            <div class="progress__conent">
                                               <div class="block-top__text">статус</div>
                                                   <div class="block-top__img">
                                                       ';if($val['status']){
                                                         echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="#00EB07"><path d="M22.5 4.5c-.8-.8-2.2-.8-3 0L9 15l-4.5-4.5c-.8-.8-2.2-.8-3 0s-.8 2.2 0 3L9 21 22.5 7.5c.8-.8.8-2.2 0-3z"></path></g></svg>';
                                                       }
                                                       else{
                                                         echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill="#EB5F00"><path d="M19.5 4.5c-.8-.8-2.2-.8-3 0L12 9 7.5 4.5c-.8-.8-2.2-.8-3 0-.8.8-.8 2.2 0 3L9 12l-4.5 4.5c-.8.8-.8 2.2 0 3 .8.8 2.2.8 3 0L12 15l4.5 4.5c.8.8 2.2.8 3 0 .8-.8.8-2.2 0-3L15 12l4.5-4.5c.8-.8.8-2.2 0-3z"></path></g></svg>';
                                                       }   echo'
                                                   </div>
                                            </div>
                                       </div>
                                </div>
                            </div>
                            <div class="block-info__bottom block-bottom">
                                <div class="block-bottom__content">
                                    <div class="button"><a href="project.html?id='.$val['id'].'">Перейти к проекту</a></div>
                                    <div class="menu_proj">
                                        <div class="menu_proj__content">
                                            <div class="punkt1">Редактировать</div>
                                            <div class="punkt2"><a href="drop?id='.$val['id'].'">Удалить</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
          }?>

        </div>

        <a class="plus" href="project.html">
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g fill='#EB00D7'><path d="M19 10h-5V5c0-1.1-.9-2-2-2s-2 .9-2 2v5H5c-1.1 0-2 .9-2 2s.9 2 2 2h5v5c0 1.1.9 2 2 2s2-.9 2-2v-5h5c1.1 0 2-.9 2-2s-.9-2-2-2z"></path></g></svg>
        </a>
<?php
include_once "module/footer.php";
}
else{
  echo "<script>window.location='/auth';</script>";
}
?>
