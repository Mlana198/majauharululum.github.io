<?php

use App\Models\Setting;

function Setting(array $data)
{
    foreach ($data as $key => $value) {
        \App\Models\Setting::updateOrCreate(
            ['key' => $key],
            ['value' => $value]
        );
    }
}

