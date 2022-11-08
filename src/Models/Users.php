<?php

namespace SultanovPackage\MyCase\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use SultanovSolutions\LaravelBase\Models\BaseModel;

class Users extends BaseModel
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'birthday',
        'phone',
        'country',
    ];
}
