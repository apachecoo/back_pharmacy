<?php declare(strict_types=1);

namespace App\Modules\Laboratory\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class LaboratoryInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [
            'name' => __('laboratory.laboratory.name'),
            'address' => __('laboratory.laboratory.address'),
        ];
    }

}
