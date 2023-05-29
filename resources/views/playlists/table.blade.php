<x-app-layout>
    <x-slot name="title">
        Table Playlists
    </x-slot>

    <x-slot name="header">
        Table Playlists
    </x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Name</x-th>
            <x-th>Published</x-th>
            <x-th>Action</x-th>
        </tr>

        @foreach ($playlists as $i => $item)
        <tr>
            <x-td> {{$i + $playlists->firstItem()}} </x-td>
            <x-td>
                <div>
                    <a class="block text-sm text-blue-500 no-underline hover:text-blue-600 hover:underline" href="{{ route('videos.table', $item->slug) }}">
                        {{$item->name}}
                    </a>
                    @foreach ($item ->tags as $tag)
                       <span class="mr-1 text-xs"> {{$tag->name}}</span>
                    @endforeach
                </div>
            </x-td>
            <x-td>{{$item->created_at->format("d F, Y ")}}</x-td>
            <x-td>
           <div class="flex items-center">
						<a
								class="mr-2 text-xs font-medium text-blue-500 underline uppercase hover:text-blue-600"
								href="{{ route('videos.create', $item->slug)}}">Add
						</a>
						<a
								class="mr-2 text-xs font-medium text-blue-500 underline uppercase hover:text-blue-600"
								href="{{ route('playlists.edit', $item->slug)}}">Edit
						</a>
                        <div x-data="{ modalIsOpen:false }">
                            <x-modal state={modalIsOpen} x-show="modalIsOpen" title="Are You Sure">
                                <form action="{{route('playlists.delete', $item->slug)}}" method="post">
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
            </x-td>
        </tr>
        @endforeach
    </x-table>

    {{$playlists}}
</x-app-layout>
