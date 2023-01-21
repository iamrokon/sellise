<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Platform;
use App\Models\Series;

class CourseController extends Controller
{
    public function index(){
    	$courses = Course::latest()->take(12)->get();
    	return response()->json($courses);
    }
    public function allCourses(Request $request){
    	$search = $request->search;
        $courses = Course::where(function ($query) use ($request) {
            if(!empty($request->search)){
                $query->where('name','like','%'.$request->search.'%');
            }
            if(!empty($request->duration)){
				$duration = [];
				if(in_array('1h-5h', $request->duration)){
					$duration[] = 0;
				}
				if(in_array('5h-10h', $request->duration)){
					$duration[] = 1;
				}
				if(in_array('10h+', $request->duration)){
					$duration[] = 2;
				}
				if(!empty($duration)){
					$query->whereIn('duration', $duration);	
				}
			}

			if(!empty($request->platforms)){
				$query->whereIn('platform_id', $request->platforms);
			}
        })->paginate(12);

        $platforms = Platform::select(['id','name'])->get();
        $series = Series::select(['id','name'])->get();

        return response()->json([
        	'courses' => $courses,
        	'platforms' => $platforms,
        	'series' => $series,
        ]);
    }
    public function single($slug){
    	$course = Course::where('slug', $slug)->first();
    	return response()->json($course);
    }
}
