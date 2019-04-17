<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=Yii::$app->user->identity->username?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->
        <?php $controllerID = Yii::$app->controller->id;?>
        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'PMTime Menu', 'options' => ['class' => 'header']],
                    ['label' => 'Карусель', 'icon' => 'briefcase', 'url' => ['/admin/carousel'], 'active' => $controllerID === 'carousel'],
                    ['label' => 'Галерея', 'icon' => 'image', 'url' => ['/admin/gallery'], 'active' => $controllerID === 'gallery'],
                    ['label' => 'История', 'icon' => 'clock', 'url' => ['/admin/history'], 'active' => $controllerID === 'history'],
                    
                    ['label' => 'Контакты', 'icon' => 'phone', 'url' => ['/admin/contacts'], 'active' => $controllerID === 'contacts'],
                    ['label' => 'Пользователи', 'icon' => 'user', 'url' => ['/admin/user'],  'active' => $controllerID === 'user',],
                    ['label' => 'Настройки', 'icon' => 'cog', 'url' => ['/admin/settings'], 'active' => $controllerID === 'settings'],
                    
                    // [Партнёры
                    //     'label' => 'Some tools',
                    //     'icon' => 'share',
                    //     'url' => '#',
                    //     'items' => [
                    //         ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                    //         ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],
                    //         [
                    //             'label' => 'Level One',
                    //             'icon' => 'circle-o',
                    //             'url' => '#',
                    //             'items' => [
                    //                 ['label' => 'Level Two', 'icon' => 'circle-o', 'url' => '#',],
                    //                 [
                    //                     'label' => 'Level Two',
                    //                     'icon' => 'circle-o',
                    //                     'url' => '#',
                    //                     'items' => [
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                         ['label' => 'Level Three', 'icon' => 'circle-o', 'url' => '#',],
                    //                     ],
                    //                 ],
                    //             ],
                    //         ],
                    //     ],
                    // ],
                ],
            ]
        ) ?>

    </section>

</aside>
