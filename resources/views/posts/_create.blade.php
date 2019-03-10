<form action="{{ route('posts.store') }}" method="POST" class="ui form">
    @csrf

    <div class="field">
        <textarea name="text" placeholder="{{ __('Say something...') }}" style="resize: none"></textarea>
    </div>
    <button class="ui button" type="submit">Submit</button>
</form>
