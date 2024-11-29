<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;
use App\Filters\ApiFilter;

class UsersFilter extends ApiFilter {
    protected $safeParms = [
        'fullname' => ['eq', 'ne'],
        'email' => ['eq','ne'],
        'address' => ['eq', 'ne'],
        'phoneNumber' => ['eq', 'ne'],
        'id' => ['eq', 'ne', 'lt', 'lte', 'gt', 'gte']
    ];

    protected $columnMap = [
        'phoneNumber' => 'phone_number',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'ne' => '!='
    ];
}
