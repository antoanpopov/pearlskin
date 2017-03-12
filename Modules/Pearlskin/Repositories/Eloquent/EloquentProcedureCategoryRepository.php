<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Entities\ProcedureCategory;
use Modules\Pearlskin\Events;
use Modules\Pearlskin\Repositories\ProcedureCategoryRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;

class EloquentProcedureCategoryRepository extends EloquentBaseRepository implements ProcedureCategoryRepository
{

    public function create($data)
    {
        $procedureCategory = $this->model->create($data);
        event(new Events\ProcedureCategory\ProcedureCategoryWasCreated($procedureCategory, $data));

        return $procedureCategory;
    }

    /**
     * Update a resource
     * @param $post
     * @param  array $data
     * @return mixed
     */
    public function update($post, $data)
    {
        $post->update($data);
        event(new Events\ProcedureCategory\ProcedureCategoryWasUpdated($post, $data));

        return $post;
    }

    public function allProcedureCategories()
    {
        return ProcedureCategory::visible()->get();
    }

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByTitleInLocale($slug, $locale)
    {
        if (method_exists($this->model, 'translations')) {
            return $this->model->whereHas('translations', function (Builder $q) use ($slug, $locale) {
                $q->where('title', $slug);
                $q->where('locale', $locale);
            })->with('translations')->first();
        }

        return $this->model->where('title', $slug)->where('locale', $locale)->first();
    }
}