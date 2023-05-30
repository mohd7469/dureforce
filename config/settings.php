<?php

return [
    'date_format' => 'd/m/Y',
    'minimum_system_start_date' => '01-01-1900',
    'offer_expire_days' => env('OFFER_EXPIRE_DAYS',7),
    'testimonial_min_text_length' => env('TESTimonial_MIN_TEXT_LENGTH',250),
    'testimonial_max_text_length' => env('TESTimonial_MAX_TEXT_LENGTH',200),
    'work_diary_task_min_text_length' => env('WORK_DIRAY_TASK_MIN_TEXT_LENGTH',1),
    'work_diary_task_max_text_length' => env('WORK_DIRAY_TASK_MAX_TEXT_LENGTH',200)
];