<x-guest-layout>
    <div class="min-h-screen relative overflow-hidden bg-gradient-to-br from-indigo-50 via-white to-pink-50 dark:from-gray-900 dark:via-gray-950 dark:to-gray-900">
        <!-- decor blobs -->
        <div class="pointer-events-none absolute -top-32 -left-32 h-96 w-96 rounded-full bg-indigo-200/50 blur-3xl dark:bg-indigo-500/10"></div>
        <div class="pointer-events-none absolute -bottom-24 -right-24 h-[28rem] w-[28rem] rounded-full bg-pink-200/50 blur-3xl dark:bg-pink-500/10"></div>

        <div class="relative z-10 mx-auto flex min-h-screen max-w-6xl items-center justify-center px-6 py-12">
            <div class="w-full max-w-md">
                <!-- Header -->
                <div class="mb-8 text-center">
                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-2xl bg-indigo-600 shadow-lg shadow-indigo-600/30">
                        <!-- logo dot -->
                        <svg viewBox="0 0 24 24" class="h-7 w-7 text-white" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path d="M4 7h16M4 12h10M4 17h16" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </div>
                    <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-gray-100">เข้าสู่ระบบ</h1>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">ยินดีต้อนรับกลับมา โปรดลงชื่อเข้าใช้บัญชีของคุณ</p>
                </div>

                <!-- Card -->
                <div class="rounded-2xl border border-gray-200/70 bg-white/80 p-6 shadow-xl shadow-gray-200/40 backdrop-blur-md dark:border-white/10 dark:bg-gray-900/60 dark:shadow-black/20">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <!-- Email -->
                        <div>
                            <x-input-label for="email" :value="__('อีเมล')" />
                            <x-text-input
                                id="email"
                                class="mt-1 block w-full"
                                type="email"
                                name="email"
                                :value="old('email')"
                                required
                                autofocus
                                autocomplete="username"
                                placeholder="you@example.com"
                            />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password with toggle -->
                        <div>
                            <div class="flex items-center justify-between">
                                <x-input-label for="password" :value="__('รหัสผ่าน')" />
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}"
                                       class="text-sm font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                        ลืมรหัสผ่าน?
                                    </a>
                                @endif
                            </div>

                            <div class="relative mt-1">
                                <x-text-input
                                    id="password"
                                    class="block w-full pr-11"
                                    type="password"
                                    name="password"
                                    required
                                    autocomplete="current-password"
                                    placeholder="••••••••"
                                />
                                <button
                                    type="button"
                                    id="togglePassword"
                                    class="absolute inset-y-0 right-0 mr-2 inline-flex items-center rounded-md p-2 text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 dark:text-gray-500 dark:hover:text-gray-300"
                                    aria-label="แสดง/ซ่อนรหัสผ่าน"
                                >
                                    <!-- eye icon -->
                                    <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                         class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="1.5">
                                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/>
                                        <circle cx="12" cy="12" r="3"/>
                                    </svg>
                                </button>
                            </div>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Remember -->
                        <div class="flex items-center">
                            <input
                                id="remember_me"
                                type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:border-gray-600 dark:bg-gray-800"
                                name="remember"
                            >
                            <label for="remember_me" class="ms-2 text-sm text-gray-600 dark:text-gray-300">
                                จำฉันไว้
                            </label>
                        </div>

                        <!-- Submit -->
                        <div class="pt-2">
                            <button
                                type="submit"
                                class="inline-flex w-full items-center justify-center rounded-xl bg-gradient-to-r from-indigo-600 to-fuchsia-600 px-4 py-3 text-sm font-semibold text-white shadow-lg shadow-indigo-500/30 transition hover:brightness-110 focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            >
                                เข้าสู่ระบบ
                            </button>
                        </div>

                        <!-- Divider -->
                        <div class="flex items-center gap-3 pt-2">
                            <div class="h-px w-full bg-gradient-to-r from-transparent via-gray-300 to-transparent dark:via-white/20"></div>
                            <span class="text-xs text-gray-400">หรือ</span>
                            <div class="h-px w-full bg-gradient-to-r from-transparent via-gray-300 to-transparent dark:via-white/20"></div>
                        </div>

                        <!-- Register link -->
                        @if (Route::has('register'))
                            <p class="text-center text-sm text-gray-600 dark:text-gray-300">
                                ยังไม่มีบัญชี?
                                <a href="{{ route('register') }}" class="font-medium text-indigo-600 hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                                    สมัครสมาชิก
                                </a>
                            </p>
                        @endif
                    </form>
                </div>

                <!-- small footer -->
                <p class="mt-6 text-center text-xs text-gray-400">
                    © {{ date('Y') }} — Your App
                </p>
            </div>
        </div>
    </div>

    <!-- Toggle password (vanilla JS, ไม่พึ่ง Alpine) -->
    <script>
        (function () {
            const btn = document.getElementById('togglePassword');
            const input = document.getElementById('password');
            const eye = document.getElementById('eyeIcon');

            if (btn && input && eye) {
                btn.addEventListener('click', () => {
                    const isPass = input.type === 'password';
                    input.type = isPass ? 'text' : 'password';
                    // swap eye to eye-off with simple path morph
                    eye.innerHTML = isPass
                        ? '<path d="M3 3l18 18" stroke-linecap="round"/><path d="M2 12s3.5-7 10-7a10.7 10.7 0 0 1 4.4.9"/><path d="M21.8 13.6C20.7 15.3 17.5 19 12 19a11 11 0 0 1-4.2-.8"/>' 
                        : '<path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7S2 12 2 12Z"/><circle cx="12" cy="12" r="3"/>';
                });
            }
        })();
    </script>
</x-guest-layout>
