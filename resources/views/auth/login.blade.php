<x-guest-layout>
    <!-- ... Status Session ... -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <h2 class="text-3xl font-extrabold text-white text-center mb-6">Masuk ke Aplikasi</h2>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" value="Email" class="text-indigo-200" />
            <x-text-input id="email" class="block mt-1 w-full **border-indigo-500 bg-white/5 text-white focus:ring-indigo-500**" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" value="Password" class="text-indigo-200" />

            <x-text-input id="password" class="block mt-1 w-full **border-indigo-500 bg-white/5 text-white focus:ring-indigo-500**"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex justify-between items-center mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm **focus:ring-indigo-500**" name="remember">
                <span class="ms-2 text-sm text-indigo-200">{{ __('Ingat Saya') }}</span>
            </label>
            
            @if (Route::has('password.request'))
                <a class="underline text-sm text-indigo-200 hover:text-indigo-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-150" href="{{ route('password.request') }}">
                    {{ __('Lupa Password?') }}
                </a>
            @endif
        </div>

        <!-- Tombol Login -->
        <div class="flex items-center justify-end mt-6">
             <a href="{{ route('register') }}" class="underline text-sm text-indigo-200 hover:text-indigo-400 me-4 transition duration-150">
                {{ __('Daftar Akun Baru') }}
            </a>
            <x-primary-button class="ms-3 **bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded-lg shadow-lg hover:shadow-xl transition duration-300**">
                {{ __('Masuk') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
