<!-- Sidenav -->
<nav id="sidenav-1"
    class="prose dark:prose-invert fixed top-0 left-0 z-[1035] h-screen w-60 -translate-x-full overflow-hidden bg-white shadow-[0_4px_12px_0_rgba(0,0,0,0.07),_0_2px_4px_rgba(0,0,0,0.05)] dark:bg-zinc-800 xl:data-[te-sidenav-hidden='false']:translate-x-0"
    data-te-sidenav-init data-te-sidenav-hidden="false" data-te-sidenav-mode-breakpoint-over="0"
    data-te-sidenav-mode-breakpoint-side="xl" data-te-sidenav-content="#content" data-te-sidenav-accordion="true">
    <a class="flex items-center justify-center py-6 mb-3 outline-none" href="#!" data-te-ripple-init
        data-te-ripple-color="primary">
        <img id="te-logo" class="w-8 mr-2" src="https://tailwind-elements.com/img/logo.png" alt="TE Logo"
            draggable="false" />
        <span>Tailwind Elements</span>
    </a>

    <ul class="relative m-0 list-none px-[0.2rem]" data-te-sidenav-menu-ref>
        <li class="relative">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                href="{{ route('admin.index') }}" data-te-sidenav-link-ref>
                <span
                    class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-blue-600 group-focus:[&>svg]:fill-blue-600 group-active:[&>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&>svg]:fill-blue-600 motion-reduce:[&>svg]:transition-none dark:[&>svg]:fill-gray-300 dark:group-hover:[&>svg]:fill-gray-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path
                            d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375z" />
                        <path fill-rule="evenodd"
                            d="M3.087 9l.54 9.176A3 3 0 006.62 21h10.757a3 3 0 002.995-2.824L20.913 9H3.087zM12 10.5a.75.75 0 01.75.75v4.94l1.72-1.72a.75.75 0 111.06 1.06l-3 3a.75.75 0 01-1.06 0l-3-3a.75.75 0 111.06-1.06l1.72 1.72v-4.94a.75.75 0 01.75-.75z"
                            clip-rule="evenodd" />
                    </svg>
                </span>
                <span>Dashboard</span></a>
        </li>
        <li class="relative">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                href="{{ route('admin.users.index') }}" data-te-sidenav-link-ref>
                <span
                    class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-blue-600 group-focus:[&>svg]:fill-blue-600 group-active:[&>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&>svg]:fill-blue-600 motion-reduce:[&>svg]:transition-none dark:[&>svg]:fill-gray-300 dark:group-hover:[&>svg]:fill-gray-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M8.25 6.75a3.75 3.75 0 117.5 0 3.75 3.75 0 01-7.5 0zM15.75 9.75a3 3 0 116 0 3 3 0 01-6 0zM2.25 9.75a3 3 0 116 0 3 3 0 01-6 0zM6.31 15.117A6.745 6.745 0 0112 12a6.745 6.745 0 016.709 7.498.75.75 0 01-.372.568A12.696 12.696 0 0112 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 01-.372-.568 6.787 6.787 0 011.019-4.38z"
                            clip-rule="evenodd" />
                        <path
                            d="M5.082 14.254a8.287 8.287 0 00-1.308 5.135 9.687 9.687 0 01-1.764-.44l-.115-.04a.563.563 0 01-.373-.487l-.01-.121a3.75 3.75 0 013.57-4.047zM20.226 19.389a8.287 8.287 0 00-1.308-5.135 3.75 3.75 0 013.57 4.047l-.01.121a.563.563 0 01-.373.486l-.115.04c-.567.2-1.156.349-1.764.441z" />
                    </svg>
                </span>
                <span>Pengguna</span></a>
        </li>

        <li class="relative">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                data-te-sidenav-link-ref>
                <span
                    class="mr-4 [&>svg]:h-4 [&>svg]:w-4 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-blue-600 group-focus:[&>svg]:fill-blue-600 group-active:[&>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&>svg]:fill-blue-600 motion-reduce:[&>svg]:transition-none dark:[&>svg]:fill-gray-300 dark:group-hover:[&>svg]:fill-gray-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512">
                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M308.5 135.3c7.1-6.3 9.9-16.2 6.2-25c-2.3-5.3-4.8-10.5-7.6-15.5L304 89.4c-3-5-6.3-9.9-9.8-14.6c-5.7-7.6-15.7-10.1-24.7-7.1l-28.2 9.3c-10.7-8.8-23-16-36.2-20.9L199 27.1c-1.9-9.3-9.1-16.7-18.5-17.8C173.7 8.4 166.9 8 160 8s-13.7 .4-20.4 1.2c-9.4 1.1-16.6 8.6-18.5 17.8L115 56.1c-13.3 5-25.5 12.1-36.2 20.9L50.5 67.8c-9-3-19-.5-24.7 7.1c-3.5 4.7-6.8 9.6-9.9 14.6l-3 5.3c-2.8 5-5.3 10.2-7.6 15.6c-3.7 8.7-.9 18.6 6.2 25l22.2 19.8C32.6 161.9 32 168.9 32 176s.6 14.1 1.7 20.9L11.5 216.7c-7.1 6.3-9.9 16.2-6.2 25c2.3 5.3 4.8 10.5 7.6 15.6l3 5.2c3 5.1 6.3 9.9 9.9 14.6c5.7 7.6 15.7 10.1 24.7 7.1l28.2-9.3c10.7 8.8 23 16 36.2 20.9l6.1 29.1c1.9 9.3 9.1 16.7 18.5 17.8c6.7 .8 13.5 1.2 20.4 1.2s13.7-.4 20.4-1.2c9.4-1.1 16.6-8.6 18.5-17.8l6.1-29.1c13.3-5 25.5-12.1 36.2-20.9l28.2 9.3c9 3 19 .5 24.7-7.1c3.5-4.7 6.8-9.5 9.8-14.6l3.1-5.4c2.8-5 5.3-10.2 7.6-15.5c3.7-8.7 .9-18.6-6.2-25l-22.2-19.8c1.1-6.8 1.7-13.8 1.7-20.9s-.6-14.1-1.7-20.9l22.2-19.8zM208 176c0 26.5-21.5 48-48 48s-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48zM504.7 500.5c6.3 7.1 16.2 9.9 25 6.2c5.3-2.3 10.5-4.8 15.5-7.6l5.4-3.1c5-3 9.9-6.3 14.6-9.8c7.6-5.7 10.1-15.7 7.1-24.7l-9.3-28.2c8.8-10.7 16-23 20.9-36.2l29.1-6.1c9.3-1.9 16.7-9.1 17.8-18.5c.8-6.7 1.2-13.5 1.2-20.4s-.4-13.7-1.2-20.4c-1.1-9.4-8.6-16.6-17.8-18.5L583.9 307c-5-13.3-12.1-25.5-20.9-36.2l9.3-28.2c3-9 .5-19-7.1-24.7c-4.7-3.5-9.6-6.8-14.6-9.9l-5.3-3c-5-2.8-10.2-5.3-15.6-7.6c-8.7-3.7-18.6-.9-25 6.2l-19.8 22.2c-6.8-1.1-13.8-1.7-20.9-1.7s-14.1 .6-20.9 1.7l-19.8-22.2c-6.3-7.1-16.2-9.9-25-6.2c-5.3 2.3-10.5 4.8-15.6 7.6l-5.2 3c-5.1 3-9.9 6.3-14.6 9.9c-7.6 5.7-10.1 15.7-7.1 24.7l9.3 28.2c-8.8 10.7-16 23-20.9 36.2L315.1 313c-9.3 1.9-16.7 9.1-17.8 18.5c-.8 6.7-1.2 13.5-1.2 20.4s.4 13.7 1.2 20.4c1.1 9.4 8.6 16.6 17.8 18.5l29.1 6.1c5 13.3 12.1 25.5 20.9 36.2l-9.3 28.2c-3 9-.5 19 7.1 24.7c4.7 3.5 9.5 6.8 14.6 9.8l5.4 3.1c5 2.8 10.2 5.3 15.5 7.6c8.7 3.7 18.6 .9 25-6.2l19.8-22.2c6.8 1.1 13.8 1.7 20.9 1.7s14.1-.6 20.9-1.7l19.8 22.2zM464 400c-26.5 0-48-21.5-48-48s21.5-48 48-48s48 21.5 48 48s-21.5 48-48 48z" />
                    </svg>
                </span>
                <span>Settings</span>
                <span
                    class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300 motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600 group-hover:[&>svg]:fill-blue-600 group-focus:[&>svg]:fill-blue-600 group-active:[&>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&>svg]:fill-blue-600 dark:[&>svg]:fill-gray-300"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                    </svg>
                </span>
            </a>
            <ul class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                data-te-sidenav-collapse-ref>
                <li class="relative">
                    <a class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                        data-te-sidenav-link-ref>Profile</a>
                </li>
                <li class="relative">
                    <a class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                        data-te-sidenav-link-ref>Account</a>
                </li>
            </ul>
        </li>
        <li class="relative">
            <a class="group flex h-12 cursor-pointer items-center truncate rounded-[5px] py-4 px-6 text-[0.875rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                data-te-sidenav-link-ref>
                <span
                    class="mr-4 [&>svg]:h-3.5 [&>svg]:w-3.5 [&>svg]:fill-gray-700 [&>svg]:transition [&>svg]:duration-300 [&>svg]:ease-linear group-hover:[&>svg]:fill-blue-600 group-focus:[&>svg]:fill-blue-600 group-active:[&>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&>svg]:fill-blue-600 motion-reduce:[&>svg]:transition-none dark:[&>svg]:fill-gray-300 dark:group-hover:[&>svg]:fill-gray-300 ">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M144 144v48H304V144c0-44.2-35.8-80-80-80s-80 35.8-80 80zM80 192V144C80 64.5 144.5 0 224 0s144 64.5 144 144v48h16c35.3 0 64 28.7 64 64V448c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V256c0-35.3 28.7-64 64-64H80z" />
                    </svg>
                </span>
                <span>Password</span>
                <span
                    class="absolute right-0 ml-auto mr-[0.8rem] transition-transform duration-300 motion-reduce:transition-none [&>svg]:h-3 [&>svg]:w-3 [&>svg]:fill-gray-600 group-hover:[&>svg]:fill-blue-600 group-focus:[&>svg]:fill-blue-600 group-active:[&>svg]:fill-blue-600 group-[te-sidenav-state-active]:[&>svg]:fill-blue-600 dark:[&>svg]:fill-gray-300"
                    data-te-sidenav-rotate-icon-ref>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path
                            d="M201.4 374.6c12.5 12.5 32.8 12.5 45.3 0l160-160c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L224 306.7 86.6 169.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3l160 160z" />
                    </svg>
                </span>
            </a>
            <ul class="show !visible relative m-0 hidden list-none p-0 data-[te-collapse-show]:block"
                data-te-sidenav-collapse-ref>
                <li class="relative">
                    <a class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                        data-te-sidenav-link-ref>Request password</a>
                </li>
                <li class="relative">
                    <a class="flex h-6 cursor-pointer items-center truncate rounded-[5px] py-4 pl-[3.4rem] pr-6 text-[0.78rem] text-gray-700 outline-none transition duration-300 ease-linear hover:bg-blue-400/10 hover:text-blue-600 hover:outline-none focus:bg-blue-400/10 focus:text-blue-600 focus:outline-none active:bg-blue-400/10 active:text-blue-600 active:outline-none data-[te-sidenav-state-active]:text-blue-600 data-[te-sidenav-state-focus]:outline-none motion-reduce:transition-none dark:text-gray-300 dark:hover:bg-white/10 dark:focus:bg-white/10 dark:active:bg-white/10"
                        data-te-sidenav-link-ref>Reset password</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
<!-- Sidenav -->
