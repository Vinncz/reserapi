<?php

namespace App\View\Components\Forms\InputFields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component
{
    /**
     * Daripada nulis properties-nya berulang kali,
     * pindahkan itu ke Trait file lain.
     */
    use InputFieldProperties;

    /**
     * Property yang required taruh sini.
     * Sisanya kasih default.
     *
     * Disable all those that didn't get used
     */
    public function __construct($name,
                                $id = null,
                                $placeholder = null,
                                $value = null,
                                $required = false,
                                $max = null,
                                $min = null,
                                // $step = null,
                                $use_old_values = true,
                                // $enable_buttons = true,
    ) {
        $name = strtolower($name);
        $this->name = $name;
        $this->id = ( $id == null ) ? $name : $id;
        $this->placeholder = $placeholder;
        $this->init_value = $value;
        $this->required = $required;
        $this->max = $max;
        $this->min = $min;
        // $this->step = $step;
        $this->use_old_values = $use_old_values;
        // $this->enable_buttons = $enable_buttons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-fields.text');
    }
}
