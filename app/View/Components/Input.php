<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Input extends Component
{

    private $type;
    private $label;
    private $placeholder;
    private $field;
    private $value;
    private $col;


    /**
     * @param string $type
     * @param string $label
     * @param string $placeholder
     * @param string $field
     * @param string $value
     * @param string $col
     */
    public function __construct(string $label,string $placeholder,string $field,string $col,string $type='text',string $value=''){
        $this->type = $type;
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->field = $field;
        $this->value = $value;
        $this->col = $col;
    }
    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.input',[
            'type' => $this->type,
            'label' => $this->label,
            'placeholder' => $this->placeholder,
            'field' => $this->field,
            'value' => $this->value,
            'col' => $this->col
        ]);
    }
}
