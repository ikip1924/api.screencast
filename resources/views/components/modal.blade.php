<div {{$attributes->merge(["class" => "absolute inset-0 flex items-center justify-center w-full h-full bg-black bg-opacity-50"])}}>
    <div class="w-1/2 p-5 bg-white rounded-lg shadow-lg md:max-w-xl">
       <div class="flex items-center justify-between px-6 py-4 border-b bg-gray-50">
            <div> {{$title}} </div>

        <button class="focus:outline-none" @click="{{$state}} = false ">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>

        </button>
       </div>
        <div class="p-6">
            {{$slot}}
        </div>
    </div>
</div>
