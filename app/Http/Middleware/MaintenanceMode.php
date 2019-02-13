<?php

namespace App\Http\Middleware;

use Closure;
use DB;

class MaintenanceMode
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		$isMaintenance = DB::table('config')
			->where('name', '=', 'maintenance')->first();
		if ($isMaintenance->value == 'on') {
			return redirect('/maintenance');
		} else {
			return $next($request);
		}
	}
}
