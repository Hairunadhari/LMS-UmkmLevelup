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
    'array' => 'Inputan :attribute harus sebuah array.',
    'before' => 'Inputan :attribute harus kurang dari :date.',
    'before_or_equal' => 'Inputan :attribute harus kurang dari atau sama dengan :date.',
    'between' => [
        'numeric' => 'Inputan :attribute harus diantara :min dan :max.',
        'file' => 'Inputan :attribute harus diantara :min dan :max kilobytes.',
        'string' => 'Inputan :attribute harus diantara :min dan :max karakter.',
        'array' => 'Inputan :attribute harus diantara :min dan :max items.',
    ],
    'boolean' => 'Inputan :attribute harus ceklist atau tidak.',
    'confirmed' => 'Konfirmasi inputan :attribute tidak sama.',
    'current_password' => 'password tidak sesuai.',
    'date' => 'Inputan :attribute bukan tanggal yang valid.',
    'date_equals' => 'Inputan :attribute harus tanggal yang sama dengan inputan :date.',
    'date_format' => 'Inputan :attribute tidak sesuai dengan format :format.',
    'declined' => 'Inputan :attribute harus ditolak.',
    'declined_if' => 'Inputan :attribute harus ditolak ketika :other is :value.',
    'different' => 'Inputan :attribute dan :other harus berbeda.',
    'digits' => 'Inputan :attribute harus :digits digits.',
    'digits_between' => 'Inputan :attribute harus diantara :min dan :max digits.',
    'dimensions' => 'Inputan :attribute tidak sesuai format.',
    'distinct' => 'Isi dari inputan :attribute tidak boleh mempunyai nilai yang sama.',
    'email' => 'Inputan :attribute harus email yang valid.',
    'ends_with' => 'Inputan :attribute must end with one of the following: :values.',
    'enum' => 'selected :attribute sesuai.',
    'exists' => 'selected :attribute sesuai.',
    'file' => 'Inputan :attribute harus a file.',
    'filled' => 'Inputan :attribute field must have a value.',
    'gt' => [
        'numeric' => 'Inputan :attribute harus greater than :value.',
        'file' => 'Inputan :attribute harus greater than :value kilobytes.',
        'string' => 'Inputan :attribute harus greater than :value characters.',
        'array' => 'Inputan :attribute must have more than :value items.',
    ],
    'gte' => [
        'numeric' => 'Inputan :attribute harus greater than atau sama dengan :value.',
        'file' => 'Inputan :attribute harus greater than atau sama dengan :value kilobytes.',
        'string' => 'Inputan :attribute harus greater than atau sama dengan :value characters.',
        'array' => 'Inputan :attribute must have :value items or more.',
    ],
    'image' => 'Inputan :attribute harus an image.',
    'in' => 'selected :attribute sesuai.',
    'in_array' => 'Inputan :attribute field does not exist in :other.',
    'integer' => 'Inputan :attribute harus an integer.',
    'ip' => 'Inputan :attribute harus a valid IP address.',
    'ipv4' => 'Inputan :attribute harus a valid IPv4 address.',
    'ipv6' => 'Inputan :attribute harus a valid IPv6 address.',
    'json' => 'Inputan :attribute harus a valid JSON string.',
    'lt' => [
        'numeric' => 'Inputan :attribute harus less than :value.',
        'file' => 'Inputan :attribute harus less than :value kilobytes.',
        'string' => 'Inputan :attribute harus less than :value characters.',
        'array' => 'Inputan :attribute must have less than :value items.',
    ],
    'lte' => [
        'numeric' => 'Inputan :attribute harus less than atau sama dengan :value.',
        'file' => 'Inputan :attribute harus less than atau sama dengan :value kilobytes.',
        'string' => 'Inputan :attribute harus less than atau sama dengan :value characters.',
        'array' => 'Inputan :attribute must not have more than :value items.',
    ],
    'mac_address' => 'Inputan :attribute harus a valid MAC address.',
    'max' => [
        'numeric' => 'Inputan :attribute must not be greater than :max.',
        'file' => 'Inputan :attribute must not be greater than :max kilobytes.',
        'string' => 'Inputan :attribute must not be greater than :max characters.',
        'array' => 'Inputan :attribute must not have more than :max items.',
    ],
    'mimes' => 'Inputan :attribute harus a file of type: :values.',
    'mimetypes' => 'Inputan :attribute harus a file of type: :values.',
    'min' => [
        'numeric' => 'Inputan :attribute harus at least :min.',
        'file' => 'Inputan :attribute harus at least :min kilobytes.',
        'string' => 'Inputan :attribute harus at least :min characters.',
        'array' => 'Inputan :attribute must have at least :min items.',
    ],
    'multiple_of' => 'Inputan :attribute harus a multiple of :value.',
    'not_in' => 'selected :attribute sesuai.',
    'not_regex' => 'Inputan :attribute format tidak sesuai.',
    'numeric' => 'Inputan :attribute harus a number.',
    'password' => 'password tidak sesuai.',
    'present' => 'Inputan :attribute field harus present.',
    'prohibited' => 'Inputan :attribute field is prohibited.',
    'prohibited_if' => 'Inputan :attribute field is prohibited ketika :other is :value.',
    'prohibited_unless' => 'Inputan :attribute field is prohibited unless :other is in :values.',
    'prohibits' => 'Inputan :attribute field prohibits :other from being present.',
    'regex' => 'Inputan :attribute format tidak sesuai.',
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
        'numeric' => 'Inputan :attribute harus :size.',
        'file' => 'Inputan :attribute harus :size kilobytes.',
        'string' => 'Inputan :attribute harus :size characters.',
        'array' => 'Inputan :attribute must contain :size items.',
    ],
    'starts_with' => 'Inputan :attribute must start with one of the following: :values.',
    'string' => 'Inputan :attribute harus a string.',
    'timezone' => 'Inputan :attribute harus a valid timezone.',
    'unique' => 'Inputan :attribute has already been taken.',
    'uploaded' => 'Inputan :attribute failed to upload.',
    'url' => 'Inputan :attribute harus a valid URL.',
    'uuid' => 'Inputan :attribute harus a valid UUID.',

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
