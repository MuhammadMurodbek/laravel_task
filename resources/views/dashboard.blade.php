<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        @if (auth()->user()->role->id == 1)
            <div>
                @foreach ($applications as $list)
                    <div class='flex justify-center my-3'>
                        <div class="rounded-xl border p-5 shadow-md w-9/12 bg-white">
                            <div class="flex w-full items-center justify-between border-b pb-3">
                                <div class="flex items-center space-x-3">
                                    <div class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                    </div>
                                    <div class="text-lg font-bold text-slate-700">{{ $list->subject }}</div>
                                </div>
                                <div class="flex items-center space-x-8">
                                    <button class="rounded-2xl border bg-neutral-100 px-3 py-1 text-xs font-semibold">ID:
                                        {{ $list->id }}</button>
                                    <div class="text-xs text-neutral-500">{{ $list->created_at }}</div>
                                </div>
                            </div>
                            <div class="flex justify-center">
                                <div class="mt-4 mb-6">
                                    <div class="mb-3 text-xl font-bold">Nulla sed leo tempus, feugiat velit vel, rhoncus
                                        neque?
                                    </div>
                                    <div class="text-sm text-neutral-600">{{ $list->message }}</div>
                                </div>
                                <div>
                                    <a href="{{ asset($list->file_url) }}">Link</a>
                                </div>
                            </div>


                            <div>
                                <div class="flex items-center justify-between text-slate-500">
                                    gmail@gmail.com
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $applications->links() }}
            </div>
        @else
            <div class="flex flex-col items-center justify-center px-12 py-5">
                @if (session()->has('error'))
                    <div
                        class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-red-700 bg-red-100 border border-red-300 ">
                        <div slot="avatar">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-alert-octagon w-5 h-5 mx-2">
                                <polygon
                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                </polygon>
                                <line x1="12" y1="8" x2="12" y2="12"></line>
                                <line x1="12" y1="16" x2="12.01" y2="16"></line>
                            </svg>
                        </div>
                        <div class="text-xl font-normal  max-w-full flex-initial">
                            {{ session()->get('error') }}</div>
                        <div class="flex flex-auto flex-row-reverse">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"
                                    class="feather feather-x cursor-pointer hover:text-red-400 rounded-full w-5 h-5 ml-2">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                            </div>
                        </div>
                    </div>
                @endif
                <p class="mb-4 font-semibold text-xl px-8 py-2 rounded-md">Submit your
                    application</p>
                <div class="mx-auto w-full max-w-[550px]">
                    <form action="{{ route('applications.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-5">
                            <input type="text" name="subject" id="name" placeholder="Subject..."
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('subject')
                                <div class="text-red-500 text-xs italic">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <textarea rows="6" placeholder="Message..." name="message"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
                            @error('message')
                                <div class="text-red-500 text-xs italic">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <input type="file" name="file" id="subject" placeholder="Enter your subject"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-2 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                            @error('file')
                                <div class="text-red-500 text-xs italic">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <button
                                class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
