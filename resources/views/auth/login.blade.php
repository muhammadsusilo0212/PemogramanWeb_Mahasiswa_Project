<x-guest-layout>
    <div class="max-w-md mx-auto mt-12 bg-gray-900 p-8 rounded-lg shadow-lg">
        <!-- Status Session -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <h2 class="text-3xl font-bold text-white text-center mb-6">Masuk ke Aplikasi</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <x-input-label for="email" value="Email" class="text-indigo-200 mb-1" />
                <x-text-input
                    id="email"
                    type="email"
                    name="email"
                    :value="old('email')"
                    required
                    autofocus
                    autocomplete="username"
                    class="w-full px-4 py-2 bg-white/10 border border-indigo-500 text-white rounded-md focus:ring focus:ring-indigo-500"
                />
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <x-input-label for="password" value="Password" class="text-indigo-200 mb-1" />
                <x-text-input
                    id="password"
                    type="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    class="w-full px-4 py-2 bg-white/10 border border-indigo-500 text-white rounded-md focus:ring focus:ring-indigo-500"
                />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-400" />
            </div>

            <!-- Remember Me & Forgot Password -->
            <div class="flex items-center justify-between mb-4">
                <label for="remember_me" class="flex items-center text-sm text-indigo-200">
                    <input id="remember_me" type="checkbox" class="mr-2 text-indigo-600 border-gray-300 rounded shadow-sm focus:ring focus:ring-indigo-500" name="remember">
                    {{ __('Ingat Saya') }}
                </label>

                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="text-sm text-indigo-300 hover:text-indigo-400 transition">
                        {{ __('Lupa Password?') }}
                    </a>
                @endif
            </div>

            <!-- Tombol Login & Daftar -->
            <div class="flex items-center justify-end">
                <a href="{{ route('register') }}" class="text-sm text-indigo-300 hover:text-indigo-400 mr-4">
                    {{ __('Daftar Akun Baru') }}
                </a>
                <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md hover:shadow-xl transition duration-300">
                    {{ __('Masuk') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>
