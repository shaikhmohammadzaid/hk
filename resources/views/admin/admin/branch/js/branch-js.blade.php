<script src="{{ asset('public/admin/dist/js/sweetalert.min.js') }}"></script>
<script>
   function editBranch(branch_id,branch_name,location_id) 
          {  
              
               $('#edit_branch_id').val(branch_id);
               $('#edit_branch_name').val(branch_name);
                $('#edit_location_name').val(location_id);
               
              $('#edit_branch_model').modal('show');
          }
    $(document).ready(function() {
       
   
      $(document).on('click','#branch',function(){
      
          $('#add_branch_model').modal('show');
      });

     //Add branch
      $(document).on('submit','#frm-branch',function(e){
           e.preventDefault();
           var branch_name= $('#branch_name').val();
          var location_id= $('#location_id').val();
          
         
       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
           $.post("{{ route('add_branch') }}",{branch_name:branch_name,location_id:location_id},function(data){
                      
                var error = data['error']; 
             
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == branch_name+" already exits") 
                      {
                       $("#branch_error").html(error); 
                     }
                     
            });
            $("#frm-branch").trigger('reset');
      });

     //Delete Branch
    
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
                  var branch_id = $(this).data('branch-id');
                  $.get("{{ route('delete_branch') }}",{branch_id:branch_id,},function(data){
                      location.reload(true);

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
           
           editLocation(location_id,location_name);
      });

     jQuery('.btn-update').on('click', function (e) {
   
          e.preventDefault(); 
          jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
         
          var branch_id = jQuery('#edit_branch_id').val(); 
          var branch_name = jQuery('#edit_branch_name').val();    
          var location_name = jQuery('#edit_location_name').val(); 
         
          jQuery.ajax({
                         url:"{{ route('edit_branch')}}",
                         method: 'POST',  
                         data: {
                            branch_id:branch_id,
                            branch_name:branch_name, 
                             location_name:location_name,       
                          },
                          success: function(data){ 
                                  console.log(data);
                               var error = data['error']; 
                              
                                if(error == "success") 
                                {
                                    location.reload(true);
                                }
                                else if(error == branch_name+" already exits") 
                                {
                                 $("#edit_branch_error").html(error); 
                               }

                          }
               });   
 
          });



     
    
    });
   </script>

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