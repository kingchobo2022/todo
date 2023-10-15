<div class="container content py-6 mx-auto">
        <div class="mx-auto">
            <div id="create-form" class="hover:shadow p-6 bg-white border-pink-500 border-t-4">
                <div class="flex">
                    <h2 class="font-semibold text-lg text-gray-800 mb-5 border-blue-300 border-b-4">새로운 할 일</h2>
                </div>
                <div>
                    <form>
                        <div class="mb-6">
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">*
                                할 일 </label>
                            <input wire:model="subject" type="text" id="title" placeholder="할 일을 입력해 주세요."
                                class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">
                            @error('subject')
                            <span class="text-red-500 text-xs mt-3 block">{{ $message }}</span>
                            @enderror

                        </div>
                        <button wire:click.prevent="add" type="submit"
                            class="px-4 py-2 bg-pink-500 text-white font-semibold rounded hover:bg-pink-700">등록
                            </button>
                        @if(session()->has('success'))
                        <span class="text-blue-500 text-xs">{{ session('success') }}</span>
                        @endif


                    </form>
                </div>
            </div>
        </div>
    </div>