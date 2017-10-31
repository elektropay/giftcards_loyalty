@extends ('layouts.master')

@section ('content')

	<div class = "window rounded">
		
		<div class = "">

			@if( ! empty(request('startDate')) && ! empty(request('endDate')))

				Showing result between {{request('startDate')}} and {{request('endDate')}}

			@elseif (! empty(request('startDate')))

			    Showing results after {{request('startDate')}}

			@elseif (! empty(request('endDate')))

			    Showing results before {{request('endDate')}}

			@else

			    Showing all time results

			@endif

		</div>

		<div class = "small-space"></div>

		<div class = "title line text-centered">
			Gift Card Usage
		</div>

		@if($stats['totalBought'] != 0)

			<div class="chart centered text-centered" data-percent="{{number_format(100 - (($stats['totalBought'] + $stats['totalUsed']) / $stats['totalBought']) * 100, 2)}}">
				<span>{{number_format(100 - (($stats['totalBought'] + $stats['totalUsed']) / $stats['totalBought']) * 100, 2)}}</span>%
			</div>

		@else 

			<div class="chart centered text-centered" data-percent='0'>
				<span>{{0.00}}</span>%
			</div>

		@endif

		<div class = "s-8 line centered"> Number of Cards: <span class = "right"> {{$stats['numberOfCards']}}</span></div>

		
		<div class = "s-8 line centered"> Total Bought: <span class = "right">{{ number_format($stats['totalBought'], 2) }} $</span></div>


		<div class = "s-8 line centered"> Total Used: <span class = "right">{{ number_format(-$stats['totalUsed'],2) }} $</span></div>
		

		<div class = "s-8 line centered"> Total Available: <span class = "right">{{ number_format($stats['totalBought'] + $stats['totalUsed'], 2) }} $</span></div>
		

		@if($stats['numberOfCards'] != 0)
		<div class = "s-8 line centered"> Average Bought: <span class = "right">{{ number_format(($stats['totalBought'] / $stats['numberOfCards']), 2) }} $</span></div>
		@else 
		<div class = "s-8 line centered"> Average Bought: <span class = "right"> 0 $</span></div>
		@endif


		@if($stats['numberOfCards'] != 0)
		<div class = "s-8 line centered"> Average Used: <span class = "right">{{ number_format((-$stats['totalUsed'] / $stats['numberOfCards']), 2) }} $</span></div>
		@else 
		<div class = "s-8 line centered"> Average Used: <span class = "right"> 0 $</span></div>
		@endif


		@if($stats['numberOfCards'] != 0)
		<div class = "s-8 line centered"> Average Available: <span class = "right">{{ number_format(($stats['totalBought'] + $stats['totalUsed']) / $stats['numberOfCards'], 2) }} $</span></div>
		@else 
		<div class = "s-8 line centered"> Average Available: <span class = "right"> 0 $</span></div>
		@endif

		<form method="GET" action=''>
	  		
	  		<input id = "user-id" class = "s-12 line rounded" type="text" name="location" placeholder="Location Name" required>
	  		<input id = "start-date" class = "s-12 line rounded" type="text" name="startDate" placeholder="Start Date" required>
	  		<input id = "end-date" class = "s-12 line rounded" type="text" name="endDate" placeholder="End Date" required>
	  		<div class = "space"></div>

	  		<button class = "s-12 line rounded blue" type="submit">Update Results</button>
	  		<div id = "ajaxResponse"></div>

		</form>

	</div>

@endsection

@section ('script')

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>

  	<script src="https://cdn.jsdelivr.net/jquery.easy-pie-chart/1.0.1/jquery.easy-pie-chart.js"></script>


  	<script>
  	$(function() {

    	$( "#start-date" ).datepicker({

    		changeMonth: true,
    		changeMonth: true,
    		changeYear: true,
    		yearRange: '2016:+0',
    		dateFormat: 'yy/mm/dd',
    		onSelect: function (dateText) {

    			var startDate = $( "#start-date" ).val();
    			var endDate = $( "#end-date" ).val();
    			var userID = $( "#user-id" ).val();

    			//showStatsForTimePeriod (startDate, endDate, userID);

    		}

    	});

    	$( "#end-date" ).datepicker({

    		changeMonth: true,
    		changeMonth: true,
    		changeYear: true,
    		yearRange: '2016:+0',
    		dateFormat: 'yy/mm/dd',
    		onSelect: function (dateText) {

    			var startDate = $( "#start-date" ).val();
    			var endDate = $( "#end-date" ).val();
    			var userID = $( "#user-id" ).val();

    			//showStatsForTimePeriod (startDate, endDate, userID);

    		}

    	});

    	//have not yet figured out how to make the ajax request work


    	// function showStatsForTimePeriod (startDate, endDate, userID) {

    	// 	$.ajax ({

    	// 		type : 'get',
    	// 		url : 'stats?startDate='+startDate,
    	// 		data : {startDate: startDate, endDate: endDate, userID: userID},
    			
    	// 		success: function (data) {
    				
    	// 			// $('#ajaxResponse').empty();
     //    //         	$("#ajaxResponse").html("<div>"+data.msg+"</div>");

    	// 		}

    	// 	})

    	// }

    	$(function() {
		  $('.chart').easyPieChart({
		    // The color of the curcular bar. You can pass either a css valid color string like rgb, rgba hex or string colors. But you can also pass a function that accepts the current percentage as a value to return a dynamically generated color.
		    barColor: '#333',
		    // The color of the track for the bar, false to disable rendering.
		    trackColor: '#f2f2f2',
		    // The color of the scale lines, false to disable rendering.
		    scaleColor: false,
		    // Defines how the ending of the bar line looks like. Possible values are: butt, round and square.
		    lineCap: 'round',
		    // Width of the bar line in px.
		    lineWidth: 10,
		    // Size of the pie chart in px. It will always be a square.
		    size: 150,
		    // Time in milliseconds for a eased animation of the bar growing, or false to deactivate.
		    animate: 1000,
		    // Callback function that is called at the start of any animation (only if animate is not false).
		    onStart: $.noop,
		    // Callback function that is called at the end of any animation (only if animate is not false).
		    onStop: $.noop
		  });
		  $('.updatePieCharts').on('click', function(e) {
		    e.preventDefault();
		    var newValue = Math.floor(100 * Math.random());
		    $('.chart').data('easyPieChart').update(newValue);
		    $('span', $('.chart')).text(newValue);
		  });
		});


  	});
 	 </script>

@endsection