<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Sale
 * 
 * @property int $id
 * @property int|null $product_id
 * @property int|null $client_id
 * @property Carbon|null $sales_date
 * @property int|null $amount
 * @property string|null $status
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $active
 * 
 * @property Client|null $client
 * @property Product|null $product
 * @property User|null $user
 *
 * @package App\Models
 */
class Sale extends Model
{
	use SoftDeletes;
	protected $table = 'sales';

	protected $casts = [
		'product_id' => 'int',
		'client_id' => 'int',
		'sales_date' => 'date',
		'amount' => 'int',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'product_id',
		'client_id',
		'sales_date',
		'amount',
		'status',
		'created_by',
		'active'
	];

	public function client()
	{
		return $this->belongsTo(Client::class);
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
