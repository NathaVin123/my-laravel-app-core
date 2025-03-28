<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\Artisan;


class MigrateWithConfirmation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'migrate:confirm';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations after user confirmation';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // do {
        //     $answer = $this->choice('Do you really want to run migrations?', ['Yes', 'No']);
        // } while (!$answer); // Loop akan terus berjalan sampai ada input yang valid

        // if ($answer === 'Yes') {
        //     $this->info('Migrations executed successfully.');
        // } else {
        //     $this->warn('Migration canceled.');
        // }
        if ($this->confirm('Do you really want to run migrations?', true)) {
            $this->info('Migrations executed successfully.');
        } else {
            $this->warn('Migration canceled.');
        }

        // if ($this->choice('Do you really want to run migrations?', ['Yes', 'No'], 0) === 'Yes') {
        //     $this->info('Migrations executed successfully.');
        // } else {
        //     $this->warn('Migration canceled.');
        // }

        // $answer = $this->ask('Type "MIGRATE" to proceed');
        // if ($answer === 'MIGRATE') {
        //     Artisan::call('migrate', [], $this->getOutput());
        //     $this->info('Migrations executed successfully.');
        // } else {
        //     $this->warn('Migration canceled.');
        // }
    }
}