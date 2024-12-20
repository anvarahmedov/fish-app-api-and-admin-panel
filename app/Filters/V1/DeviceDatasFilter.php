<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class DeviceDatasFilter extends ApiFilter {
    protected $safeParms = [
        'deviceId' => ['eq', 'ne'],
        'oxygen' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'light' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'temperature' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
        'ph' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte'],
    ];

    protected $columnMap = [
        'deviceId' => 'device_id',
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
