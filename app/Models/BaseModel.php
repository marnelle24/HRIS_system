<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class BaseModel extends Model
{
    /** @var bool $timestamps */
    public $timestamps = true;

    /**
     * @param       $attributes
     * @param       $validationRules
     * @param array $customMessages
     * @throws ValidationException
     */
    protected static function validateSelf($attributes, $validationRules, $customMessages = [])
    {
        $validator = Validator::make($attributes, $validationRules, $customMessages);

        if ($validator->fails()) {
            throw new ValidationException(
                $validator,
                new JsonResponse('Invalid Parameters', 422),
                $validator->errors()->getMessages()
            );
        }
    }
}
