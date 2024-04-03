<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class QueryHandler
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $query = $request->query();
        $nestedFilters = [];
        foreach ($query as $key => $value) {
            $nestedFilters[$key] = $value;
            unset($request[$key]);
        }
        
        $request->merge(['filters' => $nestedFilters]);
        return $next($request);
    }
}
