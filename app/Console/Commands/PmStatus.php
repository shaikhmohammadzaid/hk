<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Admin;
use App\Models\LeaveManagement;
use Session;
use DB;
use Auth; 
use Cache;


class PmStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pm:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
             $ls = DB::table('leave_management')->where('from_date','=',$date)
                                                ->where('emp_id','=',NULL)
                                                ->get();
             foreach($ls as  $l)
             {
                        $id1=$l->pm_id;
                      DB::table('admins')->where('id','=',$id1)->update(['status' => 0 ]);
             }
                            

             
            $lss = DB::table('leave_management')->where('to_date','=',$date)
                                                ->where('emp_id','=',NULL)
                                                ->get();
             foreach($lss as  $ls)
             {
                
                        $id1=$ls->pm_id;
                      DB::table('admins')->where('id','=',$id1)->update(['status' => 1 ]);
             }
    }
}
