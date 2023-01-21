<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Series;
use App\Models\Book;
// use App\Models\Topic;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        // $series = Series::take(4)->get();
        $books = Book::take(6)->get();
        return view('welcome', compact('books'));
    }
    public function dashboard(){
        if(Auth::user()->type === 1){
            return view('dashboard');
        }else{
            return redirect()->route('home');
        }
    }
    public function archive($archive_type, $slug){
        // $archive_types = ['series','duration','level','platform','topic'];
        // if(!in_array($archive_type, $archive_types)){
        //     return abort(404);
        // }

        // if($archive_type == 'duration'){
        //     $allowed_duration = ['1-5-hours','5-10-hours','10-plus-hours'];
        //     if(!in_array($slug,$allowed_duration)){
        //         return abort(404);
        //     }
        // }

        // if($archive_type === 'series'){
        //     $item = Series::where('slug',$slug)->first();
        //     if(empty($item)){
        //         return abort(404);
        //     }
        //     $title = 'Courses on '.$item->name;
        //     $courses = $item->courses()->paginate(12);
        // }elseif($archive_type === 'duration'){
        //     if($slug=='1-5-hours'){
        //         $item = '1-5 hours';
        //         $duration_db_key = 0;
        //     }elseif($slug=='5-10-hours'){
        //         $item = '5-10 hours';
        //         $duration_db_key = 1;
        //     }elseif($slug=='10-plus-hours'){
        //         $item = '10+ hours';
        //         $duration_db_key = 2;
        //     }
        //     $title = 'Courses with duration '.$item;
        //     $courses = Course::where('duration',$duration_db_key)->paginate(12);
        // }elseif($archive_type === 'topic'){
        //     $item = Topic::where('slug',$slug)->first();
        //     if(empty($item)){
        //         return abort(404);
        //     }
        //     $title = 'Courses on '.$item->name;
        //     $courses = $item->courses()->paginate(12);
        // }

        // return view('archive.single',[
        //     'title' => $title,
        //     'courses' => $courses
        // ]);
    }
}
