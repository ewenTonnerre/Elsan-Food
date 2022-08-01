
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full px-4 py-3 bg-orange-500 border border-transparent rounded-b-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-orange-400 active:bg-orange-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
