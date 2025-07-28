<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Forum;

class ForumSeeder extends Seeder
{
    public function run()
    {
        Forum::factory()->count(10)->create();
    }
}
