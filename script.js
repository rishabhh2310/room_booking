$(document).ready(function() 
{
	var dialog_title = " Events ";
	var selected_dates = new Array();
	// get all the events from the database using AJAX
	selected_dates = getSelectedDates();
	
	$('#datepicker').datepicker({
		dateFormat: 'yy-m-d',
		inline: true,
		beforeShowDay: function (date)
		{
			// get the current month, day and year
			// attention: the months count start from 0 that's why you'll need +1 to get the month right
			var mm = date.getMonth() + 1, 
				dd = date.getDate(),	
				yy = date.getFullYear();
			var dt = yy + "-" + mm + "-" + dd;
			
			if(typeof selected_dates[dt] != 'undefined')
			{
				// put a special class to the dates you have events for so you can distinguish it from other ones
				// the "true" parameter is used so we know what are the dates that are clickable
				return [true, " my_class"];
			}
			
			return [false, ""];
		},
		onSelect: function(date)

	{

	 //   var dialog_title = " ";

	    var dialog_html = " ";

	    $.each(selected_dates[date], function(n, val)

	    {

	        dialog_html = dialog_html + "<hr / ><font size='1'>" + "Id- "+val.id+" : "+val.purpose+" "+val.stime+" to "+val.etime+" in "+val.room;

	    });

	    // put the event's title in the dialog box 

	    $('#dialog').attr("title", dialog_title);

	    // put the event's description text in the dialog box 

	    $("#dialog").html(dialog_html);

	    // show the dialog box

	    $("#dialog" ).dialog();

	}
        
			
	});
});
function getSelectedDates()
{
	var the_selected_dates = new Array();
    $.ajax(
    {
        url: 'events.php',
        dataType: 'json',
        async: false,
        success: function(data)
        {
			$.each(data, function(n, val)
            {
 //               the_selected_dates[val.date] = val;
 		the_selected_dates[n] = val;
            });
        }
    });
    return the_selected_dates;
}
