
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'w-full px-4 py-3 bg-yellow-400 border border-transparent rounded-b-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-600 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
