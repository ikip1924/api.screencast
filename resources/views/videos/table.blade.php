<x-app-layout>
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="header">
        {{ $title }}
    </x-slot>

    <x-table>
        <tr>
            <x-th>#</x-th>
            <x-th>Title</x-th>
            <x-th>intro</x-th>
            <x-th>Action</x-th>
        </tr>

        @foreach ($videos as $i => $item)
        <tr>
            <x-td> {{ $i + $videos->firstItem() }} </x-td>
            <x-td>{{ $item->title }}</x-td>
            <x-td>
                <span class="text-xs font-semibold uppercase">{{ $item->intro? 'Yes' : 'No' }}</span>
            </x-td>
            <x-td>
               <div class="flex items-center">
                <a class="mr-2 text-xs font-medium text-blue-500 underline uppercase hover:text-blue-600" href="{{ route('videos.edit', [$playlist, $item->unique_video_id]) }}">Edit</a>
                <div x-data="{ modalIsOpen:false }">
                    <x-modal state={modalIsOpen} x-show="modalIsOpen" title="Are You Sure">
                         <div class="mb-5">
                                    <h4 class="text-lg capitalize">{{ $item->title }}</h4>
                                    <span class="text-xs text-gray-600 uppercase">
                                        Episode {{ $item->episode }} - Runtime {{ $item->runtime }}
                                    </span>
                         </div>
                        <form action="{{route('videos.delete', [$playlist->slug, $item->unique_video_id ])}}" method="post">
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

    {{ $videos->links() }}
</x-app-layout>
