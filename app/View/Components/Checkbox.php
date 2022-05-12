<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Checkbox extends Component
{
    private $label;
    private $field;
    private $checked;


    /**
     * @param string $label
     * @param string $field
     * @param bool $checked
     */
    public function __construct(string $label, bool $checked = false, string $field){
      $this->label = $label;
      $this->field = $field;
      $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.checkbox',[
            'label' => $this->label,
            'field' => $this->field,
            'checked' => $this->checked
        ]);
    }
}
