<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\BirthDayWish;
use App\Models\Staff;
// use Mail;

class AutoBirthDayWish extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'auto:birthdaywith';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return int
     */

    public function handle()
    {
        $staffs = Staff::whereMonth('ngaysinh', date('m'))
                    ->whereDay('ngaysinh', date('d'))
                    ->get();

        if ($staffs->count() > 0) {
            foreach ($staffs as $staff) {
                Mail::to('susitari1920@gmail.com')->send(new BirthDayWish($staff));
            }
        }
        return 0;
    }
}
