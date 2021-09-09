<button type=slot
{{ $attributes->merge(['type' => 'submit', 'class' => 'ml-1 inline-flex items-center px-4 py-2 bg-white border-2 border-blue-400 hover:border-green-400 rounded-md font-semibold text-xs text-black uppercase tracking-widest']) }}>
    {{ $slot }}
</button>
