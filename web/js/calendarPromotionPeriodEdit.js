/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$("document").ready(function () {
    var index2 = 0;
    $(".start1").each(function () {

        var hotels = $(this).addClass("promotionPeriodStartDate" + index2).removeClass("start1");
        var fin = $($('input.finish1')[0]).addClass("promotionPeriodFinishDate" + index2).removeClass("finish1");


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
    var hotels = $('.start1').addClass("promotionPeriodStartDate" + index).removeClass("start1");
    var fin = $('.finish1').addClass("promotionPeriodFinishDate" + index).removeClass("finish1");


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

