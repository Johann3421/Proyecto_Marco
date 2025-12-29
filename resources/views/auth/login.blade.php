<x-guest-layout>
    <h5 class="text-center mb-4">Iniciar Sesión</h5>

    <!-- Session Status -->
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="current-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Remember Me -->
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="remember_me" name="remember">
            <label class="form-check-label" for="remember_me">
                Recordarme
            </label>
        </div>

        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-sign-in-alt me-2"></i>Iniciar Sesión
            </button>
        </div>

        <div class="text-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-none">
                    ¿Olvidaste tu contraseña?
                </a>
            @endif
        </div>

        @if (Route::has('register'))
            <hr class="my-3">
            <div class="text-center">
                <p class="mb-0">¿No tienes una cuenta?
                    <a href="{{ route('register') }}" class="text-decoration-none">Regístrate aquí</a>
                </p>
            </div>
        @endif
    </form>
</x-guest-layout>
