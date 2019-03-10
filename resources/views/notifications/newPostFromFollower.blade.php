<a href="{{ route('users.show', $notification->data['user']['id']) }}" class="ui item">
    New post from {{ $notification->data['user']['handle'] }}
</a>
