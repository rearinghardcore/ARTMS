<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LateEntry;
use App\Models\User;
use Carbon\Carbon;

class LateEntrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ensure there is at least one user to associate the late entry with
        $user = User::first();

        if ($user) {
            LateEntry::create([
                'user_id' => $user->id,
                'date' => Carbon::now()->toDateString(),
                'time' => Carbon::now()->toTimeString(),
                'reason' => 'Test late entry',
            ]);
        }
    }
}
