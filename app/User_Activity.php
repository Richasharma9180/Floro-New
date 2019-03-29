<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class User_Activity extends Model
{ 

protected $table = "user_activities";

protected $fillable = [
'id', 'user_id','old_value','new_value','field_name','modified_by'
];

public function users()
{
return $this->belongsTo(User::class);
}
}