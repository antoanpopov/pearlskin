<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Entities;
use Modules\Pearlskin\Events;
use Modules\Pearlskin\Repositories\DoctorRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;
use Illuminate\Database\Eloquent\Builder;

class EloquentDoctorRepository extends EloquentBaseRepository implements DoctorRepository
{
    public function create($data)
    {

        $doctor = $this->model->create($data);

        event(new Events\Doctor\DoctorWasCreated($doctor, $data));

        return $doctor;
    }

    /**
     * Update a resource
     * @param $doctor
     * @param  array $data
     * @return mixed
     */
    public function update($doctor, $data)
    {
        $doctor->update($data);
        event(new Events\Doctor\DoctorWasCreated($doctor, $data));

        return $doctor;
    }

    public function allDoctors()
    {
        return Entities\Doctor::visible()->paginate(6);
    }

    /**
     * @param $slug
     * @param $locale
     * @return object
     */
    public function findByNamesInLocale($slug, $locale)
    {
        if (method_exists($this->model, 'translations')) {
            return $this->model->whereHas('translations', function (Builder $q) use ($slug, $locale) {
                $q->where('names', $slug);
                $q->where('locale', $locale);
            })->with('translations')->first();
        }

        return $this->model->where('names', $slug)->where('locale', $locale)->first();
    }

}
