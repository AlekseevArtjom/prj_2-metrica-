<?php

namespace App\View\Components;

use Illuminate\View\Component;

class componentWithoutBlade extends Component
{
	public $detail;
	public $detailName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($detail=0)
    {
        $this->detail=$detail;
	switch($detail) 
		{
		case(0): $this->detailName='no'; break;
		case(1): $this->detailName='engine'; break;
		case(2): $this->detailName='base'; break;
		case(3): $this->detailName='fuel tank'; break;
		default: $this->detailName='unexpected detail number'; break;
		}
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return <<<'blade'
<div>
    your try to bye the detail: {{$detailName}}
</div>
blade;
    }
}
