<x-guest-layout>
    <div class="text-center mb-4">
        <h4 class="fw-bold mb-1">{{ __('Verify Email') }}</h4>
        <p class="text-muted small mb-0">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just sent? If you didn\'t receive the email, we will gladly send another.') }}
        </p>
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success small mb-3" role="alert">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="d-flex flex-column gap-2 mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary w-100 py-2 fw-semibold">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}" class="text-center mt-2">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none text-danger small">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
