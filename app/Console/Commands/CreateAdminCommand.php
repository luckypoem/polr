<?php
/**
 *
 * PHP version >= 7.0
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */

namespace App\Console\Commands;

use App\Factories\UserFactory;
use Exception;
use Illuminate\Console\Command;

/**
 * Class CreateAdminCommand
 *
 * @category Console_Command
 * @package  App\Console\Commands
 */
class CreateAdminCommand extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = "create:admin";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create admin user";


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        try {
            UserFactory::createUser(env('admin_user'), env('admin_email'), env('admin_password'), 1, '0.0.0.0');

            $this->info("admin have been created");
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}