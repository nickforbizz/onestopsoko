<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Request
 * 
 * @property int $id
 * @property int|null $client_id
 * @property string|null $request_type
 * @property string|null $description
 * @property string|null $status
 * @property Carbon|null $DateSubmitted
 * @property string|null $Response
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $active
 *
 * @package App\Models
 */
class Request extends Model
{
	use SoftDeletes;
	protected $table = 'requests';

	protected $casts = [
		'client_id' => 'int',
		'DateSubmitted' => 'date',
		'created_by' => 'int',
		'active' => 'int'
	];

	protected $fillable = [
		'client_id',
		'request_type',
		'description',
		'status',
		'DateSubmitted',
		'Response',
		'created_by',
		'active'
	];
}
