<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactions = factory(\App\Transaction::class, 200)->make();
        $transactions->each(function($trans) {
            $trans->save();
        });
    }
}
