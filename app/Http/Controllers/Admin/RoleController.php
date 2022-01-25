<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Support\Facades\Session;
use App\Authorizable;

class RoleController extends Controller
{
    // use Authorizable;

    public function __construct() {
        // parent::__construct();

        $this->data['currentAdminMenu'] = 'role-user';
        $this->data['currentAdminSubMenu'] = 'role';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['roles'] = Role::all();
        $this->data['permissions'] = Permission::all();

        return view('admin.roles.index', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required|unique:roles']);

        if (Role::create($request->only('name'))) {
            Session::flash('successs', 'New role added.');
        }

        return redirect('admin/roles');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Session::flash('success', $role->name . ' permissions has been updated.');

        if ($role->name == 'Admin') {
            $role->syncPermissions(Permission::all());

            return redirect('admin/roles');
        }

        $permissions = $request->get('permissions', []);

        $role->syncPermissions($permissions);

        return redirect('admin/roles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
