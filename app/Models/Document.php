<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Document extends Model
{

    static $rules = [
        'title' => 'required',
        'status' => 'required',
        'file_path' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'tag', 'onlyuser', 'status', 'file_path', 'description'];

    public function deleteFile()
    {
        // Check if the file exists
        if ($this->file_path && Storage::exists($this->file_path)) {
            // Delete the file
            Storage::delete($this->file_path);
        }
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'onlyuser');
    }
}
