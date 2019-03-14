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
            <span class="date">{{ $post->created_at->diffForHumans() }}</span>
        </div>

        <p class="text" style="white-space: pre-wrap;">{!! $post->html !!}</p>

        <div class="actions">
            <a class="like" onclick="event.preventDefault(); $('#like-form-{{ $post->id }}').submit();">
                <i class="like icon {{ Auth::user() && Auth::user()->likes($post) ? 'red' : '' }}"></i> {{ $post->likeCount }} {{ str_plural('Like', $post->likeCount) }}
            </a> @can('delete', $post)
            <a class="delete" onclick="event.preventDefault(); $('#delete-form-{{ $post->id }}').submit();">
                <i class="trash icon"></i>
                {{ __('Delete') }}
            </a>

            <form id="delete-form-{{ $post->id }}" action="{{ route('posts.destroy', $post) }}" method="POST" style="display: none;">
                @csrf @method('DELETE')
            </form>
            @endcan

            <form id="like-form-{{ $post->id }}" action="{{ route('posts.like', $post) }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>
</div>
