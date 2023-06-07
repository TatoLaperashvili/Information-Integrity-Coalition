<?php

return [
    'id' => 8,
    'type' => 8,
    'folder' => 'eu_vs_disinfo',
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
            'active' => [
                'type' => 'checkbox',
            ],
            'text' => [
                'type' => 'textarea',
                'error_msg' => 'title_is_required',

            ],
        ],
        'nonTrans' => [
            'images' => [
                'type' => 'images',
            ],
         
            'date' => [
                'type' => 'date',
                'required' => 'required',
                'validation' => 'required|max:20',
            ],
        ],
    ],
];
