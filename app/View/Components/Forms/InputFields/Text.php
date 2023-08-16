<?php

namespace App\View\Components\Forms\InputFields;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Text extends Component implements Styles
{
    /**
     * Create a new component instance.
     */

    public $inherited_error_classes;
    public $inherited_classes;
    public $name;

    public function __construct()
    {
        $this->inherited_classes = Text::inherited_classes;
        $this->inherited_error_classes = Text::inherited_error_classes;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.forms.input-fields.text');
    }
}
