<?php

namespace App\Models;

/**
 * Class Role
 * @package App\Models
 *
 * @property string $name
 * @property string $description
 */
class Role extends BaseModel
{
    /** @var string $name */
    public $name;

    /** @var string $description */
    public $description;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];

    protected $table = 'roles';

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
            'name'        => 'required|string',
            'description' => 'sometimes|required|string|nullable'
        ]);

        return $all;
    }
}
