<?php namespace Modules\Pearlskin\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Modules\Media\Support\Traits\MediaRelation;

class Procedure extends Model
{
    use Translatable,
        MediaRelation;

    protected $table = 'pearlskin__procedures';
    public $translatedAttributes = ['title', 'description'];
    protected $fillable = [
        'price',
        'created_by_user_id',
        'updated_by_user_id',
        'procedure_cat_id',
        'is_visible',
        // Translatable fields
        'title',
        'description',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
    ];

    protected $dates = ['created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(ProcedureCategory::class, 'procedure_cat_id');
    }

    public function scopeVisible($query)
    {
        return $query->where('is_visible', '=', true);
    }
}