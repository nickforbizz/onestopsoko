<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supply
 * 
 * @property int $id
 * @property int|null $product_id
 * @property int|null $supplier_id
 * @property Carbon|null $supply_date
 * @property int|null $quantity
 * @property int|null $amount
 * @property int|null $total_amount
 * @property string|null $status
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $active
 * 
 * @property Product|null $product
 * @property User|null $user
 * @property Supplier|null $supplier
 *
 * @package App\Models
 */
class Supply extends Model
{
	use SoftDeletes;
	protected $table = 'supplies';

	protected $casts = [
		'product_id' => 'int',
		'supplier_id' => 'int',
		'supply_date' => 'date',
		'quantity' => 'int',
		'amount' => 'int',
		'total_amount' => 'int',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'product_id',
		'supplier_id',
		'supply_date',
		'quantity',
		'amount',
		'total_amount',
		'status',
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

	public function supplier()
	{
		return $this->belongsTo(Supplier::class);
	}
}
