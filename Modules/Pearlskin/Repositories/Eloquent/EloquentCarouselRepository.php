<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Modules\Pearlskin\Entities\Carousel;
use Modules\Pearlskin\Events;
use Modules\Pearlskin\Repositories\CarouselRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentCarouselRepository extends EloquentBaseRepository implements CarouselRepository
{
    public function create($data)
    {

        $carousel = $this->model->create($data);

        event(new Events\Carousel\WasCreated($carousel, $data));

        return $carousel;
    }

    /**
     * Update a resource
     * @param $carousel
     * @param  array $data
     * @return mixed
     */
    public function update($carousel, $data)
    {
        $carousel->update($data);
        event(new Events\Carousel\WasUpdated($carousel, $data));

        return $carousel;
    }

    public function getCarouselsForPage($page)
    {

        return Carousel::where('page_id','=',$page)->where('is_visible','=',1)->get();
    }

}
