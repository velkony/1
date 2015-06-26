$("document").ready(function () {

    calendarStart();

});

function calendarStart(i) {
    //dobavil sam promenlivi za koito vzemat directno ot formata datata v neobhodimia format
   var hotels= $('.hotelSeasonDate1').addClass("hotelSeasondebutDate" + i).removeClass("hotelSeasonDate1");
   var fin= $('.hotelSeasonDate2').addClass("hotelSeasonfinDate" + i).removeClass("hotelSeasonDate2");

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










