<button {{ $attributes->merge(['type' => 'submit', 'class' =>'w-full px-4 py-2 text-blue-700 text-semibold bg-blue-200 border-2 border-blue-700 rounded-md shadow hover:bg-blue-800 hover:text-white mb-3']) }}>
    {{ $slot }}
</button>
