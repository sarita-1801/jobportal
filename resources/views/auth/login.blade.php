<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-r from-purple-400 to-indigo-400">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-center" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
                @csrf

                <!-- Email -->
                <div>
                    <x-text-input
                        id="email"
                        type="email"
                        name="email"
                        :value="old('email')"
                        required
                        autofocus
                        placeholder="Username or Email"
                        class="w-full rounded-lg px-4 py-3"
                    />
                    <x-input-error :messages="$errors->get('email')" class="mt-1" />
                </div>

                <!-- Password -->
                <div>
                    <x-text-input
                        id="password"
                        type="password"
                        name="password"
                        required
                        placeholder="Enter your Password"
                        class="w-full rounded-lg px-4 py-3"
                    />
                    <x-input-error :messages="$errors->get('password')" class="mt-1" />
                </div>

                <!-- Remember / Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center gap-2">
                        <input type="checkbox" name="remember" class="rounded border-gray-300">
                        Remember me
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Login
                </button>

                <!-- Register -->
                <p class="text-center text-sm mt-4">
                    Don’t have an account?
                    <a href="{{ route('register') }}" class="text-blue-600 font-semibold">Sign up</a>
                </p>

                <!-- Divider -->
                <div class="flex items-center gap-2 my-4">
                    <hr class="flex-grow">
                    <span class="text-sm text-gray-400">or connect with</span>
                    <hr class="flex-grow">
                </div>

                <!-- Social Buttons -->
                <div class="flex justify-center gap-4">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-700 text-white">in</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-red-500 text-white">G</a>
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-gray-800 text-white">GH</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
