<?php declare(strict_types=1);

namespace App\Modules\Product\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class InputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'laboratoryId' => ['required', 'integer'],
            'presentationId' => ['required', 'integer'],
            'typeId' => ['required', 'integer'],
            'code' => ['required', 'string', 'max:20'],
            'description' => ['required', 'string', 'max:200'],
            'stock' => ['required', 'integer'],
            'expiration' => ['required', 'string'],
        ];
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [
            'code' => __('product.code'),
            'description' => __('product.description'),
            'stock' => __('product.stock'),
            'expiration' => __('product.expiration'),
        ];
    }

}
