@extends('viewer.layouts.master')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
@section('meta')
    <meta property="og:title" content="Giáo phận Bắc Ninh"/>
    <meta property="og:description" content=""/>
    <meta property="og:url" content="https://giaophanbacninh.org/"/>
    <meta property="og:site_name" content="Giáo phận Bắc Ninh"/>
@endsection
@section('main-content')
    <div class="content">

        <div xmlns:v="http://rdf.data-vocabulary.org/#" id="crumbs"><span typeof="v:Breadcrumb"><a
                    rel="v:url" property="v:title" class="crumbs-home"
                    href="{{route('index')}}">Home</a></span> <span class="delimiter">/</span> <span
                class="current">Event</span></div>

        <div class="page-head">

            <h1 class="page-title">
                Blog Archives
            </h1>

            <a class="rss-cat-icon ttip"
               href="#"
               original-title="Feed Subscription"><i class="fa fa-rss"></i></a>

{{--            <div class="stripe-line"></div>--}}

        </div>


        <div class="post-listing archive-box">
            @foreach($events as $event)
                <article class="item-list">

                    <h2 class="post-box-title">
                        <a href="{{route('get-event-calendar', ['event'=> $event->slug])}}">{{$event->name}}</a>
                    </h2>

                    <p class="post-meta">
                        <span class="tie-date"><i class="fa fa-clock-o"></i>{{$event->fullDate}}</span>
                        <span class="post-cats"><i class="fa fa-folder"></i>
{{--                            <span class="post-comments"><i class="fa fa-comments"></i><a--}}
{{--                                    href="#">0</a></span>--}}

                    </p>
                    <div class="post-thumbnail tie-appear em-list-img">
                        <a href="{{route('get-event-calendar', ['event'=> $event->slug])}}">
                            <img width="310" height="165" alt=""
                                 data-src="{{asset("upload/admin/calendar/image/" . $event->image)}}"
                                 class="attachment-tie-medium size-tie-medium wp-post-image tie-appear ls-is-cached lazyloaded"
                                 src="{{asset("upload/admin/calendar/image/" . $event->image)}}">
                            <noscript><img width="310" height="165"
                                           src="{{asset("upload/admin/calendar/image/" . $event->image)}}"
                                           class="attachment-tie-medium size-tie-medium wp-post-image" alt=""/>
                            </noscript>
                            <span class="fa overlay-icon"></span>
                        </a>
                    </div><!-- post-thumbnail /-->

                    <div class="entry em-read-more-5">
                        <p>{{strip_tags($event->content)}}</p>
{{--                        <a class="more-link" href="{{route('get-event-calendar', ['event'=> $event->slug])}}">Chi tiết »</a>--}}
                    </div>

                    <div class="clear"></div>
                </article><!-- .item-list -->

            @endforeach
        </div>

{{--        <div class="pagination">--}}
{{--            <span class="pages">Page {{$events->currentPage()}} of {{$events->lastPage()}}--}}
{{--            </span>--}}
{{--                            <a--}}
{{--                                href="https://giaophanbacninh.org/category/gia-dinh-bac-ninh-hoa-ky/">&laquo;--}}
{{--                            </a>--}}
{{--            <?php $i =1; ?>--}}
{{--            @while($i <= $events->lastPage())--}}
{{--                @if($events->lastPage() > 10)--}}
{{--                    @if($events->currentPage() <= $events->lastPage() - 3)--}}
{{--                        @for($i = $events->currentPage(); $i <= $events->currentPage() + 2 ; $i++)--}}
{{--                            @if($events->currentPage() == $i)--}}
{{--                                <span class="current">{{$i}}</span>--}}
{{--                            @else--}}
{{--                                <a--}}
{{--                                    href="{{ $events->url($i) }}" class="page" title="{{$i}}">{{$i}}</a>--}}
{{--                            @endif--}}
{{--                        @endfor--}}
{{--                    @endif--}}
{{--                @else--}}
{{--                    @if($events->currentPage() == $i)--}}
{{--                        <span class="current">{{$i}}</span>--}}
{{--                    @else--}}
{{--                        <a--}}
{{--                            href="{{ $events->url($i) }}" class="page" title="{{$i}}">{{$i}}</a>--}}
{{--                    @endif--}}
{{--                @endif--}}
{{--                <?php $i++ ?>--}}
{{--            @endwhile--}}

{{--            @if(($events->lastPage() > 10 && $events->currentPage() <= $events->lastPage() - 3))--}}
{{--            <span id="tie-next-page">--}}
{{--                <span class="extend">...</span>--}}
{{--                <a href="{{ $events->url($events->lastPage()) }}">Last &raquo;</a>--}}
{{--            </span>--}}
{{--            @endif--}}
{{--        </div>--}}
        <div class="pagination">
            <span class="pages">Page {{$events->currentPage()}} of {{$events->lastPage()}}</span>
            {{--                <a--}}
            {{--                    href="https://giaophanbacninh.org/category/gia-dinh-bac-ninh-hoa-ky/">&laquo;--}}
            {{--                </a>--}}
            @for ($i = 1; $i <= $events->lastPage(); $i++)
                @if($events->currentPage() == $i)
                    <span class="current">{{$i}}</span>
                @else
                    <a
                        href="{{ $events->url($i) }}" class="page" title="{{$i}}">{{$i}}</a>
                @endif
            @endfor

            {{--                <span id="tie-next-page">   --}}
            {{--					<a href="https://giaophanbacninh.org/category/gia-dinh-bac-ninh-hoa-ky/page/3/">&raquo;</a>--}}
            {{--                </span>--}}
        </div>

    </div>
    <!-- .content -->
@endsection
