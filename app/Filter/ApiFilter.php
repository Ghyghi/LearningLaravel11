<?php

namespace App\Filter;

use App\Filter\ApiFilter;
use Illuminate\Http\Request;

class ApiFilter
{

    protected $safeParams = [];
    protected $columnMap = [];
    protected $operatorMap = [];


    /**
     * Transform the request into an array.
     *
     * @return array<string, mixed>
     */
    public function transform(Request $request): array
    {
        $queryitems = [];
        foreach ($this->safeParams as $parm => $operator) {
            $query = $request->query($parm);
        
            if (!isset($query)) {
                continue;
            }
            $column = $this->columnMap[$parm] ?? $parm;

            foreach ($operator as $op) {
                if (isset($query[$op])) {
                    $queryitems[] = [$column, $this->operatorMap[$op], $query[$op]];
                }
            }
        }
        return $queryitems;
    }
}