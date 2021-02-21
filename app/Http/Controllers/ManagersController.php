<?php

namespace App\Http\Controllers;

use App\{Manager, Author, Division, User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ManagerRequest;

class ManagersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $founders = Manager::where(['division_id' => 1, 'is_alumni' => false])->get();
        $managing_editors = Manager::where(['division_id' => 5, 'is_alumni' => false])->get();
        $inhouse_editors = Manager::where(['division_id' => 6, 'is_alumni' => false])->get();
        $editors = Manager::where(['division_id' => 2, 'is_alumni' => false])->get();
        $comm_officers = Manager::where(['division_id' => 3, 'is_alumni' => false])->get();
        $advisors = Manager::where(['division_id' => 4, 'is_alumni' => false])->get();
        $alumni = Manager::where(['is_alumni' => true])->get();
        $breakers = Author::orderBy('first_name')->paginate(10);
        $paginated = Input::get('page');
return $inhouse_editors;
        return view('pages.presentation.team', compact('founders', 'editors', 'managing_editors', 'inhouse_editors', 'comm_officers', 'advisors', 'breakers', 'paginated', 'alumni'));
    }

    public function admins()
    {
        $admins = User::whereNotIn('last_name', ['Caine', 'Villar'])->get();
        return view('admin/pages/managers/permissions', compact('admins'));
    }

    public function permissions(User $user)
    {
        $user->is_authorized = ! $user->is_authorized;
        
        $user->save();

        return redirect()->back()->with('db_feedback', $user->full_name.' has been successfully authorized!');
    }

    // CREATE
    public function create()
    {
        $divisions = Division::all();
        return view('admin/pages/managers/add', compact('divisions'));
    }

    public function store(Request $request)
    {
        ManagerRequest::get()->save();
        return redirect()->back()->with('db_feedback', $request->first_name.' '.$request->last_name.' has been successfully added to the team!');
    }

    // READ
    public function show(Manager $member)
    {
        return view('pages/manager', compact('member'));
    }

    // UPDATE
    public function selectEdit()
    {
        $managers = Manager::orderBy('first_name')->get();
        return view('admin/pages/managers/selectEdit', compact(['managers']));        
    }

    public function edit(Manager $manager)
    {
        $divisions = Division::all();
        $managers = Manager::orderBy('first_name')->get();
        return view('admin/pages/managers/edit', compact(['manager', 'divisions', 'managers']));
    }

    public function update(Request $request, Manager $manager)
    {
        ManagerRequest::get()->update($manager);
        return redirect("admin/managers/$manager->slug/edit")->with('db_feedback', $manager->first_name.'\'s profile has been updated');
    }

    // DELETE
    public function selectDelete()
    {
        $managers = Manager::orderBy('first_name')->get();
        return view('admin/pages/managers/selectDelete', compact(['managers']));          
    }

    public function destroy(Manager $manager)
    {
        File::deleteDirectory("storage/app/managers/avatars/$manager->slug");
        $manager->delete();
        return redirect()->back()->with('db_feedback', 'The team member has been removed from the database');
    }

}
