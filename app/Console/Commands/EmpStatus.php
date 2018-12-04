<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use App\Models\LeaveManagement;
use Session;
use DB;
use Auth; 
use Cache;



class EmpStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emp:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'this is Command for emp status';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
             $date=date('Y-m-d');
			 
             $ls = DB::table('leave_management')->where('from_date','=',$date)->get();
			 foreach($ls as  $l)
             {
                        $id1=$l->emp_id;
                      DB::table('admins')->where('id','=',$id1)->update(['status' => 0 ]);
             }
                
				
             
            $lss = DB::table('leave_management')->where('to_date','=',$date)->get();
             foreach($lss as  $ls)
             {
                        $id1=$ls->emp_id;
						
                      DB::table('admins')->where('id','=',$id1)->update(['status' => 1 ]);
             }
            
      // \Log::info('I was Here @' . \Carbon\Carbon::now());
    }
}
