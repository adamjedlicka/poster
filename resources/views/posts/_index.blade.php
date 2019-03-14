<div class="ui grid">

    <div class="ui row">
        <div class="ui twelve wide column">
            <h2 class="ui header">{{ $title }}</h2>
        </div>

        <div class="ui right floated right aligned four wide column">
            <div class="ui selection dropdown floated right">
                <div class="text">Sort by</div>
                <i class="dropdown icon"></i>
                <div class="menu">
                    <a href="?sort=newest" class="item">Newest</a>
                    <a href="?sort=oldest" class="item">Oldest</a>
                </div>
            </div>
        </div>
    </div>

    <div class="ui row">
        <div class="ui sixteen wide column">
            <div class="ui comments">
                @foreach ($posts as $post)
                @include('posts.post')
                @endforeach
            </div>

            {{ $posts->links() }}
        </div>
    </div>

</div>
