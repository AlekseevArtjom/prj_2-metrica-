<?php

namespace App\View\Components;

use Illuminate\View\Component;

class BackCallForm extends Component
{
	public $listType;
	public $filosof;
	public $count;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($listType='ul', $filosof, $count=1)
    {
        $this->listType=$listType;
	$this->filosof=$filosof;
	$this->count=$count;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.back-call-form');
    }

	
	public function countingNow($value) 
	{
	$countMassiv=[];
	for($i=$value;$i>0;$i--) $countMassiv[$i]=$i;
	return $countMassiv;
	}
}
