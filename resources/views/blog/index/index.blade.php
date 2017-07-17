@extends('blog.layout')
@section('content')
<!--begin main container-->
<div class="container blog">
    <div id="content" class="row">
        <!--文章-->
        <div class="col-md-9" >
            @foreach( $articles as $v)
                <article class="panel article">
                    <div class="content line-limit-length">
                        <h3>{{ $v['title'] }}</h3>
                        <p> {{ $v->author->adminname or ''}} 发布于 {{$v['created_at']}}</p>
                        <hr>
                        <p class="line-limit-length">{{$v['content']}}</p>
                        <a href="{{ url('blog/article',['id'=>$v['id']]) }}"><button type="button" class="btn btn-info">阅读</button></a>
                    </div>
                </article>
            @endforeach
                {{ $articles->links() }}
        </div>
        <!--end 文章-->
        <!--content right-->

        <div class="col-md-3 ">
            <div class="panel author_info">

            </div>
        </div>

        <!--end content right-->
    </div>
    <!-- begin scroll to top btn -->
    <div style="" id="toTop"><button type="button" class="btn btn-primary btn-md"><span class="glyphicon glyphicon-eject" title="返回顶部"></span></button></div>
    <!-- end scroll to top btn -->
</div>
<!--end main container-->
    @endsection