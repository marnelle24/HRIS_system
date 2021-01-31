<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class UserRole
 * @package App\Models
 *
 * @property int $user_id
 * @property int $role_id
 */
class UserRole extends BaseModel
{
    /** @var int $user_id */
    public $user_id;

    /** @var int $role_id */
    public $role_id;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role_id'
    ];

    protected $table = 'users_role';

    /**
     * @return HasOne
     */
    public function role()
    {
        return $this->hasOne(Role::class, 'id', 'role_Id');
    }

    /**
     * Get all attributes
     *
     * @param array $columns
     * @return BaseModel[]|\Illuminate\Database\Eloquent\Collection
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function all($columns = ['*'])
    {
        $all = parent::all($columns);

        self::validateSelf($all, [
            'user_id' => 'required|integer',
            'role_id' => 'required|integer'
        ]);

        return $all;
    }
}
