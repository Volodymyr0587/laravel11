<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateCustomFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:file';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create file';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $fileName = $this->ask('Enter the file name: ');
        $fileLocation = $this->ask('Enter the file location (retrive to the app directory): ');

        // Ensure the directory exists, create if it doesn't
        $fullPath = app_path($fileLocation);
        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0755, true);
        }

        $filePath = $fullPath . '/' . $fileName;

        // Check if the file already exists
        if (file_exists($filePath)) {
            $this->error('File already exists!');
            return;
        }

        // Create the file
        if (touch($filePath)) {
            $this->info('File created successfully at: ' . $filePath);
        } else {
            $this->error('Failed to create file.');
        }
    }

}
