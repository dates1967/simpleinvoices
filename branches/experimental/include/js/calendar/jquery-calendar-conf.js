$(document).ready(init);

function init(){
	$(".calendar").calendar({
		autoPopUp: 'both',
		buttonImageOnly: true, buttonImage: './images/common/calendar.gif',
		buttonText: 'Calendar',
		dateFormat: "MDY/",
		yearRange: "2000:2020"});
};
