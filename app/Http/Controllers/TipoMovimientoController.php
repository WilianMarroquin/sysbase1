<?php

namespace App\Http\Controllers;

use App\DataTables\TipoMovimientoDataTable;
use App\Http\Requests\CreateTipoMovimientoRequest;
use App\Http\Requests\UpdateTipoMovimientoRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\TipoMovimiento;
use Illuminate\Http\Request;

class TipoMovimientoController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Tipo Movimientos')->only('show');
        $this->middleware('permission:Crear Tipo Movimientos')->only(['create','store']);
        $this->middleware('permission:Editar Tipo Movimientos')->only(['edit','update']);
        $this->middleware('permission:Eliminar Tipo Movimientos')->only('destroy');
    }
    /**
     * Display a listing of the TipoMovimiento.
     */
    public function index(TipoMovimientoDataTable $tipoMovimientoDataTable)
    {
    return $tipoMovimientoDataTable->render('tipo_movimientos.index');
    }


    /**
     * Show the form for creating a new TipoMovimiento.
     */
    public function create()
    {
        return view('tipo_movimientos.create');
    }

    /**
     * Store a newly created TipoMovimiento in storage.
     */
    public function store(CreateTipoMovimientoRequest $request)
    {
        $input = $request->all();

        /** @var TipoMovimiento $tipoMovimiento */
        $tipoMovimiento = TipoMovimiento::create($input);

        flash()->success('Tipo Movimiento guardado.');

        return redirect(route('tipoMovimientos.index'));
    }

    /**
     * Display the specified TipoMovimiento.
     */
    public function show($id)
    {
        /** @var TipoMovimiento $tipoMovimiento */
        $tipoMovimiento = TipoMovimiento::find($id);

        if (empty($tipoMovimiento)) {
            flash()->error('Tipo Movimiento no encontrado');

            return redirect(route('tipoMovimientos.index'));
        }

        return view('tipo_movimientos.show')->with('tipoMovimiento', $tipoMovimiento);
    }

    /**
     * Show the form for editing the specified TipoMovimiento.
     */
    public function edit($id)
    {
        /** @var TipoMovimiento $tipoMovimiento */
        $tipoMovimiento = TipoMovimiento::find($id);

        if (empty($tipoMovimiento)) {
            flash()->error('Tipo Movimiento no encontrado');

            return redirect(route('tipoMovimientos.index'));
        }

        return view('tipo_movimientos.edit')->with('tipoMovimiento', $tipoMovimiento);
    }

    /**
     * Update the specified TipoMovimiento in storage.
     */
    public function update($id, UpdateTipoMovimientoRequest $request)
    {
        /** @var TipoMovimiento $tipoMovimiento */
        $tipoMovimiento = TipoMovimiento::find($id);

        if (empty($tipoMovimiento)) {
            flash()->error('Tipo Movimiento no encontrado');

            return redirect(route('tipoMovimientos.index'));
        }

        $tipoMovimiento->fill($request->all());
        $tipoMovimiento->save();

        flash()->success('Tipo Movimiento actualizado.');

        return redirect(route('tipoMovimientos.index'));
    }

    /**
     * Remove the specified TipoMovimiento from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var TipoMovimiento $tipoMovimiento */
        $tipoMovimiento = TipoMovimiento::find($id);

        if (empty($tipoMovimiento)) {
            flash()->error('Tipo Movimiento no encontrado');

            return redirect(route('tipoMovimientos.index'));
        }

        $tipoMovimiento->delete();

        flash()->success('Tipo Movimiento eliminado.');

        return redirect(route('tipoMovimientos.index'));
    }
}
