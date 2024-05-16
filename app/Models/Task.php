<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'long_description'];
    /** Protected $guarded = ['password']; 
     * to specify attributes that are not mass assignable.
    */

    public function toggleComplete()
    {
        // Method to toggle the 'completed' attribute of a Task instance.
        $this->completed = !$this->completed;
        $this->save();
    }
}
