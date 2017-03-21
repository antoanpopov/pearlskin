<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Modules\Pearlskin\Entities\Manipulation;
use Modules\Pearlskin\Repositories\ClientRepository;
use Modules\Pearlskin\Repositories\DoctorRepository;
use Modules\Pearlskin\Repositories\ManipulationRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Pearlskin\Repositories\ProcedureRepository;
use Yajra\Datatables\Facades\Datatables;

class ManipulationController extends AdminBaseController
{
    /**  @var ManipulationRepository */
    private $manipulationRepository;

    /** @var  ClientRepository */
    private $clientRepository;

    /** @var  DoctorRepository */
    private $doctorRepository;

    /** @var  ProcedureRepository */
    private $procedureRepository;

    public function __construct(
        ManipulationRepository $manipulationRepository,
        ClientRepository $clientRepository,
        DoctorRepository $doctorRepository,
        ProcedureRepository $procedureRepository
    )
    {
        parent::__construct();

        $this->manipulationRepository = $manipulationRepository;
        $this->clientRepository = $clientRepository;
        $this->doctorRepository = $doctorRepository;
        $this->procedureRepository = $procedureRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = $this->clientRepository->all();
        $doctors = $this->doctorRepository->all();
        $procedures = $this->procedureRepository->all();
        return view('pearlskin::admin.manipulations.index', compact('clients','doctors','procedures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $clients = $this->clientRepository->all();
        $doctors = $this->doctorRepository->all();
        $procedures = $this->procedureRepository->all();

        return view('pearlskin::admin.manipulations.create')->with(compact('clients','doctors', 'procedures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {

        $this->manipulationRepository->create($request->all());

        return redirect()->route('admin.pearlskin.manipulation.index')
            ->withSuccess(trans('pearlskin::messages.manipulation created'));;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Manipulation $manipulation
     * @return Response
     */
    public function edit(Manipulation $manipulation)
    {

        $clients = $this->clientRepository->all();
        $doctors = $this->doctorRepository->all();
        $procedures = $this->procedureRepository->all();

        return view('pearlskin::admin.manipulations.edit', compact('manipulation','clients','doctors', 'procedures'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Manipulation $manipulation
     * @param  Request $request
     * @return Response
     */
    public function update(Manipulation $manipulation, Request $request)
    {
        $this->manipulationRepository->update($manipulation, $request->all());

        return redirect()->route('admin.pearlskin.manipulation.index')
            ->withSuccess(trans('pearlskin::messages.manipulation updated'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Manipulation $manipulation
     * @return Response
     */
    public function destroy(Manipulation $manipulation)
    {
        $this->manipulationRepository->destroy($manipulation);

        return redirect()->route('admin.pearlskin.manipulation.index')
            ->withSuccess(trans('pearlskin::messages.manipulation deleted'));;
    }

    public function datatable(Request $request)
    {

        $manipulations = Manipulation::with('client')->with('doctor')->with('procedures')
        ->select('pearlskin__manipulations.*')
        ->orderBy('pearlskin__manipulations.date_of_manipulation','DESC');

        return Datatables::eloquent($manipulations)
            ->filter(function ($query) use ($request) {
                if ($request->has('client_id')) {
                    $query->where('client_id', '=', $request->get('client_id'));
                }
                if ($request->has('doctor_id')) {
                    $query->where('doctor_id', '=', $request->get('doctor_id'));
                }

                if ($request->has('procedure_id')) {
                    $query->join('pearlskin__manipulations_procedures','pearlskin__manipulations_procedures.manipulation_id', '=','pearlskin__manipulations.id')
                        ->distinct();
                    $query->where('pearlskin__manipulations_procedures.procedure_id', '=', $request->get('procedure_id'));
                }
            })
            ->editColumn('doctor.names',function($manipulation){
                return ($manipulation->doctor)? $manipulation->doctor->names : '---';
            })
            ->editColumn('client.names',function($manipulation){
                return ($manipulation->client)? $manipulation->client->names : '---';
            })
            ->addColumn('procedures',function ($manipulation){
                $proceduresNames = [];
                foreach ($manipulation->procedures as $procedure){
                    array_push($proceduresNames, $procedure->title);
                }

                return implode(', ', $proceduresNames);
            })
            ->addColumn(
                'actions',
                '<div class="btn-group">
                                    <a href="{{ route(\'admin.pearlskin.manipulation.edit\', [$id]) }}"
                                       class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal"
                                            data-target="#modal-delete-confirmation"
                                            data-action-target="{{ route(\'admin.pearlskin.manipulation.destroy\', [$id]) }}">
                                        <i class="fa fa-trash"></i></button>
                                </div>'
            )
            ->make(true);

    }
}
