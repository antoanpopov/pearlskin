<?php namespace Modules\Pearlskin\Repositories\Eloquent;

use Illuminate\Support\Facades\DB;
use Modules\Pearlskin\Repositories\ScheduleRepository;
use Modules\Pearlskin\Entities;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentScheduleRepository extends EloquentBaseRepository implements ScheduleRepository
{

    public function getForCalendar(){
        return DB::table('pearlskin__schedules')->select(DB::raw('CONCAT(pearlskin__doctors_translations.names," - ",pearlskin__clients.names) AS title'),
            'pearlskin__schedules.appointed_at AS start')
            ->join('pearlskin__clients','pearlskin__schedules.client_id', '=','pearlskin__clients.id')
            ->join('pearlskin__doctors','pearlskin__schedules.doctor_id', '=','pearlskin__doctors.id')
            ->leftJoin('pearlskin__doctors_translations','pearlskin__schedules.doctor_id', '=','pearlskin__doctors_translations.doctor_id')
            ->where('pearlskin__doctors_translations.locale','bg')
            ->get();
    }
}
