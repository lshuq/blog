<?php

namespace App\Http\Controllers\Admin\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class HomeController extends Controller
{
	public function show($a_id){
		$comments = Comment::where('article_id',$a_id)->get();
	    return view('admin/article/comments/index')->withComments($comments);
	}
}
