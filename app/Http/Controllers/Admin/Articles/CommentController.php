<?php

namespace App\Http\Controllers\Admin\Articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;

class CommentController extends Controller
{
	private $view_path = 'admin/article/comments/';
	public function show($a_id){
        $comments = Comment::where('article_id',$a_id)->get();
        return view($this->view_path.'index')->withComments($comments);
    }    

	public function edit($a_id,$id){
		return view($this->view_path.'edit')->withComment(Comment::find($id));
	}
	
	public function update(Request $request,$a_id,$id){
		$this->validate($request,[
            'nickname' => 'required|unique:comments,nickname,'.$id.'|max:255',
            'content' => 'required',
        ]);
		$comment = Comment::find($id);
		$comment->article_id = (int)$a_id;
		$comment->nickname = $request->get('nickname');
		$comment->email = $request->get('email');
		$comment->website = $request->get('website');
		$comment->content = $request->get('content');
		if($comment->save()){
			return redirect('admin/articles/'.$a_id.'/comments');
		} else {
			return redirect()->back()->withInput()->withErrors('edit failed!');	
		}
	}
	
	public function destroy($a_id,$id){
		Comment::find($id)->delete();
		return redirect()->back()->withInput()->withError('delete success!');
	}

}
