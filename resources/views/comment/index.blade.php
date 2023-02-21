@foreach($comment as $key=>$cmt)
    <h1>{{$cmt->title}}
        {{$cmt->content}}
    </h1>
@endforeach
