<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Chef
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $Person =   $request->session()->get('Person');
        if (isset($Person)) {
            if($Person['User_Group'] == 'Chef'){
                return $next($request);
            }
        }
        return redirect()->back();
    }
}
