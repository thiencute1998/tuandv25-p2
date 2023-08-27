<div id="breaking-news" class="breaking-news">

    <span class="breaking-news-title"><i class="fa fa-bolt"></i> <span>Bài viết mới</span></span>
    <ul>
        @foreach ($breakNews as $new)
            <li><a href="{{route('get-post', ['post'=> $new->slug])}}" title="{{$new->name}}">{{$new->name}}</a></li>
        @endforeach
    </ul>

    <script type="text/javascript">
        jQuery(document).ready(function () {
            jQuery('#breaking-news ul').innerFade({animationType: 'fade', speed: 750, timeout: 3500});
        });
    </script>

</div> <!-- .breaking-news -->
