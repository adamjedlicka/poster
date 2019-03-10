<div class="ui pointing menu">
    <div class="header item">{{ config('app.name') }}</div>

    <a class="item {{ Route::is('home') ? 'active' : '' }}" href="{{ route('home') }}">{{ __('All posts') }}</a>

    <div class="right menu">
        <div class="item">
            <div class="ui transparent icon input">
                <input type="text" placeholder="Search...">
                <i class="search link icon"></i>
            </div>
        </div>

        @guest
        <a href="{{ route('login') }}" class="ui item {{ Route::is('login') ? 'active' : '' }}">{{ __('Login') }}</a>
        <a href="{{ route('register') }}" class="ui item {{ Route::is('register') ? 'active' : '' }}">{{ __('Register') }}</a>
        @else

        <a class="item" onclick="event.preventDefault(); $('#new-post-modal').modal('show')">
            <i class="green plus icon"></i>
            {{ __('New post') }}
        </a>

        <div id="new-post-modal" class="ui modal">
            <i class="close icon"></i>
            <div class="header">
                {{ __('New post') }}
            </div>
            <div class="content">
                @include('posts/_create')
            </div>
        </div>

        <a href="{{ route('users.show', Auth::user()) }}" class="ui item">
            <strong>
                {{ '@' }}{{ Auth::user()->handle }}
            </strong>
        </a>
        @endguest
    </div>
</div>
