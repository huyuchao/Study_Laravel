<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSelf extends Model
{
    /**
     * 表名
     */
    protected $table='user';

    /**
     * 该模型是否被自动维护时间戳
     * `updated_at`, `created_at`
     * @var bool
     */
    public $timestamps = false;


}
