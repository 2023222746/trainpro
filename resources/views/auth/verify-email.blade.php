<x-guest-layout>
    <div class="mb-4 text-sm text-muted">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="alert alert-success mb-4">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary">
                {{ __('Resend Verification Email') }}
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-link text-decoration-none text-muted">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>

    <hr class="my-3">

    <p class="text-center mb-0 text-muted small">
        {{ __('Already verified?') }}
        <a href="{{ route('dashboard') }}" class="text-decoration-none">
            {{ __('Go to Dashboard') }}
        </a>
    </p>
</x-guest-layout>
