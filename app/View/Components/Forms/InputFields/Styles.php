<?php

namespace App\View\Components\Forms\InputFields;

interface Styles
{
    const inherited_error_classes =
    "!bg-rose-200 border-rose-500 dark:!bg-rose-950 dark:border-rose-500 dark:placeholder:!text-rose-700 dark:text-rose-200 placeholder:!text-rose-300";

    const inherited_classes =
    "border-b p-3 rounded-none placeholder:text-zinc-300 w-full
    -outline-offset-2 focus:outline-2 focus:outline outline-blue-500
    hover:bg-zinc-100 h-full
    dark:hover:bg-zinc-900 dark:bg-zinc-900 dark:placeholder:text-zinc-700";
}
