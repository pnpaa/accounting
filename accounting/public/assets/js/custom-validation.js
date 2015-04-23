

        $("#create-bulk-user").validate({

        errorElement: "span",
        rules: {
            users_num: {
                required: true,
                number:true,
                isPositive:true
            },
            users_role: {
                required: true
            },
            users_committee:{
                required: true
            },
            users_batch:{
                required:true
            }


        },
        errorPlacement: function (error, element) {
            element.parent('div').addClass('has-error');
            error.insertAfter(element);
            element.next('span').addClass('help-block');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("has-error");
        },
        highlight: function (element) {
            $(element).parent().addClass("has-error");
        },
        messages: {
            re_password: {
                equalTo: "Please enter the same password again."
            }

        }

    });



        $("#change-password-form").validate({

        errorElement: "span",
        rules: {
            current_password: {
                required: true,
                isCurrent:true
            },
            new_password: {
                required: true,

            },
            re_password:{
                required: true,
                equalTo:'#new_password'
            }

        },
        errorPlacement: function (error, element) {
            element.parent('div').addClass('has-error');
            error.insertAfter(element);
            element.next('span').addClass('help-block');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("has-error");
        },
        highlight: function (element) {
            $(element).parent().addClass("has-error");
        },
        messages: {
            re_password: {
                equalTo: "Please enter the same password again."
            }

        }

    });

     $.validator.addMethod("isCurrent",
        function(value, element) {
               var valid =false;
                 $.ajax({
                     url: "../compare-password",
                     method: 'post',
                     data:{
                        _token:$('input[name=_token]').val(),
                        password:$('input[name=current_password]').val()
                    },
                     success: function(data) {
                             console.log(data.success);
                             if (data.success) {
                                 $('input[name=current_password]').parent('div').removeClass('has-error');
                                 $('input[name=current_password]').closest('span').remove();
                                 $('input[name=current_password]').removeProp('required');
                             }else{
                                 $('input[name=current_password]').parent('div').addClass('has-error');
                             }

                     }
                 });

                 return (  $('input[name=current_password]').parent('div').hasClass('has-error'))?false:true;

        },
        "Incorrect Password."
     );
    $.validator.addMethod("isPositive",
        function(value,element){
           return parseInt(value) > 0 ?true:false;
        },'It must be greater than 0'
    );

     $("#pay,#edit_settings_form").validate({

        errorElement: "span",
        rules: {
            m_purpose:{
                required: true
            },
            transaction_purpose: {
                required: true
            },
            m_amount: {
                required: true,
                number:true,
                greaterThanMCurrent:true
            },
            transaction_amount: {
                required: true,
                number:true,
                greaterThanCurrent:true
            },
            transaction_date:{
                required: true
            }

        },
        errorPlacement: function (error, element) {
            element.parent('div').addClass('has-error');
            error.insertAfter(element);
            element.next('span').addClass('help-block');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("has-error");
        },
        highlight: function (element) {
            $(element).parent().addClass("has-error");
        },
        messages: {
            transaction_amount:{

            }

        }

    });


     $("#add_settings").validate({

        errorElement: "span",
        rules: {
            transaction_amount: {
                required: true,
                number:true
            },
            transaction_purpose: {
                required: true,
            }

        },
        errorPlacement: function (error, element) {
            element.parent('div').addClass('has-error');
            error.insertAfter(element);
            element.next('span').addClass('help-block');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("has-error");
        },
        highlight: function (element) {
            $(element).parent().addClass("has-error");
        }

    });

    $("#replyForm").validate({

        errorElement: "span",
        rules: {
            subject: {
                required: true,
            },
            message: {
                required: true,
            }

        },
        errorPlacement: function (error, element) {
            element.parent('div').addClass('has-error');
            error.insertAfter(element);
            element.next('span').addClass('help-block');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("has-error");
        },
        highlight: function (element) {
            $(element).parent().addClass("has-error");
        }

    });



     $.validator.addMethod("greaterThanCurrent",
        function(value, element) {
               var valid =false;
               var def_val=parseInt(Session.get('current_amount'))-1;
               return (def_val < value)?true:false;
        },

          "Please input exact or higher than the amount set."
     );
     $.validator.addMethod("greaterThanMCurrent",
        function(value, element) {
               var valid =false;
               var def_val=parseInt(Session.get('m_current_amount'))-1;
               return (def_val < value)?true:false;
        },

         "Please input exact or higher than the amount set."
     );



 $("#add-new-task").validate({

        errorElement: "span",
        rules: {
            new_task_name: {
                required: true,
            },
            new_task_desc: {
                required: true,
            },
            user_id:{
                required:true
            },
            due_date:{
                required:true,
                validDate:true
            },
            task_group:{
                required:true
            }


        },
        errorPlacement: function (error, element) {
            element.parent('div').addClass('has-error');
            error.insertAfter(element);
            element.next('span').addClass('help-block');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("has-error");
        },
        highlight: function (element) {
            $(element).parent().addClass("has-error");
        }

    });
    $(".add-committee").validate({

        errorElement: "span",
        rules: {
            committee_title: {
                required: true,
                minlength:3
            },
            committee_content: {
                required: true,
                minlength:3

            }


        },
        errorPlacement: function (error, element) {
            element.parent('div').addClass('has-error');
            error.insertAfter(element);
            element.next('span').addClass('help-block');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("has-error");
        },
        highlight: function (element) {
            $(element).parent().addClass("has-error");
        }

    });
 $("#task_view").validate({

        errorElement: "span",
        rules: {
            m_task_title: {
                required: true,
            },
            m_task_content: {
                required: true,
            },
            m_task_assign:{
                required:true
            },
            m_task_group:{
                required:true
            },
            m_task_due:{
                required:true
            }


        },
        errorPlacement: function (error, element) {
            element.parent('div').addClass('has-error');
            error.insertAfter(element);
            element.next('span').addClass('help-block');
        },
        unhighlight: function (element) {
            $(element).parent().removeClass("has-error");
        },
        highlight: function (element) {
            $(element).parent().addClass("has-error");
        }

    });

    $.validator.addMethod("validDate",
        function(value, element) {
           var date1=new Date(value);
           var date2=new Date();
           if(date1 > date2 )return true;
        },
        "Invalid Date."
     );