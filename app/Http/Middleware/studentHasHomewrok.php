<?php

namespace App\Http\Middleware;

use App\Models\Homework;
use App\Models\StoryRead;
use App\Models\Student;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\Builder\Stub;

class studentHasHomewrok
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
        $student = Student::where('user_id', Auth::user()->id)->first();
        
        if($student){
            $undoneHomework = Collect(DB::select(DB::raw("SELECT COUNT(id) as count  FROM homeworks where story_id NOT IN (SELECT story_id from story_reads where student_id = $student->id AND updated_at >= homeworks.created_at ) AND classe_id = $student->classe_id")));
            if($undoneHomework->first()->count>0){
                $request->session()->put('undoneHomework', $undoneHomework->first()->count);
                
            }else{
                $request->session()->forget('undoneHomework');
            }
            
        }
        return $next($request);
    }
}
