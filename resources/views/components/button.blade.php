<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white fw-bold btn btn-success']) }}>
    {{ $slot }}
</button>
