
/*-------------------------------------------------------------------------*/

$(function () {
        var payment=[];
        var month=[];
        var def_month=['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
        var data= (Session.get('user_pay'))?Session.get('user_pay'):'';
        for (var i = 0; i < data.length; i++) {
            payment.push(parseInt(data[i].user_count));
            month.push(def_month[parseInt(data[i].tran_date)-1]);
        }
        Session.unset('user_pay')
    $('#users_pay').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Users Pay'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            categories:month,
            plotBands: [{ // visualize the weekend
                from: 4.5,
                to: 6.5,
                //color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'number'
            }
        },
        tooltip: {
            shared: true
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Users pay',
            data: payment,
           }]
    });
});
/*-------------------------------------------------------------------------*/

$(function () {
    var payment=[];
    var month=[];
    var def_month=['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
    var data= (Session.get('receive'))?Session.get('receive'):'';
    for (var i = 0; i < data.length; i++) {
        payment.push(parseInt(data[i].receive_count));
        month.push(def_month[parseInt(data[i].tran_date)-1]);
    }
    Session.unset('receive');
    $('#payment_receive').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text:(Session.get('is_admin'))?'Payment Receive':'Amount paid'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            categories: month,
            plotBands: [{ // visualize the weekend
                from: 4.5,
                to: 6.5,
                //color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'Amount'
            }
        },
        tooltip: {
            shared: true
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: (Session.get('is_admin'))?'Received payment':'Amount paid',
            data:payment,
           }]
    });
});
/*-------------------------------------------------------------------------*/


$(function () {

    var user_pay=[];
    var user_not_pay=[];
    var month=[];
    var counter=Session.get('counter')?Session.get('counter'):'';
    var def_month=['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
    var data= (Session.get('a_payment_trend'))?Session.get('a_payment_trend'):'';
    for (var i = 0; i < data.length; i++) {
        user_pay.push( Math.round((parseInt(data[i].user_count) /parseInt(counter.users) ) * 100) );
        user_not_pay.push( Math.round(( (parseInt(counter.users)-parseInt(data[i].user_count)) / parseInt(counter.users)  ) * 100) );
        month.push(def_month[parseInt(data[i].tran_date)-1]);
    }
    // console.log(user_pay);
    Session.unset('a_payment_trend');

    $('#payment_trend').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Payment Trend in a Year'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            categories:month,
            plotBands: [{ // visualize the weekend
                from: 4.5,
                to: 6.5,
                //color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'Percentage'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' %'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Trend of debt',
            data: user_not_pay,
           },{
            name: 'Payment',
            data: user_pay,
           }]
    });
});
/*-----------------------------------------------------------------------------------*/
$(function () {
    var user_pay=[];
    var user_not_pay=[];
    var month=[];
    var counter=Session.get('counter')?Session.get('counter'):'';
    var def_month=['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
    var data= (Session.get('a_user_pay'))?Session.get('a_user_pay'):'';
    for (var i = 0; i < data.length; i++) {
        user_pay.push(parseInt(data[i].user_count));
        user_not_pay.push(parseInt(counter.users)-parseInt(data[i].user_count));
        month.push(def_month[parseInt(data[i].tran_date)-1]);
    }
    Session.unset('a_user_pay');
    $('#users_bar').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Graph of payees and non payees'
        },
        xAxis: {
            categories: month ,
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Percentage of PNP Alumni'
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percent'
            }
        },
        series: [{
            name: 'users who did not  pay',
            data:user_not_pay
        }, {
            name: 'users who pay',
            data:user_pay
        }]
    });
});
/*-----------------------------------------------------------------------------------*/
$(function () {

     var def_month=['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];

     var def_data=   [{ name:' Batch 2012 ' , data:[ 0,0,0,0,0,0,0,0,0,0,0,0 ] },
                      { name:' Batch 2013 ' , data:[ 0,0,0,0,0,0,0,0,0,0,0,0 ] },
                      { name:' Batch 2014 ' , data:[ 0,0,0,0,0,0,0,0,0,0,0,0 ] },
                      { name:' Batch 2015 ' , data:[ 0,0,0,0,0,0,0,0,0,0,0,0 ] },
                      { name:' Batch 2016 ' , data:[ 0,0,0,0,0,0,0,0,0,0,0,0 ] }
                      ];
     var  def_batches={2012:0,2013:1,2014:2,2015:3,2016:4};

     var data=Session.get('batch_percentage')?Session.get('batch_percentage'):'';

     for (var i = 0; i < data.length; i++) {
         def_data[def_batches[ data[i].batch ]].data[ parseInt( data[i].tran_date)-1 ] += 1;
     };

    Session.unset('batch_percentage');

    $('#users_percentage_bar').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: "Payment's Percentage per Batch"
        },
        xAxis: {
            categories: def_month ,
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Percentage of PNP Alumni'
            }
        },
        tooltip: {
            pointFormat: '<span style="color:{series.color}">{series.name}</span>: <b>{point.y}</b> ({point.percentage:.0f}%)<br/>',
            shared: true
        },
        plotOptions: {
            column: {
                stacking: 'percent'
            }
        },
        series:def_data
    });
});
/*------------------------------------------------------------------------------------*/
$(function () {

    $(document).ready(function () {
          // console.log(Session.get('batches'));
        // Build the chart
            var batch=[];
            var data= (Session.get('batches'))?Session.get('batches'):'';
            for (var i = 0; i < data.length; i++) {
                 if(data[i].batch != 2012){
                       batch.push({
                            name: 'Batch '+data[i].batch,
                            y:parseInt( data[i].batch_count)
                        });
                  }else{
                    batch.push({
                            name:'Batch '+data[i].batch,
                            y: parseInt(data[i].batch_count) ,
                            sliced: true,
                            selected: true
                        });
                  }
            }
           Session.unset('batches');
          $('#pnpaa_members').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'PNPAA members'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'batch percentage',
                data:batch

            }]
        });
    });

});

/*--------------------------------------------------------------------------------*/
$(function () {

    $(document).ready(function () {

            var committee=[];
            var data= (Session.get('committee'))?Session.get('committee'):'';
           // console.log(Session.get('committee'));
            for (var i = 0; i < data.length; i++) {
                 if(data[i].committee != 'Information'){
                       committee.push({
                            name: data[i].committee+ ' committee',
                            y: parseInt(data[i].committee_count)
                        });
                  }else{
                    committee.push({
                            name:data[i].committee + ' committee',
                            y: parseInt(data[i].committee_count) ,
                            sliced: true,
                            selected: true
                        });
                  }
            }
           // console.log(committee);
           Session.unset('committee');

        // Build the chart
        $('#committee').highcharts({
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: 'PNPAA committees'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: 'batch percentage',
                data:committee

            }]
        });
    });

});
/*-----------------------------------------------------------------------------------*/
/*-------------------------------------------------------------------------*/


$(function () {

    var user_pay=[];
    var user_not_pay=[];
    var month=[];
    var counter=Session.get('counter')?Session.get('counter'):'';
    var def_month=['jan','feb','mar','apr','may','jun','jul','aug','sep','oct','nov','dec'];
    var data= (Session.get('a_payment_trend'))?Session.get('a_payment_trend'):'';
    for (var i = 0; i < data.length; i++) {
        user_pay.push( Math.round((parseInt(data[i].user_count) /parseInt(counter.users) ) * 100) );
        user_not_pay.push( Math.round(( (parseInt(counter.users)-parseInt(data[i].user_count)) / parseInt(counter.users)  ) * 100) );
        month.push(def_month[parseInt(data[i].tran_date)-1]);
    }
    // console.log(user_pay);
    Session.unset('a_payment_trend');

    $('#dropoffs_percentage_bar').highcharts({
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Drop Offs Trend in a Year'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: (Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'
        },
        xAxis: {
            categories:month,
            plotBands: [{ // visualize the weekend
                from: 4.5,
                to: 6.5,
                //color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'Percentage'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' %'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Trend of debt',
            data: [1,2,3,2,4,5,1,4,5,6,7,7],
           },{
            name: 'Payment',
            data: [1,2,2,1,2,2,2,5,6,7,5,4],
           }]
    });
});
/*-----------------------------------------------------------------------------------*/
