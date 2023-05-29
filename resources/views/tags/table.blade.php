<x-app-layout>
    <x-slot name="title">{{ $title }}</x-slot>
    <x-slot name="header">{{ $title }}</x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Playlist</x-th>
            @can('delete tags')
            <x-th>Action</x-th>
            @endcan
        </tr>

            @foreach ($tags as $i => $tag)
              <tr>
                <x-td>{{$i + $tags->firstItem()}}</x-td>
                <x-td>{{ $tag -> name}}</x-td>
                <x-td>{{ $tag -> playlists_count }}</x-td>
                <x-td>
                   @can('delete tags')
                        <div class="flex items-center">
                            <a class="mr-2 text-xs font-medium text-blue-500 underline uppercase hover:text-blue-600" href="{{ route('tags.edit', $tag->slug) }}">
                                Edit
                            </a>
                            <div x-data="{ modalIsOpen:false }">
                                <x-modal state={modalIsOpen} x-show="modalIsOpen" title="Are You Sure">
                                    <form action="{{route('tags.delete', $tag->slug)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <x-button>
                                            Yes
                                        </x-button>
                                        <x-button type="button" @click="modalIsOpen = false">
                                            Nope
                                        </x-button>
                                    </form>
                                </x-modal>
                                <button @click="modalIsOpen = true" class="text-xs font-medium text-red-500 underline uppercase focus:outline-none hover:text-red-600">
                                    Delete
                                </button>
                            </div>
                        </div>
                   @endcan
                </x-td>
              </tr>
            @endforeach

    </x-table>

    {{ $tags->links() }}
</x-app-layout>
