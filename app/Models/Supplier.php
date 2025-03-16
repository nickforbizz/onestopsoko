<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Supplier
 * 
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $location
 * @property int|null $ratings
 * @property string|null $paymentterms
 * @property int|null $created_by
 * @property string|null $active
 * @property Carbon|null $created_at
 * @property string|null $deleted_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Supplier extends Model
{
	use SoftDeletes;
	protected $table = 'suppliers';

	protected $casts = [
		'ratings' => 'int',
		'created_by' => 'int'
	];

	protected $fillable = [
		'name',
		'phone',
		'email',
		'location',
		'ratings',
		'paymentterms',
		'created_by',
		'active'
	];
}
