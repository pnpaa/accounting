'use strict';
/* Controllers */
var testApp=angular.module('testApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
});
testApp.controller('testCtrl',  function ($scope) {
  $scope.answer=0;
  $scope.add=function(a,b) {
      $scope.answer= parseInt(a) + parseInt(b);
  }
  $scope.minus=function(a,b) {
      $scope.answer= parseInt(a) -  parseInt(b);
  }
  $scope.users=12345;

});

/*---------------------------------------------------------------------------------------*/
var pageApp=angular.module('pageApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
});

pageApp.controller('taskController',  function ($scope) {
  $scope.tasks=Session.get('tasks');
  Session.unset('tasks');
});

pageApp.controller('activityController',  function ($scope) {
   $scope.updates=Session.get('updates');
   Session.unset('updates');
});
pageApp.controller('counterController',  function ($scope) {
   $scope.counter=Session.get('counter');
});

/*---------------------------------------------------------------------------------------*/
var paymentApp=angular.module('paymentApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
});

paymentApp.controller('paymentController',  function ($scope) {
      // console.log(Session.get('transactions'));
    $scope.transactions=Session.get('transactions');

    $scope.updateAmount=function() {
       $scope.tran_id=$('select[name=transaction_purpose]').val();
       for (var i = 0; i < $scope.transactions.length; i++) {
          if($scope.transactions[i].id == $scope.tran_id){
             $scope.amount=$scope.transactions[i].transaction_amount;
             Session.set('current_amount',$scope.amount);
          }
      };
    }
});

/*---------------------------------------------------------------------------------------*/
var settingsApp=angular.module('settingsApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
});

settingsApp.controller('settingsController',  function ($scope) {
     $scope.edit=function(id){
       console.log($('.p-'+id).text());
        $scope.purpose=$('.p-'+id).text();
        $scope.amount =$('.a-'+id).text();
        $scope.id=id;
        Session.set('m_current_amount', $scope.amount);
        $('#editModal').modal('show');
     }
     $scope.save=function(){
        $scope.p=$('textarea[name=m_purpose]').val();
        $scope.a=$('input[name=m_amount]').val();
        saveSettings($scope.id,$scope.p,$scope.a);
        $('.p-'+$scope.id).text($scope.p);
        $('.a-'+$scope.id).text($scope.a);
        $('#editModal').modal('hide');
     }
     $scope.delete=function(id){
        $scope.id=id;
        $('#deleteModal').modal('show');
     }
     $scope.destroy=function(){
        destroySettings($scope.id);
        $('.r-'+$scope.id).remove();
        $('#deleteModal').modal('hide');
     }

});

/*---------------------------------------------------------------------------------------*/
var frontApp=angular.module('frontApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
});

frontApp.controller('frontController',  function ($scope) {
 $scope.send=function(data){

    if($scope.validate(['name','email','subject'],true) && $scope.validate(['message'],false) ){
       $.ajax({
         url: 'contactUs',
         type: 'POST',
         data: {
          name:$('input[name=name]').val(),
          email:$('input[name=email]').val(),
          subject:$('input[name=subject]').val(),
          message:$('textarea[name=message]').val(),
          _token:$('input[name=_token]').val()
         },
         success:function(data){
           console.log(data);
           $('div.form-success').show();
         }
       });
    }

 }
 $scope.validate=function(data,isInputText) {
    var valid=true;
    var el='input';
    if(!isInputText)el='textarea';
      for (var i = 0; i < data.length; i++) {
          if( ($(el+'[name='+data[i]+']').val()).length < 3 ){
                 $(el+'[name='+data[i]+']').addClass('hightlight');
                 valid=false ;
                 break;
            }
      };

   return valid;
 }


});

/*---------------------------------------------------------------------------------------*/
var inquiryApp=angular.module('inquiryApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
});

inquiryApp.controller('inquiryController',  function ($scope) {
       $scope.data={name:'',subject:'',email:'',message:'',id:0}

       $scope.view=function(id){
           $scope.set(id);
           $('div.index').is(":visible")?$('div.index').fadeOut('slow').addClass('hidden'):'';
           $('div.delete').is(":visible")?$('div.delete').fadeOut('slow').addClass('hidden'):'';
           $('div.view').fadeIn('slow').removeClass('hidden');
            $('.key').each(function(index, el) {
             if ( (($(this).data('email')).trim() ).localeCompare(($scope.data.email).trim() ) != 0 ) {
              // if ( ('asas@asas.com').localeCompare('asas@asas.com') != 0 ) {
                  console.log('hide me');
                  $(this).addClass('hidden');
              }else{
                  $(this).removeClass('hidden');
                }
           });
       }
       $scope.index=function(){
           $('div.view').is(":visible")?$('div.view').fadeOut('slow').addClass('hidden'):'';
           $('div.delete').is(":visible")?$('div.delete').fadeOut('slow').addClass('hidden'):'';
           $('div.index').fadeIn('slow').removeClass('hidden');
       }
       $scope.delete=function(id){
           $scope.set(id);
           $('div.index').is(":visible")?$('div.index').fadeOut('slow').addClass('hidden'):'';
           $('div.view').is(":visible")?$('div.view').fadeOut('slow').addClass('hidden'):'';
           $('div.delete').fadeIn('slow').removeClass('hidden');
       }
       $scope.reply=function(){
           if($scope.validate(['subject'],true) && $scope.validate(['message'],false)){
                 $.ajax({
                   url: 'reply',
                   type: 'POST',
                   data: {
                     subject:$('input[name=subject]').val(),
                     message:$('textarea[name=message]').val(),
                     name:  $scope.data.name,
                     email:  $scope.data.email,
                     _token: $('input[name=_token]').val()
                   },
                   success:function(data){
                       location.reload();

                     $scope.index();
                   }
                 });

           }
       }
       $scope.destroy=function(id){
          $.ajax({
            url: 'notifications/'+id,
            type: 'PUT',
            data:{id:id,archived:true},
            success:function(data){
                    $scope.index();
             }
          });
       }
       $scope.set=function(id){
           $scope.data.id=id;
           $scope.data.name=$('td.n-'+id).text();
           $scope.data.subject=$('td.s-'+id).text();
           $scope.data.email=$('td.e-'+id).text();
           $scope.data.message=$('td.m-'+id).text();
       }
       $scope.validate=function(data,isInputText) {
        var valid=true;
        var el='input';
        if(!isInputText)el='textarea';
          for (var i = 0; i < data.length; i++) {
              if( ($(el+'[name='+data[i]+']').val()).length < 3 ){
                     // $(el+'[name='+data[i]+']').parent('div').addClass('has-error');
                     valid=false ;
                     break;
                }
          };

       return valid;
     }
});

     /*---------------------------------------*/

     var updateApp=angular.module('updateApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
      });
      updateApp.controller('categoryController',  function ($scope) {

        $scope.id=0;
        $scope.category_color='#fff';
        $scope.category_name='';
        $scope.edit=function(id) {
            $scope.set(id);
            $('#category_add').addClass('hidden');
            $('#category_edit').removeClass('hidden');
        }

        $scope.set=function(id){
            $scope.id=id;
            console.log($('#category_edit').attr('action'));
            $scope.category_color=$('div.update-category[data-id="'+$scope.id+'"]').data('color');
            $scope.category_name=$('div.update-category[data-id="'+$scope.id+'"]').data('name');
        }

      });

           /*---------------------------------------*/

     var timeLineApp=angular.module('timeLineApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
      });
      timeLineApp.controller('timeLineController',  function ($scope) {
        $scope.base_limit=5;
        $scope.limit =5;
        $scope.counter =0;

        $scope.loadMore=function(){
              $scope.limit+= $scope.base_limit;
              $('.loader-con img').removeClass('hidden');
              $('.loader-con button').addClass('hidden');
              $.wait( function(){
                 $scope.loop();
                 $('.loader-con button').removeClass('hidden');
                 $('.loader-con img').addClass('hidden');
               },1);
              if(parseInt($scope.limit) >= parseInt(count))$('.loader-con button').remove();
        }
         $scope.loop=function(){

              $("li.jscroll").each(function( index ) {

                if (parseInt($(this).data('limit')) <= $scope.limit ) {
                  $scope.counter++;
                  $(this).removeClass('hidden');
                  (parseInt($(this).data('limit')) == $scope.limit)? $(this).addClass('timeline-noline'):$(this).removeClass('timeline-noline');
                  $('ul.timeline li:last-child').addClass('timeline-noline');
                 }
                 if ($scope.counter  >= parseInt(count)  ){
                  $('.loader').addClass('hidden');
                 }
               });
          }
          $.wait = function( callback, seconds){
              return window.setTimeout( callback, seconds * 1000 );
          }

      });

           /*---------------------------------------*/
     var usersListApp=angular.module('usersListApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
      });
      usersListApp.controller('usersListController',  function ($scope) {
        $scope.base_limit=5;
        $scope.limit =5;
        $scope.counter =0;

        $scope.loadMore=function(){
              $scope.limit+= $scope.base_limit;
              $('.users-loader-con img').removeClass('hidden');
              $('.users-loader-con button').addClass('hidden');
              $.wait( function(){
                 $scope.loop();
                 $('.users-loader-con button').removeClass('hidden');
                 $('.users-loader-con img').addClass('hidden');
               },1);
              if(parseInt($scope.limit) >= parseInt(count))$('.users-loader-con button').remove();
        }
         $scope.loop=function(){

              $("li.jscroll").each(function( index ) {
                if (parseInt($(this).data('limit')) <= $scope.limit ) {
                  $scope.counter++;
                  $(this).removeClass('hidden');
                  }
                 if ($scope.counter  >= parseInt(count)  ){
                  $('.loader').addClass('hidden');
                 }
               });
          }
          $.wait = function( callback, seconds){
              return window.setTimeout( callback, seconds * 1000 );
          }

      });

          /*---------------------------------------*/
      var mailApp=angular.module('mailApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
      });
      mailApp.controller('mailAppController',  function ($scope,$location) {
         $scope.viewMessage=function(id){
           window.location.href=$('input[name=base_url]').val()+'/mail/'+id;
         }


      });
  /*---------------------------------------*/
      var taskApp=angular.module('taskApp',[],function($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
      });
      taskApp.controller('taskAppController',  function ($scope,$location) {
        $scope.id=0;
        $scope.task_group= '';
        $scope.task_title= '';
        $scope.task_content= '';
        $scope.task_assign= '';
        $scope.task_due= '';
      $scope.updateModal=function(id ){
        //{{$task->id}},title,content,due,group,assign
        console.log(parseInt(id));
        $scope.id=parseInt(id);
        $scope.task_title= $('#to-do-title-'+parseInt(id)).val();
        $scope.task_content= $('#to-do-content-'+parseInt(id)).val();
        $scope.task_due= $('#to-do-due-'+parseInt(id)).val();
        $scope.task_group= $('#to-do-group-'+parseInt(id)).val();
        $scope.task_assign= $('#to-do-assign-'+parseInt(id)).val();
         $('#myModal').modal('show');
      }


      });

/*--------------------------------------------*/
