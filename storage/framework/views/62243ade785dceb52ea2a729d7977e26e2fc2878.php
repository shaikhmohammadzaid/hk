
<script>
  showDetails();

 
$(document).on('click','.btn-refresh',function(e){
 e.preventDefault(); 
 window.location.href = "<?php echo e(url('/admin/admin-dtaskmanager')); ?>";
});

  function showDetails(){
      var data = $('#frm-c').serialize();
        $.get("<?php echo e(route('showdTaskRequest')); ?>",data,function(data){
          $('#InfoTable').empty().append(data);
      });
  }

   $(document).on('submit','#frm-search',function(e){
    e.preventDefault();
    var _token = $("input[name='_token']").val();
        
      var title =$('#title').val();
      var status =$('#status').val();
      var start =$('#start').val();
      var end =$('#end').val();

     $.get("<?php echo e(route('searchdTaskRequest')); ?>",{title:title,status:status,start:start,end:end,_token:_token},function(data){
      
        console.log(data);
          $('#InfoTable').empty().append(data);
    })
      
  });

    // Pagination on role details.
  $(document).on("click",".pagination li a",function(e){
    e.preventDefault(); 
    var data = $('#frm-c').serialize();
    var url = $(this).attr("href");
    $.get(url,data,function(data){
         
        $('#InfoTable').empty().append(data);
    });
  });


   function editTaskManager(task_id,pm_id,title,description,assign_date,start_time,end_time) 
          {  
               $('#edit_task_id').val(task_id);
                $('#edit_pm_id').val(pm_id);
                    $('#edit_title').val(title);
                    $('#edit_description').val(description);
                    $('#edit_date').val(assign_date);
                    $('#edit_start_time').val(start_time);
                    $('#edit_end_time').val(end_time);
                   
                    $('#edit_task_assign_model').modal('show');

      
          }
    $(document).ready(function() {
       
   
      $(document).on('click','#task_assign',function(){
      
          $('#add_task_assign_model').modal('show');
      });

     //task assiend 
      $(document).on('submit','#frm-assign',function(e){
           e.preventDefault();
          var data = $(this).serialize();
          alert('hii');
        
           $.get("<?php echo e(route('add_dtask_assign')); ?>",data,function(data){
                           
                         if(data == 'success'){
                               /* window.location.href = "<?php echo e(url('/admin/admin-dtaskmanager')); ?>";*/

                                location.reload(true);
                               
                          }


            });
  
            $("#frm-assign").trigger('reset');
      });
      
      $(document).on('click','#btn-delete',function(e){
           e.preventDefault();
           swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this record!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
               if (willDelete) 
               {
                 //sweet alert
                  var task_id = $(this).data('task-id');
                  $.get("<?php echo e(route('deleteAssignTask')); ?>",{task_id:task_id,},function(data){

                       });

                 //end sweet alert 
                }
                 else
                  {
                swal("Your record is safe!");
                  }   
              });

         

      });

       $(document).on('click','.edit',function(){
           
          editTaskManager(task_id,pm_id,title,description,assign_date,start_time,end_time);

      });

        //task assiend 
      $(document).on('submit','#frm-update-assign',function(e){
           e.preventDefault();
          var data = $('#frm-update-assign').serialize();
          
           $.get("<?php echo e(route('updatedAssignTask')); ?>",data,function(data){
                           
                       
                            
                                window.location.href = "<?php echo e(url('/admin/admin-taskmanager')); ?>";
                               
                        
            });
      });
     
    
    });
   </script>
<script src="<?php echo e(asset('public/admin/dist/js/sweetalert.min.js')); ?>"></script>
<!-- This is data table -->
<script src="<?php echo e(asset('public/admin/assets/extra-libs/DataTables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/dataTables.buttons.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/buttons.flash.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/jszip.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/pdfmake.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/vfs_fonts.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/buttons.html5.min.js')); ?>"></script>
<script src="<?php echo e(asset('public/admin/js/buttons.print.min.js')); ?>"></script>
<script>
    $(document).ready(function() {
      
      ////////////////////////////////
        $('#export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    	}); 
      ///////////////////////////

      });
      
   </script>