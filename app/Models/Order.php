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
 * Class Order
 * 
 * @property int $id
 * @property int|null $client_id
 * @property Carbon|null $orderdate
 * @property int|null $total_amount
 * @property string|null $status
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $active
 * 
 * @property Client|null $client
 * @property User|null $user
 * @property Collection|OrderDetail[] $order_details
 *
 * @package App\Models
 */
class Order extends Model
{
	use SoftDeletes;
	protected $table = 'order';

	protected $casts = [
		'client_id' => 'int',
		'orderdate' => 'date',
		'total_amount' => 'int',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'client_id',
		'orderdate',
		'total_amount',
		'status',
		'created_by',
		'active'
	];

	public function client()
	{
		return $this->belongsTo(Client::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'created_by');
	}

	public function order_details()
	{
		return $this->hasMany(OrderDetail::class);
	}
}
