<?php

namespace App\Admin\Valid;

use App\Admin\Models\AdminUser;
use App\Admin\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Validator;

class EventValidator extends Validator
{
    public function validateUser($translator, $data, $rules, $messages)
    {
        $sql = "select * from admin_users au join prefix_{$rules[0]} ru on au.id=ru.user_id where ru.event_id= ?";
        $rs  = DB::select($sql, [$rules[1]]);
        if (count($rs) > 0) {
            return false;
        } else {
            return true;
        }
    }
}
