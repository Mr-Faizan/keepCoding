<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // List all the projects
        $projects = Project::all(); // Assuming you have a Project model

        return view('projects', compact('projects'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        dd($request->all());

        // Validate the form data
        $validatedData = $request->validate([
            'name' => 'required|max:191',
            'description' => 'required',
            'status' => 'nullable|in:1,0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Assuming image is uploaded as a file

        ]);

        // Handle the image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('project_images', 'public');
            // Here, 'project_images' is the folder where the image will be stored in the storage/app/public directory.
            // You may need to create this folder manually.
            // You can modify the folder name and storage disk as per your requirements.
        } else {
            // Handle case when no image is uploaded
            $imagePath = null;
        }

        // Save the project data to the database
        $project = new Project();
        $project->name = $validatedData['name'];
        $project->description = $validatedData['description'];
        $project->status = $validatedData['status'] ?? 1; // Set default status to 1 if not provided
        $project->image = $imagePath;
        $project->user_id = auth()->user()->id;
        $project->save();

        // Redirect to the dashboard or any other desired route
        return redirect()->route('projects')->with('success', 'Project created successfully!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
