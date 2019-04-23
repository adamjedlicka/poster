<div class="comment">
    <a class="avatar">
        <img src="{{ $post->user->avatar }}" alt="avatar">
    </a>

    <div class="content">
        <a class="author" href="{{ route('users.show', $post->user) }}">
            {{ $post->user->first_name }} {{ $post->user->last_name }}
        </a>

        <div class="metadata">
            <span class="handle">{{ '@' }}{{ $post->user->handle }}</span>
            <span class="date" title="{{ $post->created_at->format('d.m.Y H:i') }}">{{ $post->created_at->diffForHumans() }}</span>
        </div>

        <p class="text" style="white-space: pre-wrap;">{!! $post->html !!}</p>

        <div class="actions">
            <like-post id="{{ $post->id }}" liked="{{ Auth::user() && Auth::user()->likes($post) }}" count="{{ $post->likeCount }}"></like-post>

            @can('delete', $post)
            <delete-post id="{{ $post->id }}"></delete-post>
            @endcan
        </div>
    </div>
</div>
