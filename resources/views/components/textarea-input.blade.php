@props(['disabled' => false])

<textarea {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-white border border-[#ECEFF1] placeholder-[#989FA6] text-[#3A4551] text-[13px] leading-4 rounded-[4px] focus:ring-0 focus:border-[#ECEFF1] block w-full py-1.5 px-2']) !!}>
 {{ $slot }}
</textarea>