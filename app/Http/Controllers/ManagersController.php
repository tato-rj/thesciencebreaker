<?php

namespace App\Http\Controllers;

use App\Manager;
use App\Author;
use App\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Validators\ValidateManager;
use Illuminate\Support\Facades\Input;

class ManagersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $founders = Manager::where('division_id', 1)->get();
        $editors = Manager::where('division_id', 2)->get();
        $comm_officers = Manager::where('division_id', 3)->get();
        $advisors = Manager::where('division_id', 4)->get();
        $breakers = Author::orderBy('first_name')->paginate(10);
        $paginated = Input::get('page');

        return view('pages.presentation.team', compact('founders', 'editors', 'comm_officers', 'advisors', 'breakers', 'paginated'));
    }

    // CREATE
    public function create()
    {
        $divisions = Division::all();
        return view('admin/pages/managers/add', compact('divisions'));
    }

    public function store(Request $request)
    {
        ValidateManager::createCheck($request);
        Manager::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'slug' => str_slug($request->first_name.' '.$request->last_name),
            'email' => $request->email,
            'division_id' => $request->division_id,
            'position' => $request->position,
            'biography' => $request->biography,
            'research_institute' => $request->research_institute,
            'is_editor' => $request->is_editor
        ]);

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
        ValidateManager::editCheck($request);
        $manager->update($request->all());
        $manager->update(['slug' => str_slug($request->first_name.' '.$request->last_name)]);
        return redirect()->back()->with('db_feedback', $manager->first_name.'\'s profile has been updated');
    }

    // DELETE
    public function selectDelete()
    {
        $managers = Manager::orderBy('first_name')->get();
        return view('admin/pages/managers/selectDelete', compact(['managers']));          
    }

    public function destroy(Manager $manager)
    {
        $manager->delete();
        return redirect()->back()->with('db_feedback', 'The team member has been removed from the database');
    }
}
