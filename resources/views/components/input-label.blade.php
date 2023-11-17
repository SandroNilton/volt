@props(['value'])

<label {{ $attributes->merge(['class' => 'block mb-1 text-[13px] leading-4 font-medium dark:text-white text-[#4C4F54]']) }}>
    {{ $value ?? $slot }}
</label>
