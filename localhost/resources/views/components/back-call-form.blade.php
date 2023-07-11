<div style="font-weight: bold; color: red; background-color: rgba(0,100,10, 0.3);">
     It is not the man who has too little, but the man who craves more, that is poor. - Seneca </br>
	Craves is not bad, bad is not to crave. {{$filosof}}
	<{{$listType}}> 
		@foreach($countingNow($count) as $current) 
			<li>current countdown={{$current}}</li> 
		@endforeach 
	</{{$listType}}>
	@isset($slot) {{$slot}} @endisset
</div>