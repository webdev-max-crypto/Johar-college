<x-guest-layout>
    <h2 class="text-2xl font-extrabold text-blue-900 mb-1">Welcome Back</h2>
    <p class="text-sm text-blue-400 mb-7">Log in to your Johar College account</p>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
            <label for="email" class="block text-sm font-semibold text-blue-800 mb-1">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   required autofocus autocomplete="username"
                   class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
            @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-semibold text-blue-800 mb-1">Password</label>
            <input id="password" type="password" name="password"
                   required autocomplete="current-password"
                   class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
            @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div class="flex items-center justify-between">
            <label for="remember_me" class="inline-flex items-center gap-2 cursor-pointer">
                <input id="remember_me" type="checkbox" name="remember"
                       class="rounded border-blue-300 text-blue-600 focus:ring-blue-500">
                <span class="text-sm text-blue-600">Remember me</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:text-blue-800 font-medium">
                    Forgot password?
                </a>
            @endif
        </div>

        <button type="submit"
            class="w-full flex items-center justify-center gap-2 rounded-xl bg-blue-700 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-blue-800 active:bg-blue-900 transition">
            Log In
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </button>

        <div class="relative my-1"><div class="border-t border-blue-100"></div></div>

        <p class="text-center text-sm text-blue-500">
            Don't have an account?
            <a href="{{ route('register') }}" class="text-blue-700 font-semibold hover:text-blue-900">Register here</a>
        </p>
    </form>
</x-guest-layout>
