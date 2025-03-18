<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class WalletTransaction
 * 
 * @property int $id
 * @property int|null $wallet_id
 * @property string|null $transaction_type
 * @property float|null $amount
 * @property string|null $description
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $active
 * 
 * @property Wallet|null $wallet
 *
 * @package App\Models
 */
class WalletTransaction extends Model
{
	use SoftDeletes;
	protected $table = 'wallet_transactions';

	protected $casts = [
		'wallet_id' => 'int',
		'amount' => 'float',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'wallet_id',
		'transaction_type',
		'amount',
		'description',
		'created_by',
		'active'
	];


	protected static function boot()
    {
        parent::boot();

        static::created(function ($transaction) {
            $wallet = $transaction->wallet;
            $wallet->balance += $transaction->amount;
            $wallet->save();
        });
    }

	
	public function wallet()
	{
		return $this->belongsTo(Wallet::class);
	}
}
