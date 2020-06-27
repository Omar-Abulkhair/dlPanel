<?php

namespace Dl\Panel\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Log;
class dbrefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Refresh Tables Then Seeding it';

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
        $name = $this->ask('What is your name?');
        //Log::info($name.'=> db:refresh Command');
        Log::info('Log message', array($name => 'db:refresh Command'));

        //$this->info('','');
        $this->call('migrate:refresh');
        $this->call('db:seed',['--class'=>'Dl\Panel\Database\Seeds\DatabaseSeeder']);

    }
}
