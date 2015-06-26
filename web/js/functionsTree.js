$("document").ready(function(){
    $.ajax({
        type: 'GET',
        url: Routing.generate('regionCities'),
        //url:'/project-kvartiri/web/app_dev.php/regions',
        dataType : 'json',
        beforeSend: function(){
            if ($('.loading').length == 0) {
                $('.nav-header').append('<div class="loading"></div>');
            }
        },
        success: function(data){
            $('#tree1').tree({
                data: data.data,

                    onCreateLi: function (node, $li) {
                        if(node.getLevel() == 2){
                            var address = "/project-kvartiri/web/app_dev.php/city/";
                            var $link = $('<a href="'+ address + node.id +'"></a>');
                            $li.find('.jqtree-title').wrap($link);
                        }

                    }

                //var $link = $('<a href="' + node.url + '"></a>');

                //onCreateLi: function(node, $li) {
                //    $li.find('.jqtree-title').append('<a href="/project-kvartiri/web/app_dev.php/page/1"></a>');
                //    $li.find('.jqtree-title').attr('id',node.id);
                //    console.info(node);
                //}


            });
            $(".loading").remove();

            // bind 'tree.click' event
            //$('#tree1').bind(
            //    'tree.click',
            //    function(event) {
            //        // The clicked node is 'event.node'
            //        var node = event.node;
            //        var idRegion = node.id;
            //        var levelRegion = node.getLevel();
            //        if(node.getLevel() == 2) {
            //            //alert(levelRegion);
            //            $('div.jqtree-element').parent().html('<a href="/project-kvartiri/web/app_dev.php/page/1"></a>');
            //        }
            //    }
            //)

        }

    });

//start plugin

    //var nowTemp = new Date();
    //var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
    //
    //var checkin = $('.dpd1').datepicker({
    //    onRender: function(date) {
    //        return date.valueOf() < now.valueOf() ? 'disabled' : '';
    //    }
    //}).on('changeDate', function(ev) {
    //
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
    //        if ($(this).val().length === 10 && isNaN(timestamp1) == false && isNaN(timestamp2) == false) {
    //            if(showDays(startDate, endDate) > -1){
    //                $(".nights").val(showDays(startDate, endDate));
    //            }
    //        }else{
    //            $(".nights").val('');
    //        }
    //        $(".nights").prop('disabled', true);
    //
    //        //ajax
    //        $.ajax({
    //            type: 'get',
    //            url: '/project-kvartiri/web/app_dev.php/season/' + $('#idHotel').val(),
    //            beforeSend: function() {
    //                if ($(".loading").length == 0) {
    //                    $("form .seasonMessage").parent().append('<div class="loading"></div>');
    //                }
    //            },
    //            success: function(data) {
    //                $(".seasonMessage").val(data.seasonMessage);
    //                $(".loading").remove();
    //            }
    //        });
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

//end plugin

});








