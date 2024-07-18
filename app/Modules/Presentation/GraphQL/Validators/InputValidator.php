<?php declare(strict_types=1);

namespace App\Modules\Presentation\GraphQL\Validators;

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
            'name' => ['required', 'string', 'max:255'],
            'shortName' => ['required', 'string', 'max:10'],
        ];
    }

    public function messages(): array
    {
        return [];
    }

    public function attributes(): array
    {
        return [
            'name' => __('presentation.name'),
            'shortName' => __('presentation.shortName'),
        ];
    }

}
