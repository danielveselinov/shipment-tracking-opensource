<nav class="bg-gray-100 px-2 sm:px-4 py-2.5 rounded">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{ route('welcome') }}">
            <x-application-logo class="w-auto h-10 md:h-16"></x-application-logo>
        </a>
        <div class="flex items-center">
            <div class="mr-3">
                <button type="button" data-dropdown-toggle="language-dropdown-menu"
                        class="inline-flex items-center justify-center px-4 py-2 text-sm text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-200">
                    <x-dynamic-component component="flag-language-{{ app()->getLocale() }}"
                                         class="w-6 h-6 mr-2 rounded-full"/>
                    {{ strtoupper(app()->getLocale()) }}
                </button>
                <div
                    class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow "
                    id="language-dropdown-menu">
                    @csrf
                    <div class="py-2">
                        @foreach(config('app.available_locales') as $locale)
                            <form method="POST" action="{{ route('set-locale', $locale) }}">
                                @csrf
                                <a href="{{ route('set-locale', $locale) }}"
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                   role="menuitem" onclick="event.preventDefault();
                                   this.closest('form').submit()">
                                    <div class="inline-flex items-center">
                                        <x-dynamic-component component="flag-language-{{ $locale }}"
                                                             class="w-6 h-6 mr-2 rounded-full"/>
                                        {{ strtoupper($locale) }}
                                    </div>
                                </a>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
            @auth
                <a href="{{ route('dashboard') }}" class="text-gray-500 underline">{{ __('welcome.dashboard') }}</a>
            @endauth
            @guest
                <a href="{{ route('login') }}" class="text-gray-500 underline">{{ __('welcome.login') }}</a>
            @endguest
        </div>
    </div>
</nav>
