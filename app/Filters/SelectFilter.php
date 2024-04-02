<?php 

namespace App\Filters;

use App\Interfaces\FilterContract;

class SelectFilter extends BaseFilter implements FilterContract
{
    protected static string $view = 'select';
}
