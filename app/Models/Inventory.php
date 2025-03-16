<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Inventory
 * 
 * @property int $id
 * @property int|null $quantity_available
 * @property Carbon|null $last_updated
 * @property string|null $location
 * @property int|null $product_id
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
class Inventory extends Model
{
	use SoftDeletes;
	protected $table = 'inventory';

	protected $casts = [
		'quantity_available' => 'int',
		'last_updated' => 'date',
		'product_id' => 'int',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'quantity_available',
		'last_updated',
		'location',
		'product_id',
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
