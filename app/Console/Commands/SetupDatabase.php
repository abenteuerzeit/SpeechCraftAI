<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class SetupDatabase extends Command
{
    protected $signature = 'project:setup';
    protected $description = 'Set up the project for the first time.';


    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        if (app()->environment('local')) {
            if ($this->confirm('This will reset the database and run all migrations from scratch. Do you wish to continue?')) {
                $this->call('migrate:fresh', ['--seed' => true]);
                $this->info('Database reset and seeded in development mode.');
                return;
            }
        } else {
            if (!$this->confirm('This will run raw SQL scripts on the database. Do you wish to continue?')) {
                $this->info('Operation cancelled.');
                return;
            }

            DB::beginTransaction();

            $sqlFiles = ['create_db.sql', 'create_tables.sql', 'seed_data.sql'];

            foreach ($sqlFiles as $file) {
                try {
                    $this->info("Executing " . $file);

                    // Get SQL commands from file
                    $sql = File::get(database_path($file));

                    // Run SQL commands
                    DB::unprepared($sql);

                    $this->info($file . " executed successfully!");
                } catch (\Exception $e) {
                    DB::rollBack();
                    $this->error("Error executing " . $file . ": " . $e->getMessage());
                    return;
                }
            }

            DB::commit();
            $this->info('Database setup completed!');
        }
    }
}
