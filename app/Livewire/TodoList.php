<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    public $subject; 
    public $search = "";
    public $currentTodoId;
    public $currentTodoSubject;

    public function update() {
        $this->validate( ['currentTodoSubject' => 'required|min:4|max:40'] );
        Todo::find($this->currentTodoId)->update(['subject' => $this->currentTodoSubject]);
        $this->cancelEdit();
    }


    public function cancelEdit() {
        $this->reset('currentTodoId', 'currentTodoSubject');
    }

    public function edit($todoid) {
        $this->currentTodoId = $todoid;
        $this->currentTodoSubject = Todo::find($todoid)->subject;
    }

    public function add() {
        $validated = $this->validate([
            'subject' => 'required|min:4|max:40'
        ]);

        Todo::create($validated);
        $this->reset('subject');
        session()->flash('success', '저장되었습니다.');
    }

    public function toggle($todoid) {
        $todo = Todo::find($todoid);
        $todo->completed = !$todo->completed;
        $todo->save();
    }

    public function delete($todoid) {
        try {
            Todo::findOrfail($todoid)->delete();
        } catch (Exception $e) {
            session()->flash('error', '이미 삭제된 데이터일 수 있습니다.');
            return;
        }
    }

    public function render()
    {
        //$todos = Todo::all();
        //$todos = Todo::latest()->get(); // 최근글
        //$todos = Todo::latest()->paginate(4); 
        $todos = Todo::latest()->where('subject', 'like', '%'.$this->search.'%')->paginate(4); 

        return view('livewire.todo-list', ['todos' => $todos]); 
    }
}
