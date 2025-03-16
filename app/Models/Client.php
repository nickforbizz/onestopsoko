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
 * Class Client
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $location
 * @property string|null $type
 * @property int|null $active
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * 
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Client extends Model
{
	use SoftDeletes;
	protected $table = 'clients';

	protected $casts = [
		'active' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'name',
		'phone',
		'email',
		'location',
		'type',
		'active',
		'created_by'
	];

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}
