<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Http\Middleware\Project;
use Symfony\Component\HttpFoundation\Response;

class CheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $projectID = $request->route('project');
        $project = Project::find($projectID);
        if (auth()->user()->id == $project[0]->user_id) {
            return $next($request);
        }
        return response('Unauthorized', 403);
    }
}
