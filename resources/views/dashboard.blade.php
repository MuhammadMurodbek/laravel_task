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
