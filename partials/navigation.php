<div class="relative w-full">
    <nav class="fixed top-0 left-0 z-10 w-full" style="background-color: #FCD19C;">
        <div class="container m-auto px-2 md:px-12 lg:px-7">
            <div class="flex flex-wrap items-center justify-between py-3 gap-6 md:py-4 md:gap-0">
                <div class="w-full px-6 flex items-center justify-between lg:w-max md:px-0">
                    <div class="flex items-center">
                        <img src="<?= BASE_PATH ?>fast_burgers_logo.png" alt="Fast Burgers Logo" class="w-16 h-16 mr-2">
                        <span class="text-2xl font-bold text-yellow-900">Fast <span class="text-yellow-700">Burgers</span></span>
                    </div>

                    <button aria-label="hamburger" id="hamburger" class="relative w-10 h-10 -mr-2 lg:hidden">
                        <div aria-hidden="true" id="line" class="inset-0 w-6 h-0.5 m-auto rounded bg-yellow-900 transition duration-300"></div>
                        <div aria-hidden="true" id="line2" class="inset-0 w-6 h-0.5 mt-2 m-auto rounded bg-yellow-900 transition duration-300"></div>
                    </button>
                </div>

                <div class="border-yellow-200">
                    <button type="button" title="Login" class="w-full py-3 px-6 text-center rounded-full transition bg-yellow-300 hover:bg-yellow-100 active:bg-yellow-400 focus:bg-yellow-300 sm:w-max">
                        <span class="block text-yellow-900 font-semibold text-sm">Login</span>
                    </button>
                </div>
            </div>
        </div>
    </nav>
</div>
