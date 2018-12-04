<script>
  showDetails();


$(document).on('click','.btn-refresh',function(e){
 location.reload(true);
});

  function showDetails(){
      var data = $('#frm-c').serialize();
        $.get("{{ route('showEmployeeLeave') }}",data,function(data){
          $('#InfoTable').empty().append(data);
      });
  }

   $(document).on('submit','#frm-search',function(e){
    e.preventDefault();
    
      var leave_id =$('#leave_id').val();
      var status =$('#status').val();
      var start =$('#start').val();
      var end =$('#end').val();

     $.get("{{ route('searchEmployeeLeaves') }}",{leave_id:leave_id,status:status,start:start,end:end},function(data){

          $('#InfoTable').empty().append(data);
    })
      
  });


   $(document).on('click','.btn-leave',function(e){
       e.preventDefault(); 

       var id=$(this).data('leave-id');
       var status=$(this).data('status');

        $.get("{{ route('EmpLeaveStatus') }}",{id:id,status:status},function(data){
            console.log(data);
           showDetails();
         });
     
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