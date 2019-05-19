$(function() {
    //  morris Area chart on dashboard///

    Morris.Area({
        element: 'morris-area-chart',
        data: [{
            period: '2018-04-1',
            IOS: 2778,
            Android: 2294
        }, {
            period: '2018-05-1',
            IOS: 4912,
            Android: 1969
        }, {
            period: '2018-06-1',
            IOS: 3767,
            Android: 3597
        }, {
            period: '2018-07-1',
            IOS: 6810,
            Android: 1914
        }, {
            period: '2018-08-1',
            IOS: 5670,
            Android: 4293
        }, {
            period: '2018-09-1',
            IOS: 4820,
            Android: 3795
        }, {
            period: '2018-10-1',
            IOS: 15073,
            Android: 5967
        }, {
            period: '2018-11-1',
            IOS: 10687,
            Android: 4460
        }, {
            period: '2018-12-1',
            IOS: 8432,
            Android: 5713
        }],
        xkey: 'period',
        ykeys: ['IOS', 'Android'],
        labels: ['IOS', 'Android'],
        pointSize: 2,
        hideHover: 'auto',
        resize: true
    });


});

