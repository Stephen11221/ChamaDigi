<button {{ $attributes->merge(['type' => 'submit', 'class' => 'premium-button premium-button-danger']) }}>
    {{ $slot }}
</button>
