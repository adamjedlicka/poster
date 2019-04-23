<div class="ui pointing menu">
    <div class="ui floating dropdown item">
        <i class="bars icon"></i>
        <strong>
            {{ config('app.name') }}
        </strong>
        <div class="menu">
            <a class="item {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('Posts') }}</a>
            <a class="item {{ Route::is('topics.*') ? 'active' : '' }}" href="{{ route('topics.index') }}">{{ __('Topics') }}</a>
        </div>
    </div>

    <div class="right menu">

        @guest
        <a href="{{ route('login') }}" class="ui item {{ Route::is('login') ? 'active' : '' }}">{{ __('Login') }}</a>
        <a href="{{ route('register') }}" class="ui item {{ Route::is('register') ? 'active' : '' }}">{{ __('Register') }}</a>
        @else

        <a id="new-post-btn" class="ui item">
            New post
        </a>

        @if(Auth::user()->unreadNotifications->count())
        <div class="ui floating dropdown item">
            <i class="bell outline icon"></i>
            <div class="menu">
                @foreach(Auth::user()->unreadNotifications as $notification)
                @include('notifications/' . $notification->data['template'])
                @endforeach

                <div class="ui divider"></div>

                <post-button url="{{ route('notifications.readAll') }}" class="ui item">Mark notifications as read</post-button>
            </div>
        </div>
        @endif

        <div class="ui floating dropdown item">
            <strong>
                {{ '@' . Auth::user()->handle }}
            </strong>
            <div class="menu">
                <a href="{{ route('users.show', Auth::user()) }}" class="ui item">
                    Show profile
                </a>
                <post-button class="ui item" url="{{ route('logout') }}">Logout</post-button>
            </div>
        </div>
        @endguest
    </div>
</div>
