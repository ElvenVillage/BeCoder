<?php
  include_once '../main.php';
  $module =new Main();
  if($id=$module->check_cookie()){
  $ui=$module->user_info($id);
  ?>
<!DOCTYPE html>

<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>BeCoder</title>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/index.css">
    <link rel="stylesheet" href="../style/null.css">

    <link rel="stylesheet" href="../style/nav.css">

    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>

    <link rel="shortcut icon" href="../icon/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="../style/project.css">
    <link rel="stylesheet" href="../style/null.css">

    <link rel="stylesheet" href="../style/nav.css">
</head>
<body>

<div id="app">

    <div class="wrapper">
<div class="nav">
                <div class="container">

                    <div class="nav__row">
                        <div class="null">
                            <div class="logo__list">
                                <div>
                                    <a href="" class="nav__logo"><img src="../icon/logo.svg"></a>
                                </div>

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
                                    <li><a href="#" class="menu__link">Профиль</a></li>
                                    <li><a href="/index.php" class="menu__link">Проекты</a></li>
                                    <li><a href="" class="menu__link">Статистика</a></li>
                                    <li><a href="" class="menu__link">Контакты</a></li>
                                    <li><a href="" class="menu__link">Выходs</a></li>

                                </ul>
                            </nav>
                        </div>
                        <div class="nulllic"></div>
                    </div>
                </div>
            </div>

        <div class="info__content" style="margin-top: 17em">
        <div class="tabs__content">
            <div class="tabs__body" style="background: white; color: black">
                <div id="tab_02">
                    <div class="tabs__top">
                        <div class="tabs__title">Профиль</div>
                        <div v-if="isEditMod" @click="toggleEditMode">OK</div>
                        <div v-else @click="toggleEditMode">Редактировать</div>
                    </div>
                    <hr>
                    <div class="tabs__info">
                        <div class="tabs__list tabs-list">
                            <div class="tabs-list__conent">
                                <div class="tabs-list__title tabs-list__item">Имя</div>
                                <div class="tabs-list__text tabs-list__item">Фамилия</div>
                                <div class="tabs-list__textarea tabs-list__item">E-Mail</div>
                            </div>
                        </div>
                        <div class="tabs__input tabs-input">
                            <div class="tabs-input__text1 tabs-input__item"><input type="text" placeholder="<?php echo $ui['name']; ?>"
                                                                                   tabindex="1" :readonly="isReadOnly" v-model="name"></div>
                            <div class="tabs-input__text2 tabs-input__item"><input type="text" placeholder="<?php echo $ui['surname']; ?>"
                                                                                   tabindex="2" :readonly="isReadOnly" v-model="surname"></div>
                            <div class="tabs-input__text3 tabs-input__item"><input type="email" placeholder="<?php echo $ui['email']; ?>" v-model="email"
                                                                                      tabindex="3" :readonly="isReadOnly"></div>
                        </div>
                    </div>
                    <div class="tabs__img">
                        <?php
                        if($ui['photo']){?>
                        <img src="../user_images/<?php echo $ui['photo'];?>" alt="">
                      <?php }else{ echo '<img src="../img/1.jpg" alt="">'; } ?>

                        <form action='../api/profile_photo_upload.php' method='post' enctype="multipart/form-data">
                          <input type="file" name='logo'>
                          <input type="submit" value='ok'>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
</div>

</body>

<script>
    const vm = new Vue({
        el: '#app',
        data: {
            isEditMod: false,
            isReadOnly: true,
            name: "<?php echo $ui['name']; ?>",
            surname: "<?php echo $ui['surname']; ?>",
            email: "<?php echo $ui['email']; ?>"
        },
        methods: {
            toggleEditMode() {
                this.isEditMod = !this.isEditMod
                this.isReadOnly = !this.isReadOnly
                if (this.isReadOnly) {
                    this.submitData()
                }
            },
            submitData() {
                const body = new URLSearchParams(
                    {
                        name: this.name,
                        surname: this.surname,
                        email: this.email
                    }
                )
                fetch('https://becoder.newpage.xyz/api/change_profile.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: body
                })
            }
        }
    })
</script>
</html>
<?php }
else{
  echo "<script>window.location='/auth';</script>";
}
?>
