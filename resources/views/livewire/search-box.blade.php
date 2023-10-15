<div id="search-box" class="flex flex-col items-center px-2 my-4 justify-center">
    <div class="flex justify-center items-center">

        검색: <input wire:model.live.debounce.500ms="search" type="text" placeholder="검색어를 입력해 주세요."
            class="bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100" />
    </div>

</div>