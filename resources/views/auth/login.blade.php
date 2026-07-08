<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="login-wrapper">
        <div class="login-box">
            <div class="text-center mb-4">
                <img src="{{ asset('images/logo.png') }}" alt="TrainPro" height="60" class="mb-3">
                <h4 class="fw-bold text-primary">Welcome Back</h4>
                <p class="text-muted">Sign in to access your dashboard</p>
            </div>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">{{ __('Remember me') }}</label>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none small" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button type="submit" class="btn btn-primary px-4">
                        {{ __('Log in') }}
                    </button>
                </div>

                <hr class="my-3">

                <p class="text-center mb-0">
                    Don't have an account? 
                    <a href="{{ route('register') }}" class="text-decoration-none fw-bold">Register here</a>
                </p>
            </form>
        </div>
    </div>

    <style>
        .login-wrapper {
            min-height: 80vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
        }
        .login-box {
            background: #fff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            max-width: 420px;
            width: 100%;
        }
        .login-box .btn-primary {
            background-color: #0a2e4a;
            border-color: #0a2e4a;
        }
        .login-box .btn-primary:hover {
            background-color: #1a4b6d;
            border-color: #1a4b6d;
        }
    </style>
</x-guest-layout>
