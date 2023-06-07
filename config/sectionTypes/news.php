<?php

return [
    'id' => 7,
    'type' => 7,
    'folder' => 'updates',
    'paginate' => 16,
    'fields' => [
        'trans' => [
            'title' => [
                'type' => 'text',
                'data-icon' => '-',
                'error_msg' => 'title_is_required',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'slug' => [
                'type' => 'slug',
                'error_msg' => 'slug_is_required',
                'data-icon' => '-',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'desc' => [
                'type' => 'text',
                'error_msg' => 'title_is_required',
                'data-icon' => '-',
                'required' => 'required',
                'max' => '100',
                'min' => '3',

            ],
            'text' => [
                'type' => 'textarea',
                'error_msg' => 'title_is_required',

            ],
            'active' => [
                'type' => 'checkbox',
            ],

        ],
        'nonTrans' => [
            'images' => [
                'type' => 'images',
            ],
            'start_date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
            ],
            'end_date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
            ],
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
            ],
        ],
    ],
];
