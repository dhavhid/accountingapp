<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewTransactionsOutcomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement(
            'CREATE VIEW view_transactions_outcome AS
            SELECT t.id as transactionId, t.transdate as transactionDate, t.amount as amount, t.category_id as categoryId,
            c.title as categoryName, t.iomethod_id as methodId, m.title as methodName, t.description as description,
            t.created_at as createdAt, t.updated_at as updatedAt FROM transactions t JOIN categories c ON t.category_id = c.id
            JOIN iomethods m ON m.id = t.iomethod_id WHERE c.output = 1'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('view_transactions_outcomes');
    }
}
