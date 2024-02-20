<?php

namespace App\Http\Controllers;

use App\DataTables\TipoMonedaDataTable;
use App\Http\Requests\CreateTipoMonedaRequest;
use App\Http\Requests\UpdateTipoMonedaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\TipoMoneda;
use Illuminate\Http\Request;

class TipoMonedaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Tipo Monedas')->only('show');
        $this->middleware('permission:Crear Tipo Monedas')->only(['create','store']);
        $this->middleware('permission:Editar Tipo Monedas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Tipo Monedas')->only('destroy');
    }
    /**
     * Display a listing of the TipoMoneda.
     */
    public function index(TipoMonedaDataTable $tipoMonedaDataTable)
    {
    return $tipoMonedaDataTable->render('tipo_monedas.index');
    }


    /**
     * Show the form for creating a new TipoMoneda.
     */
    public function create()
    {
        return view('tipo_monedas.create');
    }

    /**
     * Store a newly created TipoMoneda in storage.
     */
    public function store(CreateTipoMonedaRequest $request)
    {
        $input = $request->all();

        /** @var TipoMoneda $tipoMoneda */
        $tipoMoneda = TipoMoneda::create($input);

        flash()->success('Tipo Moneda guardado.');

        return redirect(route('tipoMonedas.index'));
    }

    /**
     * Display the specified TipoMoneda.
     */
    public function show($id)
    {
        /** @var TipoMoneda $tipoMoneda */
        $tipoMoneda = TipoMoneda::find($id);

        if (empty($tipoMoneda)) {
            flash()->error('Tipo Moneda no encontrado');

            return redirect(route('tipoMonedas.index'));
        }

        return view('tipo_monedas.show')->with('tipoMoneda', $tipoMoneda);
    }

    /**
     * Show the form for editing the specified TipoMoneda.
     */
    public function edit($id)
    {
        /** @var TipoMoneda $tipoMoneda */
        $tipoMoneda = TipoMoneda::find($id);

        if (empty($tipoMoneda)) {
            flash()->error('Tipo Moneda no encontrado');

            return redirect(route('tipoMonedas.index'));
        }

        return view('tipo_monedas.edit')->with('tipoMoneda', $tipoMoneda);
    }

    /**
     * Update the specified TipoMoneda in storage.
     */
    public function update($id, UpdateTipoMonedaRequest $request)
    {
        /** @var TipoMoneda $tipoMoneda */
        $tipoMoneda = TipoMoneda::find($id);

        if (empty($tipoMoneda)) {
            flash()->error('Tipo Moneda no encontrado');

            return redirect(route('tipoMonedas.index'));
        }

        $tipoMoneda->fill($request->all());
        $tipoMoneda->save();

        flash()->success('Tipo Moneda actualizado.');

        return redirect(route('tipoMonedas.index'));
    }

    /**
     * Remove the specified TipoMoneda from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var TipoMoneda $tipoMoneda */
        $tipoMoneda = TipoMoneda::find($id);

        if (empty($tipoMoneda)) {
            flash()->error('Tipo Moneda no encontrado');

            return redirect(route('tipoMonedas.index'));
        }

        $tipoMoneda->delete();

        flash()->success('Tipo Moneda eliminado.');

        return redirect(route('tipoMonedas.index'));
    }
}
