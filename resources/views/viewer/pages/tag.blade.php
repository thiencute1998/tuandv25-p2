@extends('viewer.layouts.master')
@section('main-content')
    <div class="content">

        <div xmlns:v="http://rdf.data-vocabulary.org/#" id="crumbs"><span typeof="v:Breadcrumb"><a
                    rel="v:url" property="v:title" class="crumbs-home"
                    href="{{route('index')}}">Home</a></span> <span class="delimiter">/</span> <span
                class="current">{{$tag->name}}</span></div>

        <div class="page-head">

            <h1 class="page-title">
                Tag Archives: {{$tag->name}} </h1>

            <a class="rss-cat-icon ttip"
               href="https://giaophanbacninh.org/category/gia-dinh-bac-ninh-hoa-ky/feed/"
               original-title="Feed Subscription"><i class="fa fa-rss"></i></a>

            <div class="stripe-line"></div>

        </div>


        <div class="post-listing archive-box">
            @foreach($posts as $post)
                <article class="item-list">

                    <h2 class="post-box-title">
                        <a href="{{route('get-post', ['post'=> $post->slug])}}">{{$post->name}}</a>
                    </h2>

                    <p class="post-meta">
                        <span class="tie-date"><i class="fa fa-clock-o"></i>5 Tháng Bảy, 2022</span>
                        <span class="post-cats"><i class="fa fa-folder"></i>
                                @if($post->category)
                                <a
                                    href="{{route('get-cate', ['cate'=> $tag->slug])}}" rel="category tag">{{$post->category->name}}
                                    </a>
                            @endif

                            <span class="post-comments"><i class="fa fa-comments"></i><a
                                    href="#">0</a></span>

                    </p>
                    <div class="post-thumbnail tie-appear em-list-img">
                        <a href="{{route('get-post', ['post'=> $post->slug])}}">
                            <img width="310" height="165" alt=""
                                 data-src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                 class="attachment-tie-medium size-tie-medium wp-post-image tie-appear ls-is-cached lazyloaded"
                                 src="{{asset("upload/admin/post/image/" . $post->image)}}">
                            <noscript><img width="310" height="165"
                                           src="{{asset("upload/admin/post/image/" . $post->image)}}"
                                           class="attachment-tie-medium size-tie-medium wp-post-image" alt=""/>
                            </noscript>
                            <span class="fa overlay-icon"></span>
                        </a>
                    </div><!-- post-thumbnail /-->

                    <div class="entry">
                        <p>{{substr(strip_tags($post->content), 0, 100)}} …</p>
                        <a class="more-link" href="{{route('get-post', ['post'=> $post->slug])}}">Read
                            More »</a>
                    </div>

                    <div class="clear"></div>
                </article><!-- .item-list -->

            @endforeach
        </div>

        <div class="pagination">
            <span class="pages">Page {{$posts->currentPage()}} of {{$posts->lastPage()}}</span>
            {{--                <a--}}
            {{--                    href="https://giaophanbacninh.org/category/gia-dinh-bac-ninh-hoa-ky/">&laquo;--}}
            {{--                </a>--}}
            @for ($i = 1; $i <= $posts->lastPage(); $i++)
                @if($posts->currentPage() == $i)
                    <span class="current">{{$i}}</span>
                @else
                    <a
                        href="{{ $posts->url($i) }}" class="page" title="{{$i}}">{{$i}}</a>
                @endif
            @endfor

            {{--                <span id="tie-next-page">   --}}
            {{--					<a href="https://giaophanbacninh.org/category/gia-dinh-bac-ninh-hoa-ky/page/3/">&raquo;</a>--}}
            {{--                </span>--}}
        </div>
        {{--            @if ($posts->lastPage() > 1)--}}
        {{--                <ul class="pagination">--}}
        {{--                    <li class="{{ ($posts->currentPage() == 1) ? ' disabled' : '' }}">--}}
        {{--                        <a href="{{ $posts->url(1) }}">Previous</a>--}}
        {{--                    </li>--}}
        {{--                    @for ($i = 1; $i <= $posts->lastPage(); $i++)--}}
        {{--                        <li class="{{ ($posts->currentPage() == $i) ? ' active' : '' }}">--}}
        {{--                            <a href="{{ $posts->url($i) }}">{{ $i }}</a>--}}
        {{--                        </li>--}}
        {{--                    @endfor--}}
        {{--                    <li class="{{ ($posts->currentPage() == $posts->lastPage()) ? ' disabled' : '' }}">--}}
        {{--                        <a href="{{ $posts->url($posts->currentPage()+1) }}" >Next</a>--}}
        {{--                    </li>--}}
        {{--                </ul>--}}
        {{--            @endif--}}

    </div>
    <!-- .content -->
@endsection
