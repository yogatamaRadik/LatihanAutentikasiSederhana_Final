<x-app-layout>

    <!-- Safe spacing from navbar -->
    <div class="pt-32 pb-20">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 shadow-lg rounded-2xl p-10">

                <!-- Title -->
                <div class="text-center mb-10">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                        Welcome, {{ Auth::user()->nama_lengkap }}
                    </h1>
                    <p class="text-gray-600 dark:text-gray-300 text-sm mt-1">
                        Your account information is shown below.
                    </p>
                </div>

                <!-- Main Profile Card -->
                <div class="flex flex-col md:flex-row gap-10 items-center md:items-start justify-center">

                    <!-- Photo -->
                    <div class="flex flex-col items-center">
                        @if(Auth::user()->foto)
                            <img src="{{ asset('uploads/' . Auth::user()->foto) }}"
                                class="w-44 h-44 object-cover rounded-xl border shadow">
                        @else
                            <div class="w-44 h-44 bg-gray-300 dark:bg-gray-700 rounded-xl flex items-center justify-center text-gray-500 dark:text-gray-300">
                                No Photo
                            </div>
                        @endif

                        <span class="text-sm text-gray-500 dark:text-gray-400 mt-2 italic">
                            Profile Picture
                        </span>
                    </div>

                    <!-- Divider -->
                    <div class="hidden md:block w-px bg-gray-300 dark:bg-gray-600"></div>

                    <!-- Data Section -->
                    <div class="w-full space-y-5">

                        <!-- Row -->
                        <div class="border rounded-xl p-4 bg-gray-50 dark:bg-gray-700 shadow-sm">
                            <p class="text-xs uppercase text-gray-500 dark:text-gray-300 font-semibold">Student ID</p>
                            <p class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                {{ Auth::user()->nim }}
                            </p>
                        </div>

                        <div class="border rounded-xl p-4 bg-gray-50 dark:bg-gray-700 shadow-sm">
                            <p class="text-xs uppercase text-gray-500 dark:text-gray-300 font-semibold">Full Name</p>
                            <p class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                {{ Auth::user()->nama_lengkap }}
                            </p>
                        </div>

                        <div class="border rounded-xl p-4 bg-gray-50 dark:bg-gray-700 shadow-sm">
                            <p class="text-xs uppercase text-gray-500 dark:text-gray-300 font-semibold">Birthplace & Date</p>
                            <p class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                {{ Auth::user()->tempat_lahir }},
                                {{ Auth::user()->tanggal_lahir }}
                            </p>
                        </div>

                        <div class="border rounded-xl p-4 bg-gray-50 dark:bg-gray-700 shadow-sm">
                            <p class="text-xs uppercase text-gray-500 dark:text-gray-300 font-semibold">Email Address</p>
                            <p class="text-lg font-bold text-gray-900 dark:text-gray-100">
                                {{ Auth::user()->email }}
                            </p>
                        </div>

                    </div>
                </div>

                <!-- Footer -->
                <p class="text-center text-gray-600 dark:text-gray-300 text-sm mt-10">
                    You are successfully logged in. Have a great day! ✨
                </p>

            </div>

        </div>
    </div>
</x-app-layout>
