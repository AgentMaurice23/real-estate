<button {{ $attributes->merge(['type' => 'submit', 'class' =>'bg-blue-500 mt-4 text-white w-full px-3 py-2 flex-shrink-0 md:block rounded-full']) }}>
    {{ $slot }}
</button>
