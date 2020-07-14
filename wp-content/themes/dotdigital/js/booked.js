"use strict";
//add "Today" to Booked plugin view
jQuery('.booked-calendar').find('.today').append( '<span class="today_word">'+ booked_today.today_string +'</span>' );