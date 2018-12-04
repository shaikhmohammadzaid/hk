<script>
    $(document).ready(function() {

      $(document).ready(function() {
       $('.mdb-select').material_select();
      });

      $(document).on('click','#taskassign',function(){
      var tid=$(this).data('id');
        $('#task_id').val(tid);
          $('#taskassignmodel').modal('show');

      });

     //task assiend  to employee
      $(document).on('click','.btn-save',function(e){
           e.preventDefault();
          var task_id = $('#task_id').val(); 
          var emp_id = $('#emp_id').val(); 

          
           $.get("{{ route('taskAssignEmp') }}",{emp_id:emp_id,task_id:task_id},function(data){
                         
                                window.location.href = "{{ url('admin/project-manager/assign_task') }}";
                          
            });
            $("#frm-taskAssignEmp").trigger('reset');
      });
      
    
    });

      //review Script
     $(document).on('click','#review',function(){
        var id=$(this).data('id');
        $('#modal_task_id').val(id);
        $("#reviewmodel").modal('show');

     });

     jQuery('.review-save').click( function (e) { 
         
    var task_id = $('#modal_task_id').val();  
    var status=  $('#status').val();
    
    
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
    e.preventDefault();   
    var path="{{url ('/')}}/admin/emp_review_taskstatus/"+task_id+"/"+status;      
     jQuery.ajax({
            url:path,
            method: 'GET', 
              success: function(response1){        
              console.log(response1);
               location.reload(true); 
             }   
  
        });   
  }); 

   

   </script>
<script src="{{ asset('public/admin/dist/js/sweetalert.min.js') }}"></script>
<!-- This is data table -->
<script src="{{ asset('public/admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script src="{{ asset('public/admin/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('public/admin/js/jszip.min.js') }}"></script>
<script src="{{ asset('public/admin/js/pdfmake.min.js') }}"></script>
<script src="{{ asset('public/admin/js/vfs_fonts.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('public/admin/js/buttons.print.min.js') }}"></script>
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