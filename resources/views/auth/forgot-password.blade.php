<x-guest-layout>
    <div class="text-center mb-4">
        <h4 class="fw-bold mb-1">{{ __('Forgot Password') }}</h4>
        <p class="text-muted small mb-0">
            {{ __('Forgot your password? No problem. Enter your email and we will send you a password reset link.') }}
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-3" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid mb-3">
            <button type="submit" class="btn btn-primary py-2 fw-semibold">
                {{ __('Email Password Reset Link') }}
            </button>
        </div>

        <div class="text-center">
            <a href="{{ route('login') }}" class="small text-decoration-none">&larr; {{ __('Back to Log in') }}</a>
        </div>
    </form>
</x-guest-layout>
