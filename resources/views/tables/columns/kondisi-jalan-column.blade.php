@php
    $classes = [
        'Baik' => 'color: #016630; background-color: #dcfce7',
        'Rusak' => 'color: #854d0e; background-color: #fef9c2;',
        'Rusak Berat' => 'color: #9f0712; background-color: #ffe2e2;',
    ]; 

    $defaultClass = 'px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-800';
@endphp

<div>
    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" style="{{ $classes[$getState()] ?? $defaultClass }}">
        {{ $getState() }}
    </p>
</div>
