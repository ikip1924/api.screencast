@csrf
<div class="w-full mb-4 lg:w-1/2">
    <x-label for="name"> Name</x-label>
    <x-input class="w-full mt-2" value="{{ old('name') ?? $tag->name }}" name="name" id="name" type="text" placeholder="Laravel"/>
        @error('name')
        <div class="mt-2 text-red-500"> {{ $message }}</div>
    @enderror
</div>

<x-button> {{$submit}} </x-button>
