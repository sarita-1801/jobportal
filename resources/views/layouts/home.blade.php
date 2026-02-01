<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Jobify</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white">

<!-- Navbar -->
<nav class="flex items-center justify-between px-16 py-6">
    <h1 class="text-2xl font-bold text-blue-600">glumos</h1>

    <div class="space-x-6">
        <a href="/login" class="text-gray-600 hover:text-blue-600">Login</a>
        <a href="/register" class="text-blue-600 font-semibold">Signup</a>
    </div>
</nav>

<!-- Hero Section -->
<section class="flex items-center justify-between px-16 mt-10">

    <!-- Left Content -->
    <div class="w-1/2">
        <h1 class="text-5xl font-bold text-gray-900 leading-tight">
            Find freelance and fulltime<br>developer jobs.
        </h1>

        <p class="mt-4 text-gray-500">
            Glumos is your one-stop-centre for thousands of digital freelance and fulltime jobs.
        </p>

        <!-- Search Box -->
        <div class="mt-8 flex bg-white shadow-lg rounded-lg overflow-hidden w-full max-w-xl">
            <input
                type="text"
                placeholder="Search a Job"
                class="w-1/2 px-4 py-3 focus:outline-none"
            >

            <select class="w-1/4 px-4 py-3 border-l focus:outline-none">
                <option>Freelance</option>
                <option>Fulltime</option>
            </select>

            <button class="w-1/4 bg-blue-600 text-white px-6 py-3 font-semibold hover:bg-blue-700">
                Search
            </button>
        </div>
    </div>

    <!-- Right Image -->
    <div class="w-1/2 flex justify-end">
        <img src="{{ asset('images/hero.png') }}" alt="Developer" class="w-[420px]">
    </div>

</section>

</body>
</html>
