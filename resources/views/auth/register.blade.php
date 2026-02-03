<x-guest-layout>
    <div class="min-h-screen d-flex align-items-center justify-content-center gradient-bg">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-xl p-8">

            <h2 class="text-2xl font-bold text-center mb-6">Create Account</h2>

            <form method="POST" action="{{ route('register') }}" class="space-y-4">
                @csrf

                <!-- Name -->
                <x-text-input
                    name="name"
                    type="text"
                    placeholder="Full Name"
                    required
                    class="w-full rounded-lg px-4 py-3"
                />
                <x-input-error :messages="$errors->get('name')" />

                <!-- Email -->
                <x-text-input
                    name="email"
                    type="email"
                    placeholder="Email Address"
                    required
                    class="w-full rounded-lg px-4 py-3"
                />
                <x-input-error :messages="$errors->get('email')" />

                <!-- Role -->
                <select name="role"
                    class="w-full rounded-lg px-4 py-3 border-gray-300 focus:ring-indigo-500"
                    required>
                    <option value="">Register as</option>
                    <option value="seeker">Job Seeker</option>
                    <option value="employer">Employer</option>
                </select>
                <x-input-error :messages="$errors->get('role')" />

                <!-- Password -->
                <x-text-input
                    name="password"
                    type="password"
                    placeholder="Password"
                    required
                    class="w-full rounded-lg px-4 py-3"
                />
                <x-input-error :messages="$errors->get('password')" />

                <!-- Confirm Password -->
                <x-text-input
                    name="password_confirmation"
                    type="password"
                    placeholder="Confirm Password"
                    required
                    class="w-full rounded-lg px-4 py-3"
                />

                <!-- Register Button -->
                <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition">
                    Register
                </button>

                <!-- Login -->
                <p class="text-center text-sm mt-4">
                    Already have an account?
                    <a href="{{ route('login') }}" class="text-blue-600 font-semibold">Login</a>
                </p>

                <!-- Divider -->
                <div class="flex items-center gap-2 my-4">
                    <hr class="flex-grow">
                    <span class="text-sm text-gray-400">or connect with</span>
                    <hr class="flex-grow">
                </div>

                <!-- LinkedIn -->
                <div class="flex justify-center">
                    <a href="#" class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-700 text-white">in</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
