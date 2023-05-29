@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'h-10 border focus:border-blue-500 border-gray-300 focus:outline rounded-lg px-3 focus:ring-blue-200 transition duration-200']) !!}>
