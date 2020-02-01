<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Feedback
 * @package App\Models
 * @property integer $user_id
 * @property string $title
 * @property $content
 * @property $created_at
 * @property $updated_at
 * @property boolean $completed
 */

class Feedback extends Model
{
    protected $fillable = [
        'title',
        'content',
    ];

    // Обратное отношение к пользователю
    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
