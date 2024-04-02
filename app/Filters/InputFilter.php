<?php 

namespace App\Filters;

use App\Interfaces\FilterContract;

class InputFilter extends BaseFilter implements FilterContract
{
    protected static string $view = 'input';
}
