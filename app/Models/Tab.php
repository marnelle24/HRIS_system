<?php

namespace App\Models;

/**
 * Class Tab
 * @package App\Models
 *
 * @property string $path
 * @property string $alias
 * @property string $name
 * @property string $component
 * @property int    $module_id
 * @property int    $level
 * @property int    $parent
 * @property string $active
 * @property float  $sort
 * @property int    $doc_type
 */
class Tab extends BaseModel
{
    /** @var string $path */
    public $path;

    /** @var string $alias */
    public $alias;

    /** @var string $name */
    public $name;

    /** @var string $component */
    public $component;

    /** @var int $module_id */
    public $module_id;

    /** @var int $level */
    public $level;

    /** @var int $parent */
    public $parent;

    /** @var string $active */
    public $active;

    /** @var float $sort */
    public $sort;

    /** @var int $doc_type */
    public $doc_type;

    /** @var string $table */
    protected $table = 'tabs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'path',
        'alias',
        'name',
        'component',
        'module_id',
        'level',
        'parent',
        'active',
        'sort',
        'doc_type'
    ];

    /** @var array $primaryKey */
    protected $primaryKey = [
        'level',
        'module_id'
    ];

    public $incrementing = false;

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
            'path'      => 'required|string',
            'alias'     => 'sometimes|required|string',
            'name'      => 'required|string',
            'component' => 'required|string',
            'module_id' => 'required|integer',
            'level'     => 'required|integer',
            'parent'    => 'required|integer',
            'active'    => 'required|string|in:Y,N',
            'sort'      => 'required|between:0,9999.99',
            'doc_type'  => 'required|integer'
        ]);

        return $all;
    }
}
