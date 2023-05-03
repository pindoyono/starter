<nav id="main-navbar"
    class="fixed top-0 z-50 right-0 left-0 flex w-full flex-nowrap items-center justify-between bg-white py-[0.6rem] text-gray-500 shadow-lg hover:text-gray-700 focus:text-gray-700 dark:bg-zinc-700 lg:flex-wrap lg:justify-start xl:pl-60"
    data-te-navbar-ref>
    <!-- Container wrapper -->
    <div class="flex flex-wrap items-center justify-between w-full px-4">
        <!-- Toggler -->
        <button data-te-sidenav-toggle-ref data-te-target="#sidenav-1"
            class="block border-0 bg-transparent px-2.5 text-gray-500 hover:no-underline hover:shadow-none focus:no-underline focus:shadow-none focus:outline-none focus:ring-0 xl:hidden"
            aria-controls="#sidenav-1" aria-haspopup="true">
            <span class="block [&>svg]:h-5 [&>svg]:w-5 [&>svg]:text-black">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                    <path fill-rule="evenodd"
                        d="M3 6.75A.75.75 0 013.75 6h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 6.75zM3 12a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75A.75.75 0 013 12zm0 5.25a.75.75 0 01.75-.75h16.5a.75.75 0 010 1.5H3.75a.75.75 0 01-.75-.75z"
                        clip-rule="evenodd" />
                </svg>
            </span>
        </button>

        <!-- Search form -->
        <form class="relative flex flex-wrap items-stretch ml-4 mr-auto xl:mx-0">
            {{-- <input autocomplete="off" type="search"
                class="focus:shadow-te-blue relative m-0 inline-block w-4 w-[1%] min-w-[225px] flex-auto rounded border border-solid border-gray-300 bg-transparent bg-clip-padding px-3 py-1.5 text-base font-normal text-gray-700 transition duration-300 ease-in-out focus:border-blue-600 focus:text-gray-700 focus:outline-none dark:text-gray-200 dark:placeholder:text-gray-200"
                placeholder='Search (ctrl + "/" to focus)' />
            <span
                class="flex items-center whitespace-nowrap rounded px-3 py-1.5 text-center text-base font-normal text-gray-700 dark:text-gray-200 [&>svg]:w-4"
                id="basic-addon2">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path fill="currentColor"
                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                    </path>
                </svg>
            </span> --}}
        </form>

        <!-- Right links -->
        <ul class="relative flex items-center">
            <!-- Notification dropdown -->
            {{-- <li class="relative" data-te-dropdown-ref>
            <a class="flex items-center mr-4 text-gray-500 hover:text-gray-700 focus:text-gray-700"
                href="#" id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref
                aria-expanded="false">
                <span class="dark:text-gray-200 [&>svg]:w-3.5">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bell"
                        role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <path fill="currentColor"
                            d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z">
                        </path>
                    </svg>
                </span>
                <span
                    class="absolute -mt-2.5 ml-2 rounded-full bg-red-600 py-[1px] px-1.5 text-[0.6rem] text-white">1</span>
            </a>
            <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&[data-te-dropdown-show]]:block"
                aria-labelledby="navbarDropdownMenuLink" data-te-dropdown-menu-ref>
                <li>
                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                        href="#" data-te-dropdown-item-ref>Some news</a>
                </li>
                <li>
                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                        href="#" data-te-dropdown-item-ref>Another news</a>
                </li>
                <li>
                    <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                        href="#" data-te-dropdown-item-ref>Something else here</a>
                </li>
            </ul>
        </li> --}}


            <li class="relative" data-te-dropdown-ref>
                <a class="flex items-center mr-4 text-gray-500 hover:text-gray-700 focus:text-gray-700" href="#"
                    id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref aria-expanded="false">
                    <span class="fill-gray-500 hover:fill-gray-700 focus:fill-gray-700 dark:fill-gray-200 [&>svg]:w-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path
                                d="M41.4 9.4C53.9-3.1 74.1-3.1 86.6 9.4L168 90.7l53.1-53.1c28.1-28.1 73.7-28.1 101.8 0L474.3 189.1c28.1 28.1 28.1 73.7 0 101.8L283.9 481.4c-37.5 37.5-98.3 37.5-135.8 0L30.6 363.9c-37.5-37.5-37.5-98.3 0-135.8L122.7 136 41.4 54.6c-12.5-12.5-12.5-32.8 0-45.3zm176 221.3L168 181.3 75.9 273.4c-4.2 4.2-7 9.3-8.4 14.6H386.7l42.3-42.3c3.1-3.1 3.1-8.2 0-11.3L277.7 82.9c-3.1-3.1-8.2-3.1-11.3 0L213.3 136l49.4 49.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0zM512 512c-35.3 0-64-28.7-64-64c0-25.2 32.6-79.6 51.2-108.7c6-9.4 19.5-9.4 25.5 0C543.4 368.4 576 422.8 576 448c0 35.3-28.7 64-64 64z" />
                        </svg>
                    </span>
                </a>
                <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&[data-te-dropdown-show]]:block"
                    aria-labelledby="navbarDropdownMenuLink" data-te-dropdown-menu-ref>
                    <li>
                        <a id="theme-switcher"
                            class="block w-full px-3 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 focus:bg-gray-200 focus:outline-none active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-100 dark:hover:bg-gray-600 focus:dark:bg-gray-600"
                            href="#" data-theme="light">
                            <div class="pointer-events-none">
                                <div class="inline-block w-[24px] text-center" data-theme-icon="light">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="inline-block w-6 h-6">
                                        <path
                                            d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z" />
                                    </svg>
                                </div>
                                <span data-theme-name="light">Light</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a id="theme-switcher"
                            class="block w-full px-3 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 focus:bg-gray-200 focus:outline-none active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-100 dark:hover:bg-gray-600 focus:dark:bg-gray-600"
                            href="#" data-theme="dark" data-te-dropdown-item-ref>
                            <div class="pointer-events-none">
                                <div class="inline-block w-[24px] text-center" data-theme-icon="dark">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                        class="inline-block w-6 h-6">
                                        <path fill-rule="evenodd"
                                            d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <span data-theme-name="dark">Dark</span>
                            </div>
                        </a>
                    </li>
                </ul>
            </li>




            <!-- Avatar -->
            <li class="relative" data-te-dropdown-ref>
                <a class="flex items-center transition duration-150 ease-in-out hidden-arrow whitespace-nowrap motion-reduce:transition-none"
                    href="#" id="navbarDropdownMenuLink" role="button" data-te-dropdown-toggle-ref
                    aria-expanded="false">
                    <img src="https://tecdn.b-cdn.net/img/Photos/Avatars/img (31).webp" class="rounded-full"
                        style="height: 22px; width: 22px" alt="Avatar" loading="lazy" />
                </a>
                <ul class="absolute left-auto right-0 z-[1000] float-left m-0 mt-1 hidden min-w-[10rem] list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg dark:bg-zinc-700 [&[data-te-dropdown-show]]:block"
                    aria-labelledby="dropdownMenuButton2" data-te-dropdown-menu-ref>
                    @if (Route::has('login'))
                        @auth

                            <li>
                                <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                    href="#" data-te-dropdown-item-ref>My profile</a>
                            </li>
                            <li>
                                <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                    href="#" data-te-dropdown-item-ref>Settings</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                    href="#" data-te-dropdown-item-ref>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                            <li>
                                <a href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                    class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                    href="#" data-te-dropdown-item-ref>
                                    {{-- {{ Auth::user()->getRoleNames() }} --}}
                                </a>
                            </li>
                        @else
                            <li>
                                <a class="block w-full px-4 py-2 text-sm font-normal text-gray-700 bg-transparent whitespace-nowrap hover:bg-gray-100 active:text-zinc-800 active:no-underline disabled:pointer-events-none disabled:bg-transparent disabled:text-gray-400 dark:text-gray-200 dark:hover:bg-white/30"
                                    href="{{ route('login') }}" data-te-dropdown-item-ref>Log in</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </li>

            {{-- Nama Pengguna --}}
            <li class="relative p-4 dark:text-white">

                {{-- {{ __('Admin') }} --}}
            </li>
        </ul>
    </div>
    <!-- Container wrapper -->


</nav>
