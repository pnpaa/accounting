$(function(){

    var tasks = function(){
        $('#add-new-task').submit(function(event) {

            var nt_name = $("input[name=new_task_name]").val();
            var nt_desc= $("#new_task_desc").val();
            var assign_to =$('select[name=user_id]').val() != undefined?$('select[name=user_id]').val():$('input[name=user_id]').val();
            var due_date=$('input[name=due_date]').val();
            var task_group=$('select[name=task_group]').val();

            var date1=new Date(due_date);
            var date2=new Date();


            if(nt_name != '' && date1 > date2){

                $.ajax({
                    url: 'tasks',
                    method: 'POST',
                    data: {
                        task_title: nt_name,
                        task_content: nt_desc,
                        task_assign: assign_to,
                        task_due: due_date,
                        task_group: task_group,
                        _token:$('input[name=_token]').val()
                    },
                    success:function(data){
                         console.log(data.data.task_due.date);
                          var task = '<div class="task-item '+data.data.task_group+'" data-group="'+data.data.task_group+'"  data-id="'+data.data.id+'" >'
                                +'<div class="task-name"><h3>'+data.data.task_title+'</h3></div>'
                                +'<div class="task-content"><p>'+data.data.task_content+'</p></div>'
                                +'<h4 class="pull-right task-assign"><span class="label label-primary" data-user="'+assign_to+'">'+data.data.task_assign+'</span></h4>'
                                +'<div class="task-footer">'
                                    +'<div class="pull-left task-due" data-date="'+due_date+'" ><span class="fa fa-clock-o"></span> '+data.data.task_due.date+'</div>'
                                +'</div>'
                            +'</div>';
                            $("#tasks").prepend(task);
                    }
                });
             }
        });


        $("#tasks,#tasks_progreess,#tasks_completed").sortable({
            items: "> .task-item",
            connectWith: "#tasks_progreess,#tasks_completed",
            handle: ".task-content,.task-title",
            receive: function(event, ui) {
                if(this.id == "tasks_completed"){
                    // ui.item.addClass("task-complete").find(".task-footer > .pull-right").remove();
                 updateStatus( ui.item.data('id'),2);

                }
                if(this.id == "tasks_progreess"){
                    // ui.item.find(".task-footer").append('<div class="pull-right"><span class="fa fa-play"></span> 00:00</div>');
                 updateStatus( ui.item.data('id'),1);
                }
                page_content_onresize();
            }
        }).disableSelection();
    }();
});
$(document).ready(function() {
   // $('.task-item').click(function(event) {
   //      var id=$(this).data('id');
   //      var task_group=$(this).data('group');
   //      var task_title=$(this).find('h3').text();
   //      var task_content=$(this).find('p').text();
   //      var task_assign=$(this).find('span').data('user');
   //      var task_due=$(this).find('div.task-due').data('date');
   //       $('#myModal').modal('show');
   //       $('#task_view').find('input[name=m_id]').val(id);
   //       $('#task_view').find('input[name=m_task_title]').val(task_title);
   //       $('#task_view').find('textarea[name=m_task_content]').val(task_content);
   //       $('#task_view').find('input[name=m_task_due]').val(task_due);
   //       $('#task_view').find('select[name=m_task_group]').find('option[value="'+task_group+'"]').attr('selected',true);
   //       $('#task_view').find('select[name=m_task_assign]').find('option[value="'+task_assign+'"]').attr('selected',true);
   // });


});
function updateStatus(id,val){
    console.log(id);
    console.log(val);
    $.ajax({
        url:'tasks/0',
        method:'put',
        data:{
            id:id,
            status:val,
            status_update:true
        },
        success:function(data){
            console.log(data);
        }
    });
}