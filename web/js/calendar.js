$("document").ready(function(){

//dobavil sam promenlivi za koito vzemat directno ot formata datata v neobhodimia format

    var dateCheckIn;
    var dateCheckOut;

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = $('.dpd1').datepicker({
        onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            dateCheckIn = new Date(ev.date);
            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);


        }
        checkin.hide();
        $('.dpd2')[0].focus();
    }).data('datepicker');
    var checkout = $('.dpd2').datepicker({
        onRender: function(date) {
            dateCheckIn = checkin.date.valueOf();
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function(ev) {
        dateCheckOut = new Date(ev.date);
        checkout.hide();
    }).data('datepicker');

    $('.dpd2').datepicker()
        .on('changeDate', function(ev){
            var timestamp1 = dateCheckIn;
            var timestamp2 = Date.parse(dateCheckOut);
            //alert($('#users_usersbundle_clientsrequests_hotelId').val());


            if ($(this).val().length === 10 && isNaN(timestamp1) == false && isNaN(timestamp2) == false) {
                if(showDays(timestamp1, timestamp2) > -1){
                    //alert($.format.date(new Date(timestamp2), "yyyy-MM-dd"));
                    startPeriod = $.format.date(new Date(timestamp2), "yyyy-MM-dd");
                    hotelId = $('#users_usersbundle_clientsrequests_hotelId').val();
                    promotionEarlyReservation(hotelId, startPeriod);
                    $(".nights").val(showDays(timestamp1, timestamp2));

                }
            }else{
                $(".nights").val('');
            }
            $(".nights").prop('disabled', true);

            ////ajax
            //$.ajax({
            //    type: 'get',
            //    url: '/project-kvartiri/web/app_dev.php/season/' + $('#idHotel').val(),
            //    beforeSend: function() {
            //        if ($(".loading").length == 0) {
            //            $("form .seasonMessage").parent().append('<div class="loading"></div>');
            //        }
            //    },
            //    success: function(data) {
            //        $(".seasonMessage").val(data.seasonMessage);
            //        $(".loading").remove();
            //    }
            //});



        });

    function showDays(firstDate,secondDate){

        var startDay = new Date(firstDate);
        var endDay = new Date(secondDate);

        var millisecondsPerDay = 1000 * 60 * 60 * 24;

        var millisBetween = endDay.getTime() - startDay.getTime();
        var days = millisBetween / millisecondsPerDay;

        // Round down.
        return Math.floor(days);

    }

    function promotionEarlyReservation(hotelId, dateStart) {

        //alert("raboti");
        $.ajax({
            type: 'get',
            url: Routing.generate('date_promotions',  {hotelId: hotelId, dateStart: dateStart}),
            //url: '/project-kvartiri/web/app_dev.php/date-promotions/' + hotelId + '/' + startPeriod,
            beforeSend: function() {
                //if ($(".loading").length == 0) {
                    //$("form .ville").parent().append('<div class="loading"></div>');
                //    $('.promotion1').append('<div class="loading"></div>');
                //}
            },
            success: function(data) {

                $('.promotion1').val(data.getPromotion);
                alert(data.getPromotion);


                //$.each(data.ville, function(index,value) {
                //    $(".ville").append($('<option>',{ value : value , text: value }));
                //});
                //$(".loading").remove();
            }
        });

    }
















    //var nowTemp = new Date();
    //var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    //var checkin = $('.dpd1').datepicker({
    //    onRender: function(date) {
    //        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //        alert('tuk raboti');
    //    }
    //}).on('changeDate', function(ev) {
    //    if (ev.date.valueOf() > checkout.date.valueOf()) {
    //        var newDate = new Date(ev.date)
    //        newDate.setDate(newDate.getDate() + 1);
    //        checkout.setValue(newDate);
    //    }
    //    checkin.hide();
    //    $('.dpd2')[0].focus();
    //}).data('datepicker');
    //var checkout = $('.dpd2').datepicker({
    //    onRender: function(date) {
    //        return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
    //
    //    }
    //}).on('changeDate', function(ev) {
    //    checkout.hide();
    //}).data('datepicker');
    //
    //$('.dpd2').datepicker()
    //    .on('changeDate', function(ev){
    //        var checkIn = $('.dpd1').val();
    //        var checkOut = $('.dpd2').val();
    //        var startDate = checkIn.slice(0, 10).split('/');
    //        var endDate = checkOut.slice(0, 10).split('/');
    //
    //        var timestamp1 = Date.parse(checkIn);
    //        var timestamp2 = Date.parse(checkOut);
    //
    //
    //        if ($(this).val().length === 10 && isNaN(timestamp1) == false && isNaN(timestamp2) == false) {
    //            if(showDays(startDate, endDate) > -1){
    //                $(".nights").val(showDays(startDate, endDate));
    //
    //            }
    //        }else{
    //            $(".nights").val('');
    //            alert($(this).val().length);
    //            alert(checkIn);
    //            alert(checkOut);
    //        }
    //        $(".nights").prop('disabled', true);
    //
    //        ////ajax
    //        //$.ajax({
    //        //    type: 'get',
    //        //    url: '/project-kvartiri/web/app_dev.php/season/' + $('#idHotel').val(),
    //        //    beforeSend: function() {
    //        //        if ($(".loading").length == 0) {
    //        //            $("form .seasonMessage").parent().append('<div class="loading"></div>');
    //        //        }
    //        //    },
    //        //    success: function(data) {
    //        //        $(".seasonMessage").val(data.seasonMessage);
    //        //        $(".loading").remove();
    //        //    }
    //        //});
    //
    //
    //
    //});
    //
    //
    //
    //function showDays(firstDate,secondDate){
    //
    //    var startDay = new Date(firstDate[2],firstDate[1],firstDate[0]);
    //    var endDay = new Date(secondDate[2],secondDate[1],secondDate[0]);
    //
    //    var millisecondsPerDay = 1000 * 60 * 60 * 24;
    //
    //    var millisBetween = endDay.getTime() - startDay.getTime();
    //    var days = millisBetween / millisecondsPerDay;
    //
    //    // Round down.
    //    return Math.floor(days);
    //
    //}


});








