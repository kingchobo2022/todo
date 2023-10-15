<div>

    @if(session()->has('error'))
    <div role="alert" class="mt-2">
        <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            알림
            </div>
        <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{ session('error') }}</p>
        </div>
    </div>
    @endif



    @include('livewire.add-todo-box')
    @include('livewire.search-box')
    <div id="todos-list">
        @foreach ($todos as $todo)
            @include('livewire.todo-card')
        @endforeach
        <div class="my-2">
            <!-- 페이지네이션 위치 -->
            {{ $todos->links()  }}
        </div>
    </div>
</div>
