<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAvailabilityCake
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
        $response = $next($request);
        
        if( $response->status() !== 201 )
        {
            return $response;
        }

        $interestedEmail = \App\Models\InterestedEmail::orderBy('id', 'DESC')->first();

        if($interestedEmail->cakes->quantity > 0)
        {
            //send email in queue
            $cakeMail = new \stdClass;
            $cakeMail->subject = 'Bolo disponível';
            $cakeMail->email = $request->email;
            $cakeMail->name = $interestedEmail->cakes->name;

            \App\Jobs\SendCakeJob::dispatch($cakeMail)->delay(now()->addSeconds(15));
        }

        return $response;
    }
}
