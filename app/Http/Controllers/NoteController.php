<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NoteController extends Controller
{
    public function index() { 
        
        $notes = Note::orderBy('id','DESC')->paginate(10);

        return view('note.list',['notes' => $notes]);

    }
    public function create() {
        return view('note.create');
    }

    public function store (Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'min:8'],
            'title' =>  ['required', 'string', 'min:8'],
            'content' =>  ['required', 'string', 'min:8']
        ]);
        if ( $validator->passes() ) {
            $note = Note::create($request->post());
            return redirect()->route('note.index')->with('success','Employee added successfully.');
        }else {
            return redirect()->route('note.create')->withErrors($validator)->withInput();
        }
    }

    public function edit (Note $note) {
        
          //$note = Note::find($note->id);       
          return view('note.edit',['note' => $note]);
    }

    public function update(Note $note, Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => ['required', 'string', 'min:8'],
            'title' =>  ['required', 'string', 'min:8'],
            'content' =>  ['required', 'string', 'min:8']
        ]);
        if($validator->passes()) {
            $note->fill($request->post())->save();
            return redirect()->route('note.index')->with('success','Note updated successfully.');
        }else {

            return redirect()->route('note.edit',$note->id)->withErrors($validator)->withInput();
        } 
    }
    public function destroy(Note $note, Request $request) {
        $note->delete();   
        return redirect()->route('note.index')->with('success',"삭제 성공");
    }
}
