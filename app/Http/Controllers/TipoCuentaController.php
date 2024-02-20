<?php

namespace App\Http\Controllers;

use App\DataTables\TipoCuentaDataTable;
use App\Http\Requests\CreateTipoCuentaRequest;
use App\Http\Requests\UpdateTipoCuentaRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class TipoCuentaController extends AppBaseController
{

    public function __construct()
    {
        $this->middleware('permission:Ver Tipo Cuentas')->only('show');
        $this->middleware('permission:Crear Tipo Cuentas')->only(['create','store']);
        $this->middleware('permission:Editar Tipo Cuentas')->only(['edit','update']);
        $this->middleware('permission:Eliminar Tipo Cuentas')->only('destroy');
    }
    /**
     * Display a listing of the TipoCuenta.
     */
    public function index(TipoCuentaDataTable $tipoCuentaDataTable)
    {
    return $tipoCuentaDataTable->render('tipo_cuentas.index');
    }


    /**
     * Show the form for creating a new TipoCuenta.
     */
    public function create()
    {
        return view('tipo_cuentas.create');
    }

    /**
     * Store a newly created TipoCuenta in storage.
     */
    public function store(CreateTipoCuentaRequest $request)
    {
        $input = $request->all();

        /** @var TipoCuenta $tipoCuenta */
        $tipoCuenta = TipoCuenta::create($input);

        flash()->success('Tipo Cuenta guardado.');

        return redirect(route('tipoCuentas.index'));
    }

    /**
     * Display the specified TipoCuenta.
     */
    public function show($id)
    {
        /** @var TipoCuenta $tipoCuenta */
        $tipoCuenta = TipoCuenta::find($id);

        if (empty($tipoCuenta)) {
            flash()->error('Tipo Cuenta no encontrado');

            return redirect(route('tipoCuentas.index'));
        }

        return view('tipo_cuentas.show')->with('tipoCuenta', $tipoCuenta);
    }

    /**
     * Show the form for editing the specified TipoCuenta.
     */
    public function edit($id)
    {
        /** @var TipoCuenta $tipoCuenta */
        $tipoCuenta = TipoCuenta::find($id);

        if (empty($tipoCuenta)) {
            flash()->error('Tipo Cuenta no encontrado');

            return redirect(route('tipoCuentas.index'));
        }

        return view('tipo_cuentas.edit')->with('tipoCuenta', $tipoCuenta);
    }

    /**
     * Update the specified TipoCuenta in storage.
     */
    public function update($id, UpdateTipoCuentaRequest $request)
    {
        /** @var TipoCuenta $tipoCuenta */
        $tipoCuenta = TipoCuenta::find($id);

        if (empty($tipoCuenta)) {
            flash()->error('Tipo Cuenta no encontrado');

            return redirect(route('tipoCuentas.index'));
        }

        $tipoCuenta->fill($request->all());
        $tipoCuenta->save();

        flash()->success('Tipo Cuenta actualizado.');

        return redirect(route('tipoCuentas.index'));
    }

    /**
     * Remove the specified TipoCuenta from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        /** @var TipoCuenta $tipoCuenta */
        $tipoCuenta = TipoCuenta::find($id);

        if (empty($tipoCuenta)) {
            flash()->error('Tipo Cuenta no encontrado');

            return redirect(route('tipoCuentas.index'));
        }

        $tipoCuenta->delete();

        flash()->success('Tipo Cuenta eliminado.');

        return redirect(route('tipoCuentas.index'));
    }
}
