<?php 

namespace App\Filters;

use App\Interfaces\FilterContract;

class CheckboxFilter extends BaseFilter implements FilterContract
{
    protected static string $view = 'checkbox';
}
