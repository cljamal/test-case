<?php

namespace SultanovPackage\%SERVICE_NAME%\Controllers;

use SultanovSolutions\%SERVICE_NAME%\Models\Example;
use SultanovSolutions\LaravelBase\Controllers\BaseController;

class ExampleController extends BaseController
{
    protected ?string $model = Example::class;

    protected string $scope = 'example';
}
