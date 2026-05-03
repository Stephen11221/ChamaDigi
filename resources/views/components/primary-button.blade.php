<button {{ $attributes->merge(['type' => 'submit', 'class' => 'premium-button premium-button-primary']) }}>
    {{ $slot }}
</button>
