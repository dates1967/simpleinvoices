$(document).ready(init);
function init()
{
	$.datePicker.setDateFormat('ymd','-');
	$('input.date-picker').datePicker({startDate:'01/01/1970'});
}

