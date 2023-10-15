<div wire:key="{{ $todo->id }}" class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-pink-500 hover:shadow">
    <div class="flex justify-between space-x-2">
        
        <div class="flex">
          @if($todo->completed)
          <input type="checkbox" class="me-1" checked wire:click="toggle({{ $todo->id }})">
          @else
          <input type="checkbox" class="me-1" wire:click="toggle({{ $todo->id }})">
          @endif
          
          @if($currentTodoId == $todo->id)
          <div>
        <input wire:model="currentTodoSubject" type="text" placeholder="Todo.."
                    class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5"
                    >
                    @error('currentTodoSubject')
                    <span class="text-red-500 text-xs block">{{ $message }}</span>
                    @enderror
          </div>         
          @else
          <h3 class="text-slate-900">{{ $todo->subject }}</h3>
          @endif   
          
        </div>


        <div class="flex items-center space-x-2">
            <button wire:click="edit({{ $todo->id }})" class="border rounded px-2 py-1 bg-blue-400 text-white text-xs hover:bg-blue-700">
                수정
            </button>
            <button wire:click="delete({{ $todo->id }})" class="border rounded px-2 py-1 bg-pink-600 text-white text-xs hover:bg-pink-800 mr-1">
                삭제
            </button>
        </div>
    </div>
    <span class="text-xs text-gray-500"> {{ $todo->created_at  }} </span>
    <div class="mt-3 text-xs text-gray-700">
        @if ($currentTodoId == $todo->id)                 
        <button wire:click="update"  class="mt-3 px-4 py-2 bg-slate-400 text-white font-semibold rounded hover:bg-slate-600">Update</button>
        <button wire:click="cancelEdit" class="mt-3 px-4 py-2 bg-pink-400 text-white font-semibold rounded hover:bg-pink-600">Cancel</button>
        @endif   

    </div>
</div>
