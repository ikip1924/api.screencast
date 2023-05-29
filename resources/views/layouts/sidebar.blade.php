<div class="w-1/5 min-h-screen px-4 py-6 bg-gray-800">
    <div class="mb-8">
        <header class="px-2 font-medium text-gray-400 uppercase text:xs">
            Main
        </header>
        <a href="#" class="block px-2 py-2 text-gray-200">Dashboard</a>
    </div>

    @can('create playlists')
    <div class="mb-8">
        <header class="px-2 font-medium text-gray-400 uppercase text:xs">
            Playlist
        </header>
        <a href="{{route('playlists.create')}}" class="block px-2 py-2 text-gray-200">Create</a>
        <a href="{{route('playlists.table')}}" class="block px-2 py-2 text-gray-200">Table</a>
    </div>
    @endcan

    @can('create tags')
        <div class="mb-8">
            <header class="px-2 font-medium text-gray-400 uppercase text:xs">
                Tags
            </header>
            <a href="{{route('tags.create')}}" class="block px-2 py-2 text-gray-200">Create</a>
            <a href="{{route('tags.table')}}" class="block px-2 py-2 text-gray-200">Table</a>
        </div>
    @endcan

    @can('show users')
        <div class="mb-8">
            <header class="px-2 font-medium text-gray-400 uppercase text:xs">
                Users
            </header>
            <a href="#" class="block px-2 py-2 text-gray-200">Table</a>
        </div>

        @endcan
    <form method="POST" action="{{ route('logout') }}">
        @csrf

        <a class="block px-2 py-2 text-gray-200 href=" route('logout')"
                onclick="event.preventDefault();
                            this.closest('form').submit();">
            {{ __('Log Out') }}
        </a>
    </form>
</div>
