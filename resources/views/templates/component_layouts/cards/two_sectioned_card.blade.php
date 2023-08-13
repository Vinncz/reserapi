<booking_container class="flex flex-wrap rounded-xl h-fit border resize transition-none break-words p-2 overflow-hidden mb-12">
    <left_side class="portrait:after:w-0 after:absolute after:top-0 after:left-[100%] after:ml-[5px] after:dark:bg-zinc-800 after:bg-slate-100 after:rounded after:w-[5px] after:h-full w-[30%] min-w-[175px] bg-slate-100 text-slate-700 rounded p-6 py-8 gap-6 flex flex-col flex-grow dark:bg-zinc-800 dark:text-inherit">
        @yield('left-side')
    </left_side>

    <right_side class="w-[70%] min-w-[200px] p-6 px-8 py-8 flex flex-col flex-grow gap-6">
        @yield('right-side')
    </right_side>
</booking_container>
