function load_module(src)//, callback_function)
{
var script_to_load = document.createElement('script');
script_to_load.src = src;
script_to_load.type="module";
script_to_load.async = false ;
document.body.append(script_to_load);
//script_to_load.onload=callback_function;
}





window.addEventListener('load', function ()
{
console.log("start loading js");
load_module("scripts/jquery-3.6.0.js");

//load_module("scripts/jquery-1.11.1.min.js");
load_module("scripts/jquery.canvasjs.min.js");

load_module("scripts/jquery-ui-1.12.1.custom/jquery-ui.min.js");
load_module("scripts/getRefsForCurrentSite.js");
load_module("scripts/metricaShowData.js");
	
});
