<button {{ $attributes->merge(['type' => 'button', 'class' => 'premium-button premium-button-secondary']) }}>
    {{ $slot }}
</button>
