
/*
 Template Name: Lexa - Responsive Bootstrap 4 Admin Dashboard
 Author: Themesbrand
 File: Dashboard init js
 */
var $donutData = [];

var $stckedData = [];

var $stackedDataCars = [];

!function($) {
    "use strict";

    var Dashboard = function() {};

    console.log(window.location.href);


    //creates area chart
    Dashboard.prototype.createAreaChart = function (element, pointSize, lineWidth, data, xkey, ykeys, labels, lineColors) {
        Morris.Area({
            element: element,
            pointSize: 0,
            lineWidth: 1,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            labels: labels,
            resize: false,
            gridLineColor: '#eee',
            hideHover: 'auto',
            lineColors: lineColors,
            fillOpacity: .9,
            behaveLikeLine: true
        });
    },

    //creates Donut chart
    Dashboard.prototype.createDonutChart = function (element, data, colors) {
        Morris.Donut({
            element: element,
            data: data,
            resize: true,
            colors: colors
        });
    },

    //creates Stacked chart
    Dashboard.prototype.createStackedChart  = function(element, data, xkey, ykeys, labels, lineColors) {
        Morris.Bar({
            element: element,
            data: data,
            xkey: xkey,
            ykeys: ykeys,
            stacked: true,
            labels: labels,
            hideHover: false,
            resize: true, //defaulted to true
            gridLineColor: '#eee',
            barColors: lineColors
        });
    },

    $('#sparkline').sparkline([8, 6, 4, 7, 10, 12, 7, 4, 9, 12, 13, 11, 12], {
        type: 'bar',
        height: '134',
        barWidth: '10',
        barSpacing: '7',
        barColor: '#ec536c'
    });


    Dashboard.prototype.init = function() {

        //creating area chart
        var $areaData = [
            {y: '2011', a:0},
            {y: '2012', a:15},
            {y: '2013', a:195},
            {y: '2014', a:21},
            {y: '2015', a:360},
            {y: '2016', a:120},
            {y: '2017', a:345},
            {y: '2018', a:390},
            {y: '2019', a:224},
            {y: '2020', a:297},
        ];
        this.createAreaChart('morris-area-example', 0, 0, $areaData, 'y', ['a'], ['Objednávky'], ['#ec536c']);

        //creating donut chart
        (function (){
            getDonutData();
        })();

        // let donut = $donutData;

        console.log('Po: ', $donutData);
        this.createDonutChart('morris-donut-example', $donutData, ['#f0f1f4', '#ec536c', '#fab249', '#A1DB94', '#9FC6DF']);

        (function (){
            getBestDrivers();
        })();

        this.createStackedChart('morris-bar-stacked', $stckedData, 'y', ['a'], ['Peniaze'], ['#ACD581']);
        //morris-bar-stacked2

        (function (){
            getUsedCarsAJAX();
        })();

        this.createStackedChart('morris-bar-stacked2', $stackedDataCars, 'y', ['a'], ['Použité'], ['#7D93D4']);

    },
    //init
    $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
}(window.jQuery),

//initializing
function($) {
    "use strict";
    $.Dashboard.init();
}(window.jQuery);

function getUsedCarsAJAX() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        async: false,
        url: (window.location.href + '/get-most-used-cars'),
        success:function(data) {
            getUsedCars(data);
        },
        error:function(data) {
            console.log(data);
        }
    });

}

function getUsedCars(data) {

    console.log(data);
    let cars = data['cars'];
    cars.forEach(function (item) {
        let obj = {y: item['Car'], a: item['Amount']};
        $stackedDataCars.push(obj);
    })
}



// DRIVERS AJAX *******************************************
function getBestDrivers() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $.ajax({
        type:'POST',
        async: false,
        url: (window.location.href + '/get-best-drivers'),
        success:function(data) {
            fillOtherGraph(data);
        },
        error:function(data) {
            console.log(data);
        }
    });


}

function fillOtherGraph(data) {
    let drivers = data['drivers'];
    drivers.forEach(function (item) {
        let obj = {y: item['Name'], a: item['Summary']};
        $stckedData.push(obj);
    })
}
// *******************************************


// DONUT *********************
function getDonutData() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type:'POST',
        async: false,
        url: (window.location.href + '/get-donut-data'),
        success:function(data) {
            fillDonutWithData(data);
        },
        error:function(data) {
            console.log(data);
        }
    });
}

function fillDonutWithData(data) {
    let drives = data['drives'];

    drives.forEach(function (item) {
        let obj = {label: item['Place'], value: item['Amount']};
        $donutData.push(obj);
    });

}
// **********************************************************
