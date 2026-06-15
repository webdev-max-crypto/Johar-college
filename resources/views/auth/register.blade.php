<x-guest-layout>
    <h2 class="text-2xl font-extrabold text-blue-900 mb-1">Create Account</h2>
    <p class="text-sm text-blue-400 mb-7">Register for Johar College admissions</p>

    <form method="POST" action="{{ route('register') }}" class="space-y-5">
        @csrf

        <div>
            <label for="name" class="block text-sm font-semibold text-blue-800 mb-1">Full Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}"
                   required autofocus autocomplete="name"
                   class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
            @error('name') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="email" class="block text-sm font-semibold text-blue-800 mb-1">Email Address</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}"
                   required autocomplete="username"
                   class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
            @error('email') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password" class="block text-sm font-semibold text-blue-800 mb-1">Password</label>
            <input id="password" type="password" name="password"
                   required autocomplete="new-password"
                   class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
            @error('password') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="password_confirmation" class="block text-sm font-semibold text-blue-800 mb-1">Confirm Password</label>
            <input id="password_confirmation" type="password" name="password_confirmation"
                   required autocomplete="new-password"
                   class="w-full border border-blue-200 bg-blue-50 rounded-xl px-4 py-2.5 text-sm text-blue-900 focus:outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-200 transition">
            @error('password_confirmation') <p class="mt-1 text-xs text-red-500">{{ $message }}</p> @enderror
        </div>

        <button type="submit"
            class="w-full flex items-center justify-center gap-2 rounded-xl bg-blue-700 px-5 py-3 text-sm font-semibold text-white shadow hover:bg-blue-800 active:bg-blue-900 transition">
            Create Account
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </button>

        <div class="relative my-1"><div class="border-t border-blue-100"></div></div>

        <p class="text-center text-sm text-blue-500">
            Already have an account?
            <a href="{{ route('login') }}" class="text-blue-700 font-semibold hover:text-blue-900">Log in here</a>
        </p>
    </form>
</x-guest-layout>
