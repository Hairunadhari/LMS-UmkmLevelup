<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'Inputan :attribute harus diterima.',
    'accepted_if' => 'Inputan :attribute harus diterima ketika :other is :value.',
    'active_url' => 'Inputan :attribute bukan link yang valid.',
    'after' => 'Inputan :attribute harus lebih dari :date.',
    'after_or_equal' => 'Inputan :attribute harus lebih dari atau sama dengan :date.',
    'alpha' => 'Inputan :attribute hanya boleh diisi oleh huruf.',
    'alpha_dash' => 'Inputan :attribute hanya boleh diisi oleh huruf, angka, dash dan underscore.',
    'alpha_num' => 'Inputan :attribute hanya boleh diisi oleh huruf dan angka.',
    'array' => 'Inputan :attribute must be an array.',
    'before' => 'Inputan :attribute harus kurang dari :date.',
    'before_or_equal' => 'Inputan :attribute harus kurang dari atau sama dengan :date.',
    'between' => [
        'numeric' => 'Inputan :attribute harus diantara :min dan :max.',
        'file' => 'Inputan :attribute harus diantara :min dan :max kilobytes.',
        'string' => 'Inputan :attribute harus diantara :min dan :max karakter.',
        'array' => 'Inputan :attribute harus diantara :min dan :max items.',
    ],
    'boolean' => 'Inputan :attribute field must be true or false.',
    'confirmed' => 'Inputan :attribute confirmation does not match.',
    'current_password' => 'The password tidak sesuai.',
    'date' => 'Inputan :attribute is not a valid date.',
    'date_equals' => 'Inputan :attribute must be a date equal to :date.',
    'date_format' => 'Inputan :attribute does not match the format :format.',
    'declined' => 'Inputan :attribute must be declined.',
    'declined_if' => 'Inputan :attribute must be declined ketika :other is :value.',
    'different' => 'Inputan :attribute dan :other must be different.',
    'digits' => 'Inputan :attribute must be :digits digits.',
    'digits_between' => 'Inputan :attribute harus diantara :min dan :max digits.',
    'dimensions' => 'Inputan :attribute has invalid image dimensions.',
    'distinct' => 'Inputan :attribute field has a duplicate value.',
    'email' => 'Inputan :attribute must be a valid email address.',
    'ends_with' => 'Inputan :attribute must end with one of the following: :values.',
    'enum' => 'The selected :attribute is invalid.',
    'exists' => 'The selected :attribute is invalid.',
    'file' => 'Inputan :attribute must be a file.',
    'filled' => 'Inputan :attribute field must have a value.',
    'gt' => [
        'numeric' => 'Inputan :attribute must be greater than :value.',
        'file' => 'Inputan :attribute must be greater than :value kilobytes.',
        'string' => 'Inputan :attribute must be greater than :value characters.',
        'array' => 'Inputan :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'Inputan :attribute must be greater than atau sama dengan :value.',
        'file' => 'Inputan :attribute must be greater than atau sama dengan :value kilobytes.',
        'string' => 'Inputan :attribute must be greater than atau sama dengan :value characters.',
        'array' => 'Inputan :attribute must have :value items or more.',
    ],
    'image' => 'Inputan :attribute must be an image.',
    'in' => 'The selected :attribute is invalid.',
    'in_array' => 'Inputan :attribute field does not exist in :other.',
    'integer' => 'Inputan :attribute must be an integer.',
    'ip' => 'Inputan :attribute must be a valid IP address.',
    'ipv4' => 'Inputan :attribute must be a valid IPv4 address.',
    'ipv6' => 'Inputan :attribute must be a valid IPv6 address.',
    'json' => 'Inputan :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => 'Inputan :attribute must be less than :value.',
        'file' => 'Inputan :attribute must be less than :value kilobytes.',
        'string' => 'Inputan :attribute must be less than :value characters.',
        'array' => 'Inputan :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'Inputan :attribute must be less than atau sama dengan :value.',
        'file' => 'Inputan :attribute must be less than atau sama dengan :value kilobytes.',
        'string' => 'Inputan :attribute must be less than atau sama dengan :value characters.',
        'array' => 'Inputan :attribute must not have more than :value items.',
    ],
    'mac_address' => 'Inputan :attribute must be a valid MAC address.',
    'max' => [
        'numeric' => 'Inputan :attribute must not be greater than :max.',
        'file' => 'Inputan :attribute must not be greater than :max kilobytes.',
        'string' => 'Inputan :attribute must not be greater than :max characters.',
        'array' => 'Inputan :attribute must not have more than :max items.',
    ],
    'mimes' => 'Inputan :attribute must be a file of type: :values.',
    'mimetypes' => 'Inputan :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => 'Inputan :attribute must be at least :min.',
        'file' => 'Inputan :attribute must be at least :min kilobytes.',
        'string' => 'Inputan :attribute must be at least :min characters.',
        'array' => 'Inputan :attribute must have at least :min items.',
    ],
    'multiple_of' => 'Inputan :attribute must be a multiple of :value.',
    'not_in' => 'The selected :attribute is invalid.',
    'not_regex' => 'Inputan :attribute format is invalid.',
    'numeric' => 'Inputan :attribute must be a number.',
    'password' => 'The password tidak sesuai.',
    'present' => 'Inputan :attribute field must be present.',
    'prohibited' => 'Inputan :attribute field is prohibited.',
    'prohibited_if' => 'Inputan :attribute field is prohibited ketika :other is :value.',
    'prohibited_unless' => 'Inputan :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'Inputan :attribute field prohibits :other from being present.',
    'regex' => 'Inputan :attribute format is invalid.',
    'required' => 'Inputan :attribute wajib isi.',
    'required_array_keys' => 'Inputan :attribute field must contain entries for: :values.',
    'required_if' => 'Inputan :attribute wajib isi ketika :other is :value.',
    'required_unless' => 'Inputan :attribute wajib isi unless :other is in :values.',
    'required_with' => 'Inputan :attribute wajib isi ketika :values is present.',
    'required_with_all' => 'Inputan :attribute wajib isi ketika :values are present.',
    'required_without' => 'Inputan :attribute wajib isi ketika :values is not present.',
    'required_without_all' => 'Inputan :attribute wajib isi ketika none of :values are present.',
    'same' => 'Inputan :attribute dan :other must match.',
    'size' => [
        'numeric' => 'Inputan :attribute must be :size.',
        'file' => 'Inputan :attribute must be :size kilobytes.',
        'string' => 'Inputan :attribute must be :size characters.',
        'array' => 'Inputan :attribute must contain :size items.',
    ],
    'starts_with' => 'Inputan :attribute must start with one of the following: :values.',
    'string' => 'Inputan :attribute must be a string.',
    'timezone' => 'Inputan :attribute must be a valid timezone.',
    'unique' => 'Inputan :attribute has already been taken.',
    'uploaded' => 'Inputan :attribute failed to upload.',
    'url' => 'Inputan :attribute must be a valid URL.',
    'uuid' => 'Inputan :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
