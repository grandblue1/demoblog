<?php 

namespace App\Filters;

use App\Interfaces\FilterContract;

class DateFilter extends BaseFilter implements FilterContract
{
    protected static string $view = 'date';
    protected static string $type = 'date';
}
