@props(['active' => false])

<a {{ $attributes }} class="{{ $active ? "bg-gray-600/50 text-white" : "text-white hover:bg-white/10 px-3 py-2 rounded-md text-sm font-medium" }} block rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? 'page' : false }}">
{{ $slot }}
</a>