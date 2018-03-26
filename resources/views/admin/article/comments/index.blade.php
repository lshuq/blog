@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Comments Manage</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            {!! implode('<br>', $errors->all()) !!}		
                        </div>
                    @endif
					@foreach($comments as $comment)
					<hr>
                        <div class="article">
                            <h4>{{ $comment->email }}</h4>
                            <div class="content">
                                <p>
                                    {{ $comment->content }}
                                </p>
                            </div>
                        </div>
                           <a href="{{ url('admin/articles/'.$comment->article_id.'/comments/'.$comment->id.'/edit') }}" class="btn btn-success">Edit</a>
							
							<form action="{{ url('admin/articles/'.$comment->article_id.'/comments/'.$comment->id) }}" method="POST" style="display: inline;">
							{{ method_field('DELETE') }}
                            {{ csrf_field() }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>

					@endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

