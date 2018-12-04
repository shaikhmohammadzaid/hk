<?php $__env->startSection('content'); ?>
<div class="page-breadcrumb">
  <div class="row">
    <div class="col-5 align-self-center">
      <h4 class="page-title">Admin Listing</h4>
      <div class="d-flex align-items-center">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(url('admin/dashboard')); ?>">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admins</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="col-7 align-self-center">
      <div class="d-flex no-block justify-content-end align-items-center">
        <div class="m-r-10">
          <div class="lastmonth"></div>
        </div>

         <button id="add_role" class="btn btn-primary pull-right">Add Roles</button>&nbsp;
        <button id="add_admin" class="btn btn-primary pull-right">Add Admin</button>&nbsp;<button id="add_task" class="btn btn-primary pull-right">Add Task</button>
      </div>
    </div>
  </div>
</div>
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <!-- basic table -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Admins</h4>
          <div class="row m-t-40">
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-info text-center">
                  <h1 class="font-light text-white"><?php echo e(totaladmin()); ?></h1>
                  <h6 class="text-white">Total Admin</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-primary text-center">
                  <h1 class="font-light text-white"><?php echo e(totaladmin_active()); ?></h1>
                  <h6 class="text-white">Active Admin </h6>
                </div>
              </div>
            </div>
            <!-- Column -->
            <div class="col-md-6 col-lg-4 col-xlg-4">
              <div class="card card-hover">
                <div class="box bg-success text-center">
                  <h1 class="font-light text-white"><?php echo e(totaladmin_inactive()); ?></h1>
                  <h6 class="text-white">Inactive Admin</h6>
                </div>
              </div>
            </div>
            <!-- Column -->
          </div>
          <div class="table-responsive"> <?php if(Session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong> <?php echo e(Session::get('success')); ?></strong> </div>
            <?php elseif(Session()->has('failure')): ?>
            <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
              <strong><?php echo e(Session::get('failure')); ?></strong> </div>
            <?php endif; ?>
            <table id="export" class="table table-striped table-bordered">
              <thead>
                <tr>
                 
                  <th>Id</th> 
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Created</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php $cnt = count($ads); if ($cnt>0) {?>
              <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr>
                <td><?php echo e($admin->id); ?></span></td>
                <td><?php echo e($admin->name); ?></td>
                <td><?php echo e($admin->job_title); ?></td>
                <td><?php echo e($admin->email); ?></td>
                <td><div id="<?php echo e($admin->id); ?>/<?php echo e($admin->status); ?>" class="status" style="cursor:pointer;">
                    <?php if($admin->status==0) { echo "<span class='label label-danger'>Inactive"; } else { echo "<span class='label label-success'>Active"; }  ?>
                  </div></td>
                <td><?php echo e($admin->created_at); ?></td>
        
                <td><div id="<?php echo e($admin->id); ?>" class="edit"  style="cursor:pointer;" onclick="bk(<?php echo e($admin->id); ?> , '<?php echo e($admin->name); ?>', '<?php echo e($admin->email); ?>','<?php echo e($admin->password); ?>','<?php echo e($admin->job_title); ?>','<?php echo e($admin->location); ?>','<?php echo e($admin->branch); ?>','<?php echo e($admin->pm_id); ?>')">Edit</div>
                <td><div id="<?php echo e($admin->id); ?>" class="delete" style="cursor:pointer;">Delete</div></td>
              </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php } else { ?>
              <p>Record not found.</p>
              </tr>
              
              <?php } ?>
              </tbody>
              
             
            </table>
            <div align="center"> <?php echo e($ads->links()); ?> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!--Model starts here-->
<!-- start Role Model -->

<div class="modal fade" tabindex="-1" role="dialog" id="add_role_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add Role</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" id="form" method="post" class="modeladdevent">
          <div class="well"> <span>Enter Role:</span>
            <label class="error error_name" style="color: red;">Name Is Required !!!</label>
            <input type="text" name="rname" id="rname" class="form-control" autofocus required/>
           
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
          <button type="submit" id="add_role_btn" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>


<!-- end role modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="add_admin_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" id="form" method="post" class="modeladdevent">
          <div class="well"> <span>Name:</span>
            <label class="error error_name" style="color: red;">Name Is Required !!!</label>
            <input type="text" name="name" id="name" class="form-control" autofocus required/>
            <span>Email:</span>
            <label class="error error_email" style="color: red;">Email Is Required !!!</label>
            <input type="text" name="email" id="email" class="form-control"  required/>
            <p id="email_error" style="color:#FF0000"></p>
            <span>Password:</span>
            <label class="error error_password" style="color: red;">Password Is Required !!!</label>
            <input type="password" name="password" id="password" class="form-control"  required/>
            <span>Job title:</span>
            <select name="job_title" id="job_title"  class="form-control">
        <option value="" disabled selected>Select your option</option>
            <!--   <option value="admin">Admin</option>
              <option value="subadmin">Sub Admin</option>
              <option value="projectmanager">Project Manager</option>
              <option value="cashcollector">CashCollector</option>
              <option value="employee">Employee</option> -->
               <?php $__currentLoopData = $role; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $roles): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($roles->role); ?>"><?php echo e($roles->role); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
            <div class="pm">
              <span>Location:</span>
              <label class="error error_location" style="color: red;">Location  Is Required !!!</label>
              <input type="text" name="location" id="location" class="form-control"  required/>
              <p id="location_error" style="color:#FF0000"></p>
              <span>Branch :</span>
                <select name="branch" id="branch"  class="form-control">
          <option value="" disabled selected>Select your option</option>
                  <option value="a1">A-1</option>
                  <option value="a2">A-2</option>
                  <option value="a3">A-3</option>
                </select>
            </div>
       <div class="e">
              <span>Project Manager :</span>
                <select name="pm_id" id="pm_id"  class="form-control">
          <option value="" disabled selected>Select your option</option>
          <?php $__currentLoopData = $pms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($pm->id); ?>"><?php echo e($pm->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  
                </select>
            </div>
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
          <button type="submit" id="add_admin_btn" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="edit_admin_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Edit Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
      </div>
      <div class="modal-body">
        <form action="" id="#form" method="post" class="modeleditevent">
          <div class="well"> <span>Name:</span>
            <input type="hidden"  name"admin_id" id="admin_id" />
            <input type="text" name="admin_name" id="admin_name" class="form-control" autofocus required/>
            <label class="error edit_error_name" style="color: red;">Name Is Required !!!</label>
            </br>
            <span>Email:</span>
            <input type="text" name="admin_email" id="admin_email" class="form-control"  required/>
            <label class="error edit_error_email" style="color: red;">Email Is Required !!!</label>
            <p id="edit_email_error" style="color:#FF0000"></p>
            </br>
            <span>Password:</span>
            <input type="password" name="admin_password" id="admin_password" class="form-control"  required/>
            <label class="error edit_error_password" style="color: red;">Password Is Required !!!</label>
            <p id="edit_error_password" style="color:#FF0000"></p>
            
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
          <button type="submit" id="edit_admin_btn" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="add_task_model">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="modal_title">Add Task</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span> </button>
      </div>
      <div class="modal-body">
        <form action="" method="post" class="modeladdevent">
          <div class="well"> <span>Add Task:</span>
            <label class="error task_name" style="color: red;">Task Is Required !!!</label>
            <input type="text" name="add_task" id="add_task_name" class="form-control" autofocus required/>
             
             
          </div>
        </form>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" id="add_task_btn" class="btn btn-primary">Save</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
</div>
<!--Model ends here-->
<?php $__env->stopSection(); ?> 
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('public/admin/dist/js/sweetalert.min.js')); ?>"></script>
<script> $('.delete').click(function() {   
  swal({
  title: "Are you sure?",
  text: "Once deleted, you will not be able to recover this record!",
  icon: "warning",
  buttons: true,
  dangerMode: true,
  })
  .then((willDelete) => {
   if (willDelete) {
     var uid = $(this).attr("id");  
       var path="<?php echo e(url ('/')); ?>/admin/delete_admin/"+uid;      
       jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  }); 
     jQuery.ajax({
                      url:path,
                      method: 'GET',                  
                            success: function(response){
                            
                            location.reload(true); 
                       }   
              });
     } else {
    swal("Your record is safe!");
      }   
  });
  
  });  
</script>
<script>
jQuery('#add_task').on('click', function () {
  jQuery("#add_task_model").modal();   
  }); 
  
  jQuery('#add_task_btn').on('click', function (e) {
  
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      e.preventDefault();    
    if (jQuery('#name').val() != '' && jQuery('#email').val() != '' && jQuery('#password').val() != '') 
          {
            var task_name = jQuery('#add_task_name').val(); 
          }
          else
          {
            
             if(jQuery('#add_task_name').val() == '')
                  {
                    $(".task_name").show();
                  }
                  else
                  {
                     $("#add_task_name").keyup();
                  }    
            
          } 
          
           var task_name = jQuery('#add_task_name').val();
         jQuery.ajax({
           url:"<?php echo e(url('/admin/add_task')); ?>",
           method: 'POST',  
           data: {
              task_name:task_name,          
          },
          success: function(data){           
         
          location.reload(true); 
            
       }
      });   
  }); 

</script>
<script>

jQuery('.edit').on('click',function(){ bk(mid,name,email,password,job_title,location,branch,pm_id); })
  
 function bk(mid,name,email,password,job_title,location,branch,pm_id) 
{  
$("#admin_id").val(mid);    
$("#admin_name").val(name); 
$("#admin_email").val(email); 


$("#admin_job_title").val(job_title); 
        var pm=$('#admin_job_title').val();
          if (pm == "projectmanager") 
          {
           $('.editpm').show();
       $("#admin_pm_id").val('');
          }
          else
          {
        $("#admin_pm_id").val(pm_id);
            $('.editpm').hide();
          }  
$("#admin_location").val(location);
$("#admin_branch").val(branch);

$("#admin_pm_id").val(pm_id); 
      var e=$('#admin_job_title').val();
          if (e == "employee") 
          {
        $("#admin_location").val('');
            $("#admin_branch").val('');
           $('.edite').show();
          }
          else
          {
        $("#admin_location").val(location);
             $("#admin_branch").val(branch);
            $('.edite').hide();
          }  
$('#edit_admin_model').modal();  
}
  </script>

<script type="text/javascript" charset="utf-8"> 
 
    jQuery(document).ready(function(){
  
   
      
     $('.pm').hide(); 
   $('.editpm').hide();
   $('.e').hide(); 
   $('.edite').hide();
    $('.error').hide();
     
     $('.btn-close').click(function(){ $('.modeladdevent').trigger('reset'); location.reload(true); })

    $('#name').keyup(function(e) {
      e.preventDefault();
      if ($('#name').val()=='')  { $('.error_name').show(); } else{ $('.error_name').hide(); }
    });

    $('#email').keyup(function(e)  {
      e.preventDefault();
      if ($('#email').val()=='') { $('.error_email').show(); } else{  $('.error_email').hide(); }
    });

    $('#password').keyup(function(e) {
      e.preventDefault();
      if ($('#password').val()=='') { $('.error_password').show(); } else{ $('.error_password').hide(); }
    });
  
  //error form validation
  $('#admin_name').keyup(function(e) {
      e.preventDefault();
      if ($('#admin_name').val()=='') { $('.edit_error_name').show(); } else{  $('.edit_error_name').hide(); }
    });

    $('#admin_email').keyup(function(e) {
      e.preventDefault();
      if ($('#admin_email').val()=='') { $('.edit_error_email').show(); } else{ $('.edit_error_email').hide(); }
    });

       // Start select project manager
   
         jQuery('#job_title').on('change', function() {
         // e.preventdefault();
          var pm=$('#job_title').val();
          if (pm == "projectmanager") 
          {
           $('.pm').show();
          }
          else
          {
            $('.pm').hide();
          }
        
          });
      // END select project manager
      // Start edit-select project manager
         jQuery('#admin_job_title').on('change', function () {

          var pm=$('#admin_job_title').val();
          if (pm == "projectmanager") 
          {
       var n="";
      
       $('#admin_pm_id').val(n);
           $('.editpm').show();
          }
          else
          {
            $('.editpm').hide();
          }
        
          });
      // END select project manager
    
    // Start select Employee then display project manager list
   
         jQuery('#job_title').on('change', function() {
         // e.preventdefault();
          var e=$('#job_title').val();
          if (e == "employee") 
          {
           $('.e').show();
          }
          else
          {
            $('.e').hide();
          }
        
          });
      // END select Employee then display project manager list
      // Start edit-select Employee then display project manager list
         jQuery('#admin_job_title').on('change', function () {

          var e=$('#admin_job_title').val();
          if (e == "employee") 
          {
       var n="";
      
       $('#admin_location').val(n);
       $('#admin_branch').val(n);
           $('.edite').show();
          }
          else
          {
            $('.edite').hide();
          }
        
          });
      // END select Employee then display project manager list
   

  jQuery('.status').click( function (e) {     
    var event_id = $(this).attr("id");  
    var status= event_id.split("/");
    var uid = status[0];
    var status = status[1]; 
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
    e.preventDefault();   
    var path="<?php echo e(url ('/')); ?>/admin/admin_status_inactive/"+uid+"/"+status; 
       $.ajax({
            url:path,
            method: 'GET',                  
              success: function(response1){        
             
              location.reload(true); 
             }   
  
        });   
  }); 
   
     jQuery('#add_role').on('click', function () {
  jQuery("#add_role_model").modal();   
  }); 

 jQuery('#add_role_btn').on('click', function (e) {
  
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      e.preventDefault();    
    
          if (jQuery('#rname').val() != '') 
          {
            var name = jQuery('#rname').val();
          
          }
          else
          {
            
             if(jQuery('#rname').val() == '')
                  {
                    $(".error_name").show();
                  }
                 
            
          }    
    var name = jQuery('#rname').val();
   
        
         jQuery.ajax({
           url:"<?php echo e(url('/admin/add_role')); ?>",
           method: 'POST',  
           data: {
              name:name
            
          },
          success: function(data){           
        
           var error = data['error']; 
           if(error == "success") 
            {
              window.location.href = "<?php echo e(url('/admin/admin-listing')); ?>";
              // location.reload(true);
            } 
           else if  (error == email+" already exits") { $("#email_error").html(error);  }
           
           
          }
       
      });   
  }); 

  jQuery('#add_admin').on('click', function () {
  jQuery("#add_admin_model").modal();   
  }); 

  jQuery('#add_admin_btn').on('click', function (e) {
  
    jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
      e.preventDefault();    
    
          if (jQuery('#name').val() != '' && jQuery('#email').val() != '' && jQuery('#password').val() != '') 
          {
            var name = jQuery('#name').val();
            var email = jQuery('#email').val();
            var password = jQuery('#password').val();
          }
          else
          {
            
             if(jQuery('#name').val() == '')
                  {
                    $(".error_name").show();
                  }
                  else
                  {
                     $("#name").keyup();
                  }
                   if(jQuery('#email').val() == '')
                  {
                    $(".error_email").show();
                  }
                  else
                  {
                     $("#email").keyup();
                  }
                   if(jQuery('#password').val() == '')
                  {
                    $(".error_password").show();
                  }
                  else
                  {
                     $("#password").keyup();
                  }
            
          }    
    var name = jQuery('#name').val();
    var email = jQuery('#email').val();
    var password = jQuery('#password').val(); 
    var job_title = jQuery('#job_title').val();
        var location = jQuery('#location').val();
        var branch = jQuery('#branch').val();
     var pm_id = jQuery('#pm_id').val();
        
         jQuery.ajax({
           url:"<?php echo e(url('/admin/add_admin')); ?>",
           method: 'POST',  
           data: {
              name:name,
              email:email,
              password:password,
              job_title:job_title,
                            location:location,
                            branch:branch,  
               pm_id:pm_id,        
          },
          success: function(data){           
        
           var error = data['error']; 
           if(error == "success") 
            {
              window.location.href = "<?php echo e(url('/admin/admin-listing')); ?>";
              // location.reload(true);
            } 
           else if  (error == email+" already exits") { $("#email_error").html(error);  }
           
           
          }
       
      });   
  }); 


  jQuery('.edit').click(function(){
     
       bk(id,name,email,job_title,status,location,branch);
      //jQuery('#edit_admin_model').modal();
     })  ;

  jQuery('#edit_admin_btn').on('click', function (e) {
  
  jQuery.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }  });
  e.preventDefault();    

    if ($('#admin_name').val() != '' && $('#admin_email').val() != '' ) 
   {            
    var name = $('#admin_name').val();
    var email = $('#admin_email').val();
    var password = $('#admin_password').val();
   
   } else {            
    if(jQuery('#admin_name').val() == '') { $(".edit_error_name").show();
    }  else { $("#admin_name").keyup(); }
    
    if(jQuery('#admin_email').val() == '') { $(".edit_error_email").show();
    }  else { $("#admin_email").keyup(); }
    
    //if(jQuery('#admin_password').val() == '') { $(".edit_error_password").show();
    //}  else { $("#admin_password").keyup(); }
  
  }  
  var id = jQuery('#admin_id').val();    
  var name = jQuery('#admin_name').val();
  var email = jQuery('#admin_email').val();
  var password = jQuery('#admin_password').val(); 
  var job_title = jQuery('#admin_job_title').val();
    var location = jQuery('#admin_location').val();
   var branch = jQuery('#admin_branch').val();
   var pm_id = jQuery('#admin_pm_id').val();
    jQuery.ajax({
     url:"<?php echo e(url('/admin/edit_admin')); ?>",
     method: 'POST',  
     data: {
        id:id,
        name:name,
        email:email,
        password:password,
    },
    success: function(data){           
    
     var error = data['error']; 
     if(error == "success") 
      {
         window.location.href = "<?php echo e(url('/admin/admin-listing')); ?>";
         //location.reload(true);
    } else if  (error == email+" already exits") { $("#edit_email_error").html(error);  }
     
     
    }

});   
  });
   
  });
</script>
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
        $('#export').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
      }); 
    });
   
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>