<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Transaction
 * 
 * @property int $id
 * @property string|null $type
 * @property Carbon|null $date
 * @property int|null $product_id
 * @property int|null $quantity
 * @property int|null $amount
 * @property string|null $notes
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $active
 * 
 * @property Product|null $product
 * @property User|null $user
 *
 * @package App\Models
 */
class Transaction extends Model
{
	use SoftDeletes;
	protected $table = 'transactions';

	protected $casts = [
		'date' => 'date',
		'product_id' => 'int',
		'quantity' => 'int',
		'amount' => 'int',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'type',
		'date',
		'product_id',
		'quantity',
		'amount',
		'notes',
		'created_by',
		'active'
	];

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}
}
