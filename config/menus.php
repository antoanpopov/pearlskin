<?php

return [

    'styles' => [
        'navbar' => \Nwidart\Menus\Presenters\Bootstrap\NavbarPresenter::class,
        'navbar-right' => \Nwidart\Menus\Presenters\Bootstrap\NavbarRightPresenter::class,
        'nav-pills' => \Nwidart\Menus\Presenters\Bootstrap\NavPillsPresenter::class,
        'nav-tab' => \Nwidart\Menus\Presenters\Bootstrap\NavTabPresenter::class,
        'sidebar' => \Nwidart\Menus\Presenters\Bootstrap\SidebarMenuPresenter::class,
        'navmenu' => \Nwidart\Menus\Presenters\Bootstrap\NavMenuPresenter::class,
        'navbar-language-switcher' => \Modules\Pearlskin\Presenters\NavbarWithLanguageSwitcherPresenter::class,
        'navbar-footer' => \Modules\Pearlskin\Presenters\FooterNavbarPresenter::class,
    ],

    'ordering' => false,

];
