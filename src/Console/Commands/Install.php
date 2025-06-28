<?php

namespace Bagisto\Pickup\Console\Commands;

use Exception;
use Illuminate\Console\Command;

use function Laravel\Prompts\confirm;

class Install extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pickup:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the pickup module.';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->info('Starting Bagisto Pickup Module Installation.');

        try {
            $this->call('migrate');

            $seedDatabase = confirm(
                label: 'Do you want to add some example pickup time slots to get started? (recommended for fresh installs)',
                default: false,
            );

            if ($seedDatabase) {
                $this->seedPickupTimeslots();
            }

            $publishAssets = confirm(
                label: 'Publish the package assets, this may overwrite files in the resources folder. Do you wish to continue?',
                default: true,
            );

            if ($publishAssets) {
                $this->publishAssets();
            }

            $this->call('cache:clear');
            $this->call('config:cache');
            $this->call('route:cache');

        } catch (Exception $e) {
            $this->error('An error occurred during installation: '.$e->getMessage());
            report($e);
        }

        $this->info('Installation completed successfully!');
    }

    /**
     * Seed the pickup timeslots table.
     *
     * @return void
     */
    private function seedPickupTimeslots()
    {
        try {

            $this->call('db:seed', [
                '--class' => \Bagisto\Pickup\Database\Seeders\PickupTimeslotsSeeder::class,
            ]);
            $this->info('Pickup timeslots table seeded successfully!');

        } catch (Exception $e) {
            $this->error('Failed to seed pickup timeslots table: '.$e->getMessage());
            throw $e;
        }
    }

    /**
     * Publish the package assets.
     *
     * @return void
     */
    private function publishAssets()
    {
        try {
            $this->call('vendor:publish', [
                '--provider' => 'Bagisto\Pickup\Providers\PickupServiceProvider',
                '--tag'      => 'pickup',
                '--force'    => true,
            ]);

        } catch (Exception $e) {
            $this->error('Failed to publish package assets: '.$e->getMessage());
            throw $e; // Rethrow exception to stop further installation
        }
    }
}
