<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wallet
 * 
 * @property int $id
 * @property float|null $balance
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $active
 * 
 * @property Collection|WalletTransaction[] $wallet_transactions
 *
 * @package App\Models
 */
class Wallet extends Model
{
	use SoftDeletes;
	protected $table = 'wallets';

	protected $casts = [
		'balance' => 'float',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'balance',
		'created_by',
		'active'
	];

	public function wallet_transactions()
	{
		return $this->hasMany(WalletTransaction::class);
	}
}
