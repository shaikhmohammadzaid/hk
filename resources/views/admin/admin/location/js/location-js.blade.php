<script>
   function editLocation(location_id,location_name) 
          {  
              
               $('#edit_location_id').val(location_id);
               $('#edit_location_name').val(location_name);
            
              $('#edit_location_model').modal('show');
          }
    $(document).ready(function() {
       
   
      $(document).on('click','#location',function(){
      
          $('#add_location_model').modal('show');
      });

     //Add locattion
      $(document).on('submit','#frm-location',function(e){
           e.preventDefault();
          var location_name= $('#location_name').val();
          if (location == '') 
          {
              
          }
           
           $.get("{{ route('add_location') }}",{location_name:location_name},function(data){
                      
                  var error = data['error']; 
                      if(error == "success") 
                      {
                          location.reload(true);
                      }
                      else if(error == location_name+" already exits") 
                      {
                       $("#location_error").html(error); 
                     }
                     
            });
            $("#frm-location").trigger('reset');
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
                  var location_id = $(this).data('location-id');
                  $.get("{{ route('delete_location') }}",{location_id:location_id,},function(data){
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

//====== EDIT LOCATION ==============
       $(document).on('click','.edit',function(){
           
           editLocation(location_id,location_name);
      });

     jQuery('.btn-update').on('click', function (e) {
   
          e.preventDefault(); 
          jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
         
          var location_id = jQuery('#edit_location_id').val();    
          var location_name = jQuery('#edit_location_name').val(); 
         
          jQuery.ajax({
                         url:"{{ route('edit_location')}}",
                         method: 'POST',  
                         data: {
                            location_id:location_id,
                            location_name:location_name,        
                          },
                          success: function(data){ 

                          var error = data['error']; 
                            if(error == "success") 
                          {
                          location.reload(true);
                          }
                          else if(error == location_name+" already exits") 
                          {
                           $("#edit_location_error").html(error); 
                          }

                          }
               });   
 
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