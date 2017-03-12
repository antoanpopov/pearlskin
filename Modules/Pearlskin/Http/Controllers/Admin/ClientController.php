<?php namespace Modules\Pearlskin\Http\Controllers\Admin;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Modules\Pearlskin\Entities\Client;
use Modules\Pearlskin\Repositories\ClientRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Yajra\Datatables\Facades\Datatables;

class ClientController extends AdminBaseController
{
    /**
     * @var ClientRepository
     */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepository)
    {
        parent::__construct();

        $this->clientRepository = $clientRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients = $this->clientRepository->all();

        return view('pearlskin::admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('pearlskin::admin.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->clientRepository->create($request->all());


        return redirect()->route('admin.pearlskin.client.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Client $client
     * @return Response
     */
    public function edit(Client $client)
    {
        return view('pearlskin::admin.clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Client $client
     * @param  Request $request
     * @return Response
     */
    public function update(Client $client, Request $request)
    {
        $this->clientRepository->update($client, $request->all());

        return redirect()->route('admin.pearlskin.client.index')->withSuccess(
            trans('core::core.messages.resource updated', ['name' => trans('pearlskin::clients.title.clients')])
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Client $client
     * @return Response
     */
    public function destroy(Client $client)
    {
        $this->clientRepository->destroy($client);

        return redirect()->route('admin.pearlskin.client.index');
    }

    public function datatable()
    {

        return Datatables::of($this->clientRepository->all())
            ->addColumn(
                'actions',
                '<div class="btn-group">
                                    <a href="{{ route(\'admin.pearlskin.client.edit\', [$id]) }}"
                                       class="btn btn-default btn-flat"><i class="fa fa-pencil"></i></a>
                                    <button class="btn btn-danger btn-flat" data-toggle="modal"
                                            data-target="#modal-delete-confirmation"
                                            data-action-target="{{ route(\'admin.pearlskin.client.destroy\', [$id]) }}">
                                        <i class="fa fa-trash"></i></button>
                                </div>'
            )
            ->make(true);
    }
}
