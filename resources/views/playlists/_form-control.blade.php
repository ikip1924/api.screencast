@csrf
    <div class="mb-6">
        <input type="file" name="thumbnail" id="thumbnail" value="">
        @error('thumbnail')
            <div class="mt-2 text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <x-label for="name" :value="__('Name')" />

        <x-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name') ?? $playlist->name" required  />
        @error('name')
            <div class="mt-2 text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <x-label for="price" :value="__('Price')" />

        <x-input id="price" class="block w-full mt-1" type="text" name="price" :value="old('price') ?? $playlist-> price" required  />
        @error('price')
            <div class="mt-2 text-red-500">{{ $message }}</div>
        @enderror
    </div>
    <div class="mb-6">
        <x-label for="description" :value="__('Description')" />

        <x-textarea type="description" name="description"  required >{{ old('description') ?? $playlist->description}}</x-textarea>
        @error('description')
        <div class="mt-2 text-red-500">{{ $message }}</div>
    @enderror
    </div>
    <div class="mb-6">
        <x-label for="tags" value="Tags" />
        <select multiple name="tags[]" id="tags" class="w-full px-3 mt-2 transition duration-200 border border-gray-300 rounded-lg focus:border-blue-500 focus:outline focus:ring-blue-200">
            @foreach ($tags as $tag )
                <option {{ $playlist->tags()->find($tag->id) ? 'selected' : ''}} value="{{$tag -> id}}">{{$tag -> name}}</option>
            @endforeach
        </select>
    </div>
    <x-button> {{$submit}} </x-button>
