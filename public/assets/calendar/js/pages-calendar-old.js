var Calendar = function () {
	"use strict";
	var dateToShow, calendar, demoCalendar, eventClass, eventCategory, subViewElement, subViewContent, $eventDetail;
	var defaultRange = new Object;
	defaultRange.start = moment();
	defaultRange.end = moment().add('days', 1);
	//Calendar
	var setFullCalendarEvents = function() {
		var date = new Date();
		dateToShow = date;
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();

   		// print_r({{{getUpdates()}}});
   		  var u=[];
   		  var update=Session.get('updates');
   		      Session.unset('updates');
   		      // console.log(  update[2].update_classname[0].category_color );
              for (var i = 0; i <update.length; i++) {
                	    u.push({
               	     	 	title : update[i].update_title,
																									start : new Date(update[i].update_start.split(' ')[0]),
																									update_end :  new Date(update[i].update_end.split(' ')[0] ),
																									className: (update[i].update_classname[0]!= undefined)?update[i].update_classname[0].category_color:'',
																						   category: update[i].update_category,
																									allDay : update[i].update_allday==0?false:true,
																									content : update[i].update_content,
																									isOwner:update[i].update_setter
               	     	 });
                	     // console.log((update[i].update_classname[0]!= undefined)?update[i].update_classname[0].category_color:'');
              };
              demoCalendar=u;
            // console.log(demoCalendar[2].className);

	};
    //function to initiate Full Calendar
    var runFullCalendar = function () {
    	$(".add-event").off().on("click", function() {
    					subViewElement = $(this);
							   	subViewContent = subViewElement.attr('href');
							    	$.subview({
												content : subViewContent,
												onShow : function() {
													editFullEvent();
												},
												onHide : function() {
													hideEditEvent();
												}
											});
					    	});

        $('#event-categories div.event-category').each(function () {
            // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            };
            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject);
            // make the event draggable using jQuery UI
            $(this).draggable({
                zIndex: 999,
                revert: true, // will cause the event to go back to its
                revertDuration: 50 //  original position after the drag
            });
        });
        /* initialize the calendar
		-----------------------------------------------------------------*/
        var date = new Date();
        var d = date.getDate();
        var m = date.getMonth();
        var y = date.getFullYear();
        var form = '';
        $('#full-calendar').fullCalendar({
            buttonText: {
                prev: '<i class="fa fa-chevron-left"></i>',
                next: '<i class="fa fa-chevron-right"></i>'
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            events: demoCalendar,
            editable: true,
            droppable: true, // this allows things to be dropped onto the calendar !!!
            drop: function (date, allDay) { // this function is called when something is dropped
                // retrieve the dropped element's stored Event Object
                var originalEventObject = $(this).data('eventObject');

                var $categoryClass = $(this).attr('data-class');
                var $category = $categoryClass.replace("event-", "").toLowerCase().replace(/\b[a-z]/g, function(letter) {
				            return letter.toUpperCase();
			             	});
                // we need to copy it, so that multiple events don't have a reference to the same object

                newEvent = new Object;
																newEvent.title = originalEventObject.title,
																newEvent.start = new Date(date),
																newEvent.end =  moment(new Date(date)).add('hours', 1),
																newEvent.allDay = true,
																newEvent.className = $categoryClass,
																// newEvent.category = $category,
																newEvent.category=$categoryClass,
																newEvent.content = "";


                demoCalendar.push(newEvent);
                $('#full-calendar').fullCalendar( 'refetchEvents' );

                // is the "remove after drop" checkbox checked?
                if ($('#drop-remove').is(':checked')) {
                    // if so, remove the element from the "Draggable Events" list
                    $(this).remove();
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay) {
            	defaultRange.start = moment(start);
												defaultRange.end = moment(start).add('hours', 1);
												$.subview({
													content : "#newFullEvent",
													onShow : function() {
														editFullEvent();
													},
													onHide : function() {
														hideEditEvent();
													}
												});
            },
            eventClick: function (calEvent, jsEvent, view) {
            	dateToShow = calEvent.start;

												$.subview({
													content : "#readFullEvent",
													startFrom : "right",
													onShow : function() {
														readFullEvents(calEvent._id);
													}
												});

            }
        });
    };
	var editFullEvent = function(el) {
		$(".close-new-event").off().on("click", function() {
			$(".back-subviews").trigger("click");
		});
		$(".form-full-event .help-block").remove();
		$(".form-full-event .form-group").removeClass("has-error").removeClass("has-success");
		$eventDetail = $('.form-full-event .summernote');

		$eventDetail.summernote({
			oninit: function() {
				if ($eventDetail.code() == "" || $eventDetail.code().replace(/(<([^>]+)>)/ig, "") == "") {
					$eventDetail.code($eventDetail.attr("placeholder"));
				}
			},
			onfocus: function(e) {
				if ($eventDetail.code() == $eventDetail.attr("placeholder")) {
					$eventDetail.code("");
				}
			},
			onblur: function(e) {
				if ($eventDetail.code() == "" || $eventDetail.code().replace(/(<([^>]+)>)/ig, "") == "") {
					$eventDetail.code($eventDetail.attr("placeholder"));
				}
			},
			onkeyup: function(e) {
				$("span[for='detailEditor']").remove();
			},
			toolbar: [
			['style', ['bold', 'italic', 'underline', 'clear']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			]
		});
		if ( typeof el == "undefined") {
			$(".form-full-event .event-id").val("");
			$(".form-full-event .event-name").val("");
			$(".form-full-event .all-day").bootstrapSwitch('state', false);
			$('.form-full-event .all-day-range').hide();
			$(".form-full-event .event-start-date").val(defaultRange.start);
			$(".form-full-event .event-end-date").val(defaultRange.end);

			$('.form-full-event .no-all-day-range .event-range-date').val(moment(defaultRange.start).format('MM/DD/YYYY h:mm A') + ' - ' + moment(defaultRange.end).format('MM/DD/YYYY h:mm A'))
			.daterangepicker({
				startDate: defaultRange.start,
				endDate: defaultRange.end,
				timePicker: true,
				timePickerIncrement: 30,
				format: 'MM/DD/YYYY h:mm A'
			});

			$('.form-full-event .all-day-range .event-range-date').val(moment(defaultRange.start).format('MM/DD/YYYY') + ' - ' + moment(defaultRange.end).format('MM/DD/YYYY'))
			.daterangepicker({
				startDate: defaultRange.start,
				endDate: defaultRange.end
			});

			$('.form-full-event .event-categories option').filter(function() {
				return ($(this).text() == "Generic");
			}).prop('selected', true);
			$('.form-full-event .event-categories').selectpicker('render');
			$eventDetail.code($eventDetail.attr("placeholder"));

			defaultRange.start = moment();
			defaultRange.end = moment().add('days', 1);

		} else {

			$(".form-full-event .event-id").val(el);

			for (var i = 0; i < demoCalendar.length; i++) {

				if (demoCalendar[i]._id == el) {
					$(".form-full-event .event-name").val(demoCalendar[i].title);
					$(".form-full-event .all-day").bootstrapSwitch('state', demoCalendar[i].allDay);
					$(".form-full-event .event-start-date").val(moment(demoCalendar[i].start));
					$(".form-full-event .event-end-date").val(moment(demoCalendar[i].update_end));
							if(typeof $('.form-full-event .no-all-day-range .event-range-date').data('daterangepicker') == "undefined"){
				$('.form-full-event .no-all-day-range .event-range-date').val(moment(demoCalendar[i].start).format('MM/DD/YYYY h:mm A') + ' - ' + moment(demoCalendar[i].update_end).format('MM/DD/YYYY h:mm A'))
					.daterangepicker({
						startDate:moment(moment(demoCalendar[i].start)),
						endDate: moment(moment(demoCalendar[i].update_end)),
						timePicker: true,
						timePickerIncrement: 10,
						format: 'MM/DD/YYYY h:mm A'
					});

					$('.form-full-event .all-day-range .event-range-date').val(moment(demoCalendar[i].start).format('MM/DD/YYYY') + ' - ' + moment(demoCalendar[i].update_end).format('MM/DD/YYYY'))
					.daterangepicker({
						startDate:moment(demoCalendar[i].start),
						endDate: moment(demoCalendar[i].update_end)
					});
			} else {
				$('.form-full-event .no-all-day-range .event-range-date').val(moment(demoCalendar[i].start).format('MM/DD/YYYY h:mm A') + ' - ' + moment(demoCalendar[i].update_end).format('MM/DD/YYYY h:mm A'))
				.data('daterangepicker').setStartDate(moment(moment(demoCalendar[i].start)));
				$('.form-full-event .no-all-day-range .event-range-date').data('daterangepicker').setEndDate(moment(moment(demoCalendar[i].update_end)));
				$('.form-full-event .all-day-range .event-range-date').val(moment(demoCalendar[i].start).format('MM/DD/YYYY') + ' - ' + moment(demoCalendar[i].end).format('MM/DD/YYYY'))
				.data('daterangepicker').setStartDate(demoCalendar[i].start);
				$('.form-full-event .all-day-range .event-range-date').data('daterangepicker').setEndDate(demoCalendar[i].end);
			}

					if (demoCalendar[i].category == "" || typeof demoCalendar[i].category == "undefined") {
						eventCategory = "Generic";
					} else {
						eventCategory = demoCalendar[i].category;
					}
					$('.form-full-event .event-categories option').filter(function() {
						return ($(this).text() == eventCategory);
					}).prop('selected', true);
					$('.form-full-event .event-categories').selectpicker('render');
					if ( typeof demoCalendar[i].content !== "undefined" && demoCalendar[i].content !== "") {
						$eventDetail.code(demoCalendar[i].content);
					} else {
						$eventDetail.code($eventDetail.attr("placeholder"));
					}
				}

			}
		}
		$('.form-full-event .all-day').bootstrapSwitch();

		$('.form-full-event .all-day').on('switchChange.bootstrapSwitch', function(event, state) {
			$(".daterangepicker").hide();
			var startDate = moment($("#newFullEvent").find(".event-start-date").val());
			var endDate = moment($("#newFullEvent").find(".event-end-date").val());
			if (state) {
				$("#newFullEvent").find(".no-all-day-range").hide();
				$("#newFullEvent").find(".all-day-range").show();
				$("#newFullEvent").find('.all-day-range .event-range-date').val(startDate.format('MM/DD/YYYY') + ' - ' + endDate.format('MM/DD/YYYY')).data('daterangepicker').setStartDate(startDate);
				$("#newFullEvent").find('.all-day-range .event-range-date').data('daterangepicker').setEndDate(endDate);
			} else {
				$("#newFullEvent").find(".no-all-day-range").show();
				$("#newFullEvent").find(".all-day-range").hide();
				$("#newFullEvent").find('.no-all-day-range .event-range-date').val(startDate.format('MM/DD/YYYY h:mm A') + ' - ' + endDate.format('MM/DD/YYYY h:mm A')).data('daterangepicker').setStartDate(startDate);
				$("#newFullEvent").find('.no-all-day-range .event-range-date').data('daterangepicker').setEndDate(endDate);
			}

		});
		$('.form-full-event .event-range-date').on('apply.daterangepicker', function(ev, picker) {
			$(".form-full-event .event-start-date").val(picker.startDate);
			$(".form-full-event .event-end-date").val(picker.endDate);
		});
	};
    var readFullEvents = function(el) {

						$(".edit-event").off().on("click", function() {
		     if(demoCalendar[parseInt(el.substring(3,el.length))-1].isOwner == 1){
									Session.set('is_edit',true);
									subViewElement = $(this);
									subViewContent = subViewElement.attr('href');
									$.subview({
										content : subViewContent,
										onShow : function() {
											editFullEvent(el);
										},
										onHide : function() {
											hideEditEvent();
										}
									});
								}else{
  							 toastr.info('You can not edit this event');
								}
						});

		   $(".delete-event").data("event-id", el);

	    $("#readFullEvent").find(".delete-event").off().on("click", function() {
		    	el = $(this).data("event-id");
		   	 if(demoCalendar[parseInt(el.substring(3,el.length))-1].isOwner == 1){
		   	       bootbox.confirm("Are you sureyou want to delete this event?", function(result) {
		   										if (result) {
		   											for ( i = 0; i < demoCalendar.length; i++) {
		   												if (demoCalendar[i]._id == el) {
		   												 	demoCalendar.splice(i, 1);
		   												}
		   											}
		   											$('#full-calendar').fullCalendar( 'refetchEvents' );
		   											$.hideSubview();
		   											 	    $.ajax({
		   																							url:'updates/0',
		   																							method:'PUT',
		   																							data:{
		   																								    id: el.substring(3,el.length),archived:true
		   																	                           },
		   																							 success:function(data){
		   																	           console.log(data);
		   																							}
		   																	});
		   										}
		   							});
		   	}else{
							 toastr.info('You can not delete this event');
							}
		});
		for ( var i = 0; i < demoCalendar.length; i++) {

			if (demoCalendar[i]._id == el) {

				$("#readFullEvent .event-allday").hide();
				$("#readFullEvent .event-end").empty().hide();

				$("#readFullEvent .event-title").empty().text(demoCalendar[i].title);
				// if (demoCalendar[i].className == "" || typeof demoCalendar[i].className == "undefined") {
				// 	eventClass = "event-generic";
				// } else {
				// 	eventClass = demoCalendar[i].className;
				// }
					eventClass = demoCalendar[i].className;
				// if (demoCalendar[i].category == 0 || typeof demoCalendar[i].category == "undefined") {
				// 	eventCategory = "Generic";
				// } else {
				// 	eventCategory = demoCalendar[i].category;
				// }
     eventCategory = demoCalendar[i].category;
				$("#readFullEvent .event-category")
				.empty()
				.removeAttr("class")
				.addClass("event-category view" + eventClass)
				.attr('style', 'border-left:3px solid' +eventClass +' !important;')
				.text( getCategoryName(eventCategory));
				if (demoCalendar[i].allDay) {
					$("#readFullEvent .event-allday").show();
					$("#readFullEvent .event-start").empty().html("<p>Start:</p> <div class='event-day'><h2>" + moment(demoCalendar[i].start).format('DD') + "</h2></div><div class='event-date'><h3>" + moment(demoCalendar[i].start).format('dddd') + "</h3><h4>" + moment(demoCalendar[i].start).format('MMMM YYYY') + "</h4></div>");
					if (demoCalendar[i].end !== null) {
						if (moment(demoCalendar[i].update_end).isValid()) {
							$("#readFullEvent .event-end").show().html("<p>End:</p> <div class='event-day'><h2>" + moment(demoCalendar[i].update_end).format('DD') + "</h2></div><div class='event-date'><h3>" + moment(demoCalendar[i].update_end).format('dddd') + "</h3><h4>" + moment(demoCalendar[i].update_end).format('MMMM YYYY') + " </h4></div>");
						}
					}
				} else {

					$("#readFullEvent .event-start").empty().html("<p>Start:</p> <div class='event-day'><h2>" + moment(demoCalendar[i].start).format('DD') + "</h2></div><div class='event-date'><h3>" + moment(demoCalendar[i].start).format('dddd') + "</h3><h4>" + moment(demoCalendar[i].start).format('MMMM YYYY') + "</h4></div> <div class='event-time'><h3><i class='fa fa-clock-o'></i> " + moment(demoCalendar[i].start).format('h:mm A') + "</h3></div>");
					if (demoCalendar[i].update_end !== null) {
						if (moment(demoCalendar[i].update_end).isValid()) {
							$("#readFullEvent .event-end").show().html("<p>End:</p> <div class='event-day'><h2>" + moment(demoCalendar[i].update_end).format('DD') + "</h2></div><div class='event-date'><h3>" + moment(demoCalendar[i].update_end).format('dddd') + "</h3><h4>" + moment(demoCalendar[i].update_end).format('MMMM YYYY') + "</h4></div> <div class='event-time'><h3><i class='fa fa-clock-o'></i> " + moment(demoCalendar[i].update_end).format('h:mm A') + "</h3></div>");
						}
					}
				}

				$("#readFullEvent .event-content").empty().html(demoCalendar[i].content);

				break;
			}

		}

	};

	var runFullCalendarValidation = function(el) {

		var formEvent = $('.form-full-event');
		var errorHandler2 = $('.errorHandler', formEvent);
		var successHandler2 = $('.successHandler', formEvent);

		formEvent.validate({
			errorElement : "span", // contain the error msg in a span tag
			errorClass : 'help-block',
			errorPlacement : function(error, element) {// render error placement for each input type
				if (element.attr("type") == "radio" || element.attr("type") == "checkbox") {// for chosen elements, need to insert the error after the chosen container
					error.insertAfter($(element).closest('.form-group').children('div').children().last());
				} else if (element.parent().hasClass("input-icon")) {

					error.insertAfter($(element).parent());
				} else {
					error.insertAfter(element);
					// for other inputs, just perform default behavior
				}
			},
			ignore : "",
			rules : {
				eventName : {
					minlength : 2,
					required : true
				},
				eventStartDate : {
					required : true,
					date : true
				},
				eventEndDate : {
					required : true,
					date : true
				}
			},
			messages : {
				eventName : "* Please specify your event name"

			},
			invalidHandler : function(event, validator) {//display error alert on form submit
				successHandler2.hide();
				errorHandler2.show();
			},
			highlight : function(element) {
				$(element).closest('.help-block').removeClass('valid');
				// display OK icon
				$(element).closest('.form-group').removeClass('has-success').addClass('has-error').find('.symbol').removeClass('ok').addClass('required');
				// add the Bootstrap error class to the control group
			},
			unhighlight : function(element) {// revert the change done by hightlight
				$(element).closest('.form-group').removeClass('has-error');
				// set error class to the control group
			},
			success : function(label, element) {
				label.addClass('help-block valid');
				// mark the current input as valid and display OK icon
				$(element).closest('.form-group').removeClass('has-error').addClass('has-success').find('.symbol').removeClass('required').addClass('ok');
			},
			submitHandler : function(form) {
				successHandler2.show();
				errorHandler2.hide();
				var newEvent = new Object;
				newEvent.title = $(".form-full-event .event-name ").val(),
				newEvent.start = new Date($('.form-full-event .event-start-date').val()),
				newEvent.end = new Date($('.form-full-event .event-end-date').val()),
				newEvent.allDay = $(".form-full-event .all-day").bootstrapSwitch('state'),
				newEvent.className = $(".form-full-event .event-categories option:checked").text(),
				newEvent.category = $("select[name=event_category]").val(),
				newEvent.content = $eventDetail.code();
                console.log('event day '+ newEvent.category);

				$.blockUI({

						message : '<i class="fa fa-spinner fa-spin"></i> Saving...'
				});

				if ($(".form-full-event .event-id").val() !== "") {
				el = $(".form-full-event .event-id").val();

					for ( var i = 0; i < demoCalendar.length; i++) {

						if (demoCalendar[i]._id == el) {
							newEvent._id = el;
							var eventIndex = i;
						}

					}

					//mockjax simulates an ajax call
					$.mockjax({
					url : '/event/edit/webservice',
					dataType : 'json',
					responseTime : 1000,
					responseText : {
						say : 'ok'
					}
				});

				$.ajax({
					url : '/event/edit/webservice',
					dataType : 'json',
					success : function(json) {
						$.unblockUI();
						if (json.say == "ok") {
							demoCalendar[eventIndex] = newEvent;
						// /	console.log(eventIndex);
							if(Session.get('is_edit') ){
								 $.ajax({
									url:'set-update',
									method:'post',
									data:{
										   id:eventIndex,
			          update_title:newEvent.title,
			          update_content:newEvent.content,
			          update_start:newEvent.start,
			          update_end:newEvent.end,
			          update_allday:newEvent.allDay?1:0,
			          update_category:newEvent.category,
			          update_classname:newEvent.className
			        },
									 success:function(data){
			                      //    console.log(data);
			                          Session.clear();
									 }
								});
  				 	toastr.success('The event has been successfully modified!');

						 	$('#full-calendar').fullCalendar( 'refetchEvents' );
							 $.hideSubview();
						 }
					 }
					}
				});

				} else {
				//mockjax simulates an ajax call
				$.mockjax({
					url : '/event/new/webservice',
					dataType : 'json',
					responseTime : 1000,
					responseText : {
						say : 'ok'
					}
				});
				$.ajax({
					url : '/event/new/webservice',
					dataType : 'json',
					success : function(json) {
						$.unblockUI();
						if (json.say == "ok") {
							demoCalendar.push(newEvent);
							$('#full-calendar').fullCalendar( 'refetchEvents' );
							$.hideSubview();
							console.log(newEvent.className);
							console.log(newEvent.category);
							$.ajax({
								url:'updates',
								method:'post',
								data:{
									   _token:$('input[name=_token]').val(),
									   update_title:newEvent.title,
		          update_content:newEvent.content,
		          update_start:newEvent.start,
		          update_end:newEvent.end,
		          update_allday:newEvent.allDay?1:0,
		          update_category:newEvent.category,
		          update_classname:newEvent.className[0]
		                           },
								 success:function(data){
		                         console.log(data);
								}
							});
							toastr.success('A new event has been added to your calendar!');
						}
					}
				});
				}
			}
		});
	};
	// on hide event's form destroy summernote and bootstrapSwitch plugins
	var hideEditEvent = function() {
		$.hideSubview();
		$('.form-full-event .summernote').destroy();
		$(".form-full-event .all-day").bootstrapSwitch('destroy');

	};
    return {
        init: function () {
        	setFullCalendarEvents();
            runFullCalendar();

            runFullCalendarValidation();
        }
    };
}();

