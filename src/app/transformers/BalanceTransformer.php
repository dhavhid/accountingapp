<?php

namespace App\Transformers;

use App\Transaction;
use League\Fractal\TransformerAbstract as TransformerAbstract;
use Carbon;

class BalanceTransformer extends TransformerAbstract
{

    public function transform(Transaction $transaction) {
        return [
            'transactionId' => (int) $transaction->transactionid,
            'transactionDate' => $transaction->transactiondate,
            'amount' => floatval($transaction->amount),
            'subtotal' => floatval($transaction->subtotal),
            'categoryId' => (int) $transaction->categoryid,
            'categoryName' => $transaction->categoryname,
            'methodId' => (int) $transaction->methodid,
            'methodName' => $transaction->methodname,
            'description' => $transaction->description,
            'isOutput' => $transaction->isoutput,
            'createdAt' => (new Carbon($transaction->createdat))->toISOString(),
            'updatedAt' => (new Carbon($transaction->updatedat))->toISOString()
        ];
    }
}
