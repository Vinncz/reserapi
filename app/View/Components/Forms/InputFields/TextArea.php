<?php

namespace App\View\Components\Forms\InputFields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TextArea extends Component
{
    use InputFieldProperties;

    /**
     * Create a new component instance.
     */
    public function __construct($name,
                                $id = null,
                                $placeholder = null,
                                // $value = 0,
                                $required = false,
                                $max = 2147483647,
                                $min = 0,
                                // $step = 1,
                                $useOldValues = true,
                                // $enableButtons = false,
    ) {

        if ($max == null || $max < $min) {
            $max = 2147483647;
        }

        $name = strtolower($name);
        $this->name = $name;
        $this->id = ( $id == null ) ? $name : $id;
        $this->placeholder = $placeholder;
        // $this->init_value = $value;
        $this->required = $required;
        $this->max = $max;
        $this->min = $min;
        // $this->step = $step;
        $this->use_old_values = $useOldValues;
        // $this->enable_buttons = $enableButtons;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-fields.text-area');
    }
}
