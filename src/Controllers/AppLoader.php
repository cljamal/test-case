<?php

namespace SultanovPackage\MyCase\Controllers;

use Illuminate\Contracts\View\View;
use SultanovSolutions\LaravelBase\Controllers\BaseController;

class AppLoader extends BaseController
{
    protected ?string $model = '';

    protected string $scope = 'homepage';

    public function index(): View
    {
        return view('case::pages.app');
    }
}
