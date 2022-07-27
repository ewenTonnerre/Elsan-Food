<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Console\Command;

class DataTest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'list:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'List the categories, the restaurants and the users';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('List of restaurant categories : ');
        $this->table(
            ['Name'],
            Category::all(['name'])->toArray()
        );

        $this->info('List of restaurants : ');
        $this->table(
            ['Name', 'Address', 'Rating', 'Description'],
            Restaurant::all(['name', 'address', 'rating', 'description'])->toArray()
        );

        $this->info('List of users : ');
        $this->table(
            ['Firstname', 'Lastname', 'email',],
            User::all(['firstname', 'lastname', 'email'])->toArray()
        );
        return 0;
    }
}
