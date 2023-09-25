<?phpuse yii\helpers\Url;?><!--Header Start--><div></div><!--<style>--><!--    .alert {--><!--        font-size: small;--><!--        position: fixed;--><!--        top: 10px;--><!--        right: 10px;--><!--    }--><!--</style>--><div class="header-wrap">        <div class="container-fluid">            <div class="row">                <div class="col-lg-3 col-md-12 navbar-light">        <div class="logo"> <a href="<?=Url::to(['site/index'])?>"><img alt="" class="logo-default" src="/logoza.png"></a></div>        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>      </div>      <div class="col-lg-9 col-md-12">        <div class="navigation-wrap" id="filters">          <nav class="navbar navbar-expand-lg navbar-light"> <a class="navbar-brand" href="#">Menu</a>            <div class="collapse navbar-collapse" id="navbarSupportedContent">              <button class="close-toggler" type="button" data-toggle="offcanvas"> <span><i class="fas fa-times-circle" aria-hidden="true"></i></span> </button>              <ul class="navbar-nav mr-auto">                <li class="nav-item"> <a class="nav-link" href="<?=Url::to(['site/index'])?>">Bosh sahifa <span class="sr-only">(current)</span></a> </li>                  <li class="nav-item"><a class="nav-link" href="#">Nazariya</a> <i class="fas fa-caret-down"></i>                      <ul class="submenu">                          <li><a href="<?=Url::to(['theory/index'])?>">Taqdimotlar</a></li>                          <li><a href="<?=Url::to(['theory-virtual/index'])?>">Virtual ma'ruzalar</a></li>                      </ul>                  </li>                <li class="nav-item">                  <a class="nav-link" href="<?=Url::to(['practica/index'])?>">Amaliy tajriba</a>                </li>                <li class="nav-item"><a class="nav-link" href="<?=Url::to(['laboratory/index'])?>">Laboratoriya</a>                </li>                  <li class="nav-item"><a class="nav-link" href="#">Nazorat</a> <i class="fas fa-caret-down"></i>                      <ul class="submenu">                          <li><a href="<?=Url::to(['/test/index'])?>">Test</a></li>                          <li><a href="<?=Url::to(['/krossword/index'])?>">Krossword</a></li>                      </ul>                  </li>                <li class="nav-item"><a class="nav-link" href="<?=Url::to(['form/index'])?>">Aloqa</a></li>                  <?php                  if (Yii::$app->user->isGuest) {                      echo '<li class="nav-item"><a class="nav-link" href="' . Url::to(['/site/login/']).'">Tizimga kirish</a></li>';                  }else{                      echo '<li class="nav-item"><a data-method="post" class="nav-link" href="'.Url::to(['site/logout']).'">Chiqish  ('. Yii::$app->user->identity->username .')</a></li>';                  }                  ?>              </ul>            </div>          </nav>        </div>      </div>    </div>  </div></div>