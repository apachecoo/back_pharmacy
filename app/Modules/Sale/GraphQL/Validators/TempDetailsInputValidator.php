<?php declare(strict_types=1);

namespace App\Modules\Sale\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class TempDetailsInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'userId' => ['required'],
            'total' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [
            'total' => __('sale.total'),
        ];
    }

}
