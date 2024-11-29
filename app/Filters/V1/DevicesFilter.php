<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class DevicesFilter extends ApiFilter {
    protected $safeParms = [
        'userId' => ['eq', 'ne'],
        'deviceName' => ['eq', 'ne'],
        'city' => ['eq', 'ne'],
        'region' => ['eq', 'ne'],
        'country' => ['eq', 'ne'],
        'latitude' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'longtitude' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'id' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte']
    ];

    protected $columnMap = [
        'userId' => 'user_id',
        'deviceName' => 'device_name'
    ];

    protected $operatorMap = [
        'ne' => "!=",
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];
}
