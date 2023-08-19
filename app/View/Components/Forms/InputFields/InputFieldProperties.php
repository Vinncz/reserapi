<?php

namespace App\View\Components\Forms\InputFields;

trait InputFieldProperties {
    /**
     * Attributes
     */
    public $name;
    public $id;
    public $placeholder;
    public $init_value;
    public $required;
    public $max;
    public $min;
    public $step;
    public $use_old_values;
    public $enable_buttons;

    /**
     * Styling
     */
    public $error_class =
    " !bg-rose-200 border-rose-500
        placeholder:!text-rose-300
    dark:!bg-rose-950 dark:border-rose-500 dark:text-rose-200
        dark:placeholder:!text-rose-700 ";
    public $class =
    " border-b p-3 rounded-none placeholder:text-zinc-300 w-full
        -outline-offset-2 focus:outline-2 focus:outline outline-blue-500
        hover:bg-zinc-100 h-full
    dark:hover:bg-zinc-900 dark:bg-zinc-900
        dark:placeholder:text-zinc-700 ";
}
