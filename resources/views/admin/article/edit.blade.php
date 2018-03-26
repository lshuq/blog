@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div ciass="panel panel-default">
                <div class="panel-heading">Edit</div>
                <div class="panel-body">
		    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
                    <form action="{{ url('admin/articles/'.$article->id) }}" method="POST">
			{{ method_field('PATCH') }}
                        {!! csrf_field() !!}
                        <input type="text" name="title" class="form-control" required="required" placeholder="input title" value="{{$article->title}}">
                        <br>
                        <textarea name="body" rows="10" class="form-control" required="required" placeholder="input article body">{{$article->body}}</textarea>
                        <br>		
                        <button class="btn btn-lg btn-info">edit article</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

