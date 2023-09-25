<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Url;

$route = Yii::$app->controller->route;
$class = 'active';
$menuOpenClass = 'menu-open';


$sideBarMenus = [
   
    
  
    [
        'label' => Yii::t('app', 'Bosh Sahifa'),
        'icon' => 'fas fa-home',
        'badge' => '',
        'url' => '#',
        'active' => in_array($route, [
            
        ]),
        'items' => [
            [
                'label' => Yii::t('app', 'Slider'),
                'icon' => 'fas fa-sliders-h',
                'badge' => '',
                'url' => Url::to(['/slider']),
                'active' => in_array($route, ['worker/index', 'worker/view', 'worker/update', 'worker/create']),
                'items' => []
            ],

             [
                'label' => Yii::t('app', 'Yangiliklar'),
                'icon' => 'fas fa-newspaper',
                'badge' => '',
                'url' => Url::to(['/nevs']),
                'active' => in_array($route, ['worker/index', 'worker/view', 'worker/update', 'worker/create']),
                'items' => []
            ],

            [
                'label' => Yii::t('app', 'School_Start'),
                'icon' => 'fas fa-newspaper',
                'badge' => '',
                'url' => Url::to(['/school-start']),
                'active' => in_array($route, ['worker/index', 'worker/view', 'worker/update', 'worker/create']),
                'items' => []
            ],
          
        ]
    ],
   
    [
        'label' => Yii::t('app', 'Nazariya'),
        'icon' => 'fas fa-folder',
        'badge' => '',
        'url' => Url::to(['#']),
        'active' => in_array($route, ['branch/index', 'branch/view', 'branch/update', 'branch/create', 'branch/get-money']),
        'items' => [
            [
                'label' => Yii::t('app', 'Nazariy nazariya'),
                'icon' => 'fas fa-folder',
                'badge' => '',
                'url' => Url::to(['/theory']),
                'active' => in_array($route, ['worker/index', 'worker/view', 'worker/update', 'worker/create']),
                'items' => []
            ],

            [
                'label' => Yii::t('app', 'Virtual Nazariya'),
                'icon' => 'fas fa-play-circle',
                'badge' => '',
                'url' => Url::to(['/theory-virtual']),
                'active' => in_array($route, ['worker/index', 'worker/view', 'worker/update', 'worker/create']),
                'items' => []
            ],
        ],
    ],

     [
        'label' => Yii::t('app', 'Amaliy Tajriba'),
        'icon' => 'fas fa-desktop',
        'badge' => '',
        'url' => Url::to(['/practica']),
        'active' => in_array($route, ['branch/index', 'branch/view', 'branch/update', 'branch/create', 'branch/get-money']),
        'items' => [],
    ], 

     [
        'label' => Yii::t('app', 'Labaratoriya'),
        'icon' => 'fas fa-flask',
        'badge' => '',
        'url' => Url::to(['/laboratory']),
        'active' => in_array($route, ['branch/index', 'branch/view', 'branch/update', 'branch/create', 'branch/get-money']),
        'items' => [],
    ],    


     [
        'label' => Yii::t('app', 'Mashg\'ulot'),
        'icon' => 'fa fa-graduation-cap',
        'badge' => '',
        'url' => '#',
        'active' => in_array($route, ['']),
        'items' => [
            [
                'label' => Yii::t('app', 'Test'),
                'icon' => 'fas fa-spell-check',
                'badge' => '',
                'url' => Url::to(['/test']),
                'active' => in_array($route, ['worker/index', 'worker/view', 'worker/update', 'worker/create']),
                'items' => []
            ],

            [
                'label' => Yii::t('app', 'Krossword'),
                'icon' => 'fas fa-cubes',
                'badge' => '',
                'url' => Url::to(['/krossword']),
                'active' => in_array($route, ['worker/index', 'worker/view', 'worker/update', 'worker/create']),
                'items' => []
            ],
        ],
    ],   

     [
        'label' => Yii::t('app', 'Ijtimoiy Tarmoqlar'),
        'icon' => 'fa fa-bookmark',
        'badge' => '',
        'url' => Url::to(['/social']),
        'active' => in_array($route, ['']),
        'items' => [],
    ],   

    [
        'label' => Yii::t('app', 'Xabarlar'),
        'icon' => 'fa fa-envelope',
        'badge' => '',
        'url' => Url::to(['/form']),
        'active' => in_array($route, ['']),
        'items' => [],
    ],   

     [
        'label' => Yii::t('app', 'Aloqa'),
        'icon' => 'fa fa-phone',
        'badge' => '',
        'url' => Url::to(['/contact']),
        'active' => in_array($route, ['']),
        'items' => [],
    ],            
  


];

?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::to(['/']) ?>" class="brand-link">
        <img src="/backend/web/adminLte3/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8;width: 29px">
        <span class="brand-text font-weight-light"><?= Yii::$app->name ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item">
                    <a href="<?= Url::to(['/']) ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Bosh sahifa
                        </p>
                    </a>
                </li>
                <?php foreach ($sideBarMenus as $sideBarMenu): ?>
                    <li class="nav-item <?= $sideBarMenu['active'] ? $menuOpenClass : '' ?>">
                        <a href="<?= $sideBarMenu['url'] ?>"
                           class="nav-link <?= $sideBarMenu['active'] ? $class : '' ?>">
                            <i class="nav-icon <?= $sideBarMenu['icon'] ?>"></i>
                            <p>
                                <?= $sideBarMenu['label'] ?>
                                <?php if ($sideBarMenu['badge']): ?>
                                    <span class="badge badge-danger right"><?= $sideBarMenu['badge'] ?></span>
                                <?php endif; ?>
                                <?php if ($sideBarMenu['items']): ?>
                                    <i class="right fas fa-angle-left"></i>
                                <?php endif ?>
                            </p>
                        </a>
                        <?php if ($sideBarMenu['items']): ?>
                            <ul class="nav nav-treeview">
                                <?php foreach ($sideBarMenu['items'] as $item): ?>
                                    <li class="nav-item">
                                        <a href="<?= $item['url'] ?>"
                                           class="nav-link <?= $item['active'] ? $class : '' ?>">
                                            <i class="<?= $item['icon'] ?> nav-icon"></i>
                                            <p>
                                                <?= $item['label'] ?>
                                                <?php if ($item['badge']): ?>
                                                    <span class="badge badge-danger right"><?= $item['badge'] ?></span>
                                                <?php endif; ?>
                                            </p>
                                        </a>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
