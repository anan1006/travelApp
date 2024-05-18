@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => 'border-gray-300 focus:border-teal-900 focus:ring-teal-900 rounded-md shadow-sm',
]) !!}>
