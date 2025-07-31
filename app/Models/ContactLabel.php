<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactLabel extends Model
{
    protected $fillable = [
        'form_title',
        'name_label',
        'surname_label',
        'email_label',
        'subject_label',
        'message_label',
        'submit_button_label'
    ];
}
