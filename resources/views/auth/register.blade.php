<x-guest-layout>
    <h5 class="text-center mb-4">Crear Cuenta</h5>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre Completo</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                   name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mb-3">
            <label for="email" class="form-label">Correo Electrónico</label>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                   name="email" value="{{ old('email') }}" required autocomplete="username">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña</label>
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                   name="password" required autocomplete="new-password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
            <input id="password_confirmation" type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                   name="password_confirmation" required autocomplete="new-password">
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-user-plus me-2"></i>Registrarse
            </button>
        </div>

        <hr class="my-3">
        <div class="text-center">
            <p class="mb-0">¿Ya tienes una cuenta?
                <a href="{{ route('login') }}" class="text-decoration-none">Inicia sesión aquí</a>
            </p>
        </div>
    </form>
</x-guest-layout>
