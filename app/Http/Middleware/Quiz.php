<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Quiz
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
        $unit = $request->route('unit');
        $quizzes = auth()->user()->quizzes()->where('unit_id',$unit->id)->get();

        if ($quizzes) {
            foreach ($quizzes as $quiz) {
                if($quiz->done == 1)return redirect()->back();
            }
        }

        return $next($request);
    }
}
