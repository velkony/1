/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("document").ready(function () {
    var index2 = 0;
    $(".hotelSeasonDate1").each(function () {

        var hotels = $(this).addClass("hotelSeasondebutDate" + index2).removeClass("hotelSeasonDate1");
        var fin = $($('input.hotelSeasonDate2')[0]).addClass("hotelSeasonfinDate" + index2).removeClass("hotelSeasonDate2");


        calendarStartEdit(hotels, fin);
        index2++;

    });


});
function calendarStartEdit(hotels, fin) {
    //dobavil sam promenlivi za koito vzemat directno ot formata datata v neobhodimia format

    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = hotels.datepicker({
        onRender: function (date) {

            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        fin.focus();
    }).data('datepicker');
    var checkout = fin.datepicker({
        onRender: function (date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        checkout.hide();
    }).data('datepicker');
}
function calendarStart(index, hotels, fin) {
    //dobavil sam promenlivi za koito vzemat directno ot formata datata v neobhodimia format
    var hotels = $('.hotelSeasonDate1').addClass("hotelSeasondebutDate" + index).removeClass("hotelSeasonDate1");
    var fin = $('.hotelSeasonDate2').addClass("hotelSeasonfinDate" + index).removeClass("hotelSeasonDate2");


    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

    var checkin = hotels.datepicker({
        onRender: function (date) {

            return date.valueOf() < now.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date);
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
        }
        checkin.hide();
        fin.focus();
    }).data('datepicker');
    var checkout = fin.datepicker({
        onRender: function (date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
        }
    }).on('changeDate', function (ev) {
        checkout.hide();
    }).data('datepicker');
}

