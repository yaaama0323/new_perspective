@props(['disabled' => false])

<input rows="7" class="login_input" {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => '']) !!}>
