<?php

namespace App\View\Components\Roles\Forms;

use Illuminate\View\Component;

class Modal extends Component
{
    public $label;
    public $urlAction;
    public $value;
    public $placeholder;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $urlAction, $value=null, $placeholder='Admin')
    {
        $this->label = $label;
        $this->urlAction = $urlAction;
        $this->value = $value;
        $this->placeholder = $placeholder;
    }

    public function btnLabel(){
        if($this->label == 'Add'){
            return 'Submit';
        }
        return 'Save Changes';
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.roles.forms.modal');
    }
}
