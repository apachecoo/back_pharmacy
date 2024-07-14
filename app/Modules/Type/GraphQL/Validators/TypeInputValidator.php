<?php declare(strict_types=1);

namespace App\Modules\Type\GraphQL\Validators;

use Nuwave\Lighthouse\Validation\Validator;

final class TypeInputValidator extends Validator
{
    /**
     * Return the validation rules.
     *
     * @return array<string, array<mixed>>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', 'max:50'],
        ];
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [
            'name' => __('type.name'),
        ];
    }

}
