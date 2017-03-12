<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Carbon\Carbon;
use FloatingPoint\Stylist\Theme\Json;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use Modules\Pearlskin\Entities;
use Modules\Pearlskin\Repositories\ScheduleRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class ScheduleController extends AdminBaseController
{
    /**
     * @var ScheduleRepository
     */
    private $scheduleRepository;

    public function __construct(ScheduleRepository $scheduleRepository)
    {
        parent::__construct();

        $this->scheduleRepository = $scheduleRepository;
    }

    public function generateClients()
    {
        $clientsOld = DB::table('clients_texts')->get();
        Schema::disableForeignKeyConstraints();
        \Modules\Pearlskin\Entities\Client::truncate();

        foreach ($clientsOld as $client) {
            DB::table('pearlskin__clients')->insert(
                [
                    'id' => $client->clients_id,
                    'names' => $client->title,
                    'phone' => $client->phone,
                    'created_by_user_id' => 1,
                    'updated_by_user_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ]
            );
        }
        Schema::enableForeignKeyConstraints();
    }

    public function generateProcedures()
    {

        $treatments = DB::table('treatments')->get();
        Schema::disableForeignKeyConstraints();

        foreach ($treatments as $treatment) {
            $translations = DB::table('treatments_texts')->where('treatments_id', '=', $treatment->id)->first();

            DB::table('pearlskin__procedures')->insert(
                [
                    'id' => $treatment->id,
                    'price' => $translations->price,
                    'sort_order' => $treatment->id,
                    'is_visible' => false,
                    'created_by_user_id' => 1,
                    'updated_by_user_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ]
            );

            DB::table('pearlskin__procedures_translations')->insert(
                [
                    'procedure_id' => $treatment->id,
                    'title' => $translations->title,
                    'locale' => 'bg',
                ]
            );
        }
        Schema::enableForeignKeyConstraints();
    }

    public function generateManipulations()
    {
        $manipulations = DB::table('manipulations')->where('status', '=', 'active')->get();
        Schema::disableForeignKeyConstraints();

        Entities\Manipulation::truncate();
        foreach ($manipulations as $manipulation) {

            DB::table('pearlskin__manipulations')->insert(
                [
                    'id' => $manipulation->id,
                    'client_id' => ($manipulation->clients_id === 0) ? null : $manipulation->clients_id,
                    'doctor_id' => ($manipulation->doctors_id === 0) ? null : $manipulation->doctors_id,
                    'title' => $manipulation->title,
                    'description' => $manipulation->description,
                    'learnt_from' => $manipulation->from_whom_knows,
                    'amount_paid' => $manipulation->client_payed_sum,
                    'amount_discount' => $manipulation->discount,
                    'client_has_discount' => $manipulation->has_promo,
                    'date_of_manipulation' => ($manipulation->doctors_id === '0000-00-00 00:00:00') ? null : $manipulation->doctors_id,

                    'created_by_user_id' => 1,
                    'updated_by_user_id' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                ]
            );

        }
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {

        $this->assetPipeline->requireCss('fullcalendar.css')->after('bootstrap');
        $this->assetPipeline->requireJs('fullcalendar.js')->after('datetimepicker.js');
        $this->assetPipeline->requireJs('fullcalendar-all-locales.js')->after('fullcalendar.js');

        $clients = Entities\Client::select('id',DB::raw('CONCAT(names, " (", phone, ")") AS names'))
            ->orderBy('names','ASC')->get();
        $doctors = Entities\Doctor::all();

        return view('pearlskin::admin.schedules.index', compact('clients','doctors'));
    }

    public function calendar()
    {
        $schedules = $this->scheduleRepository->getForCalendar();

        return JsonResponse::create($schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clientModel = new Entities\Client();
        $doctorModel = new Entities\Doctor();
        $clients = $clientModel->all();
        $doctors = $doctorModel->all();

        return view('pearlskin::admin.schedules.create', compact('clients', 'doctors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request['appointed_at'] = Carbon::parse($request->get('appointed_at'));
        $this->scheduleRepository->create($request->all());

        return redirect()->route('admin.pearlskin.schedule.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Schedule $schedule
     * @return Response
     */
    public function edit(Entities\Schedule $schedule)
    {
        $doctorModel = new Entities\Doctor();
        $clientsModel = new Entities\Client();
        $clients = $clientsModel->all();
        $doctors = $doctorModel->all();

        return view('pearlskin::admin.schedules.edit', compact('schedule', 'clients', 'doctors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Schedule $scheduleRepository
     * @param  Request $request
     * @return Response
     */
    public function update(Entities\Schedule $scheduleRepository, Request $request)
    {
        $request['appointed_at'] = Carbon::parse($request->get('appointed_at'));
        $this->scheduleRepository->update($scheduleRepository, $request->all());

        return redirect()->route('admin.pearlskin.schedule.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Schedule $scheduleRepository
     * @return Response
     */
    public function destroy(Entities\Schedule $scheduleRepository)
    {
        $this->scheduleRepository->destroy($scheduleRepository);

        return redirect()->route('admin.pearlskin.schedule.index');
    }
}
