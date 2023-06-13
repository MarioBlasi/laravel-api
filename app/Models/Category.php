<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Hasmany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

   
    /**
     * Get the post that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\Hasmany
     */
    public function post(): Hasmany
    {
        return $this->Hasmany(Post::class);
    }


}
