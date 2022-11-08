<?php

namespace SultanovPackage\MyCase;

use SultanovSolutions\LaravelBase\Providers\BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function onBoot(): void
    {
        parent::onBoot();
        $this->loadViewsFrom(MICRO_SRC_DIR . '/Views', 'case');
        $this->loadTranslationsFrom(MICRO_SRC_DIR . '/Langs', 'case');

        require MICRO_SRC_DIR . '/Helpers/Table.php';

        define("ASSETS_PATH", MICRO_SRC_DIR . '/Assets/build');
    }
}
