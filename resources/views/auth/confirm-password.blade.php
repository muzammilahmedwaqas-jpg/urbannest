<x-guest-layout>
    <div class="text-center mb-4">
        <h4 class="fw-bold mb-1">{{ __('Confirm Password') }}</h4>
        <p class="text-muted small mb-0">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </p>
    </div>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">{{ __('Password') }}</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary py-2 fw-semibold">
                {{ __('Confirm') }}
            </button>
        </div>

        <div class="text-center">
            <a href="{{ url()->previous() }}" class="small text-decoration-none">&larr; {{ __('Go Back') }}</a>
        </div>
    </form>
</x-guest-layout>
