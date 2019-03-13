<div class="ui comments">
    @foreach ($posts as $post)
    @include('posts.post')
    @endforeach
</div>

{{ $posts->links() }}
