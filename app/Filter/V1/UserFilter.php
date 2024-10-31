<?php

namespace App\Filter\V1;


use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class UserFilter extends ApiFilter
{

    protected $safeParams = 
    [
        'name'=>['eq'],
        'email' => ['eq'],
        'id'=>['eq', 'lt', 'gt', 'lte', 'gte', 'ne'],
    ];
    protected $operatorMap = 
    [
        'eq' => '=',
        'lt' => '<',
        'gt' => '>',
        'lte' => '<=',
        'gte' => '>=',
        'ne' => '!=',
    ];

}