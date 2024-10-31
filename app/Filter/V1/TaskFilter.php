<?php

namespace App\Filter\V1;


use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class TaskFilter extends ApiFilter
{

    protected $safeParams = 
    [
        'name'=>['eq'],
        'description' => ['eq'],
        'status'=>['eq'],
        'priority'=>['eq'],
        'assignedTo'=>['eq', 'lt', 'gt', 'lte', 'gte', 'ne'],
        'userId'=>['eq', 'lt', 'gt', 'lte', 'gte', 'ne'],
    ];
    protected $columnMap = 
    [
        'userId' => 'user_id'
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