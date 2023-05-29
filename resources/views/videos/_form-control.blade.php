@csrf
    <div class="mb-6">
        <x-label for="title" :value="__('Title')" />
        <x-input id="title" class="block w-full mt-1" type="text" name="title" :value="old('title') ?? $video->title" autofocus required  />
        @error('title')
            <div class="mt-2 text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-6">
        <x-label for="unique_video_id" :value="__('Unique Code')" />

        <x-input id="unique_video_id" class="block w-full mt-1" type="text" name="unique_video_id" :value="old('unique_video_id') ?? $video->unique_video_id" required  />
        @error('unique_video_id')
            <div class="mt-2 text-red-500">{{ $message }}</div>
        @enderror
    </div>

    <div class="flex lg:-mx-2">
        <div class="px-2 mb-6 w-ful lg:w-1/2">
        <x-label for="episode" :value="__('Episode')" />
        <x-input id="episode" class="block w-full mt-1" type="text" name="episode" :value="old('episode') ?? $video->episode" required  />
        @error('episode')
            <div class="mt-2 text-red-500">{{ $message }}</div>
        @enderror
        </div>
        <div class="px-2 mb-6 w-ful lg:w-1/2">
            <x-label for="runtime" :value="__('Runtime')" />
            <x-input id="runtime" class="block w-full mt-1" type="text" name="runtime" :value="old('runtime') ?? $video->runtime" required  />
            @error('runtime')
                <div class="mt-2 text-red-500">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="mb-6">
        <label for="intro" class="flex items-center">
            <input type="checkbox" {{ $video->intro ? 'checked' : '' }} name="intro" id="intro" class="mr-2 text-blue-500 border-gray-300 rounded focus:outline-none focus:ring-transparent">
            <span class="text-sm font-medium uppercase selected-none">Intro</span>
        </label>

    </div>

    <x-button>{{ $submit }}</x-button>
