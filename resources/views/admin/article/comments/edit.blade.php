<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Learn Laravel 5</title>

    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
   
        <div id="comments" style="margin-top: 50px;">
			@if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif
			<form action="{{ url('admin/articles/'.$comment->article_id.'/comments/'.$comment->id) }}" method="POST">
            {{ method_field('PATCH') }}
            {!! csrf_field() !!}

            <div id="new">
                <form action="{{ url('comment') }}" method="POST">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label>Nickname</label>
                        <input type="text" name="nickname" class="form-control" style="width: 300px;" required="required" value="{{$comment->nickname}}">
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" style="width: 300px;" value="{{$comment->email}}">
                    </div>
                    <div class="form-group">
                        <label>Home page</label>
                        <input type="text" name="website" class="form-control" style="width: 300px;" value="{{$comment->website}}">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <textarea name="content" id="newFormContent" class="form-control" rows="10" required="required">{{$comment->content}}</textarea>
                    </div>
                    <button type="submit" class="btn btn-lg btn-success col-lg-12">edit Comment</button>
                </form>
            </div>

            <script>
            </script>
            <div class="conmments" style="margin-top: 100px;">
           </div>
        </div>

    </div>

</body>
</html>

