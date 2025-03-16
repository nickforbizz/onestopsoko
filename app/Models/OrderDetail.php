<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderDetail
 * 
 * @property int $id
 * @property int|null $order_id
 * @property int|null $product_id
 * @property int|null $quantity
 * @property int|null $price_per_unit
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $active
 * 
 * @property Order|null $order
 * @property Product|null $product
 * @property User|null $user
 *
 * @package App\Models
 */
class OrderDetail extends Model
{
	use SoftDeletes;
	protected $table = 'order_details';

	protected $casts = [
		'order_id' => 'int',
		'product_id' => 'int',
		'quantity' => 'int',
		'price_per_unit' => 'int',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'order_id',
		'product_id',
		'quantity',
		'price_per_unit',
		'created_by',
		'active'
	];

	public function order()
	{
		return $this->belongsTo(Order::class);
	}

	public function product()
	{
		return $this->belongsTo(Product::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}
}
