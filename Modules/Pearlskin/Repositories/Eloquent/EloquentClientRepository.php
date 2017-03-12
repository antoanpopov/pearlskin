<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Modules\Pearlskin\Repositories\ClientRepository;
use Modules\Pearlskin\Entities;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentClientRepository extends EloquentBaseRepository implements ClientRepository
{

    public function all()
    {
        return $this->model->select(array('id', DB::raw('CONCAT(names, "( ", phone, " )") as names'), 'email', 'phone', 'dob', 'created_at', 'updated_at'))->orderBy(
            'names',
            'ASC'
        )->get();
    }

    /**
     * Create a blog post
     * @param  array $data
     * @return Entities\Client
     */
    public function create($data)
    {
        $data['dob'] = Carbon::parse($data['dob']);
        $entity = $this->model->create($data);

        return $entity;
    }

}
