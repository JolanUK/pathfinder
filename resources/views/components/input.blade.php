<div>
    <div>
        <label class="block text-sm/6 font-medium text-gray-900 dark:text-white" for="{{ $name }}">{{ \Illuminate\Support\Str::of($name)->kebab()->replace('-', ' ')->ucfirst() }}</label>
    </div>

    <div class="mt-2">
        <input class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6 dark:bg-white/5 dark:text-white dark:outline-white/10 dark:placeholder:text-gray-500 dark:focus:outline-indigo-500" type="text" wire:model="{{ $name }}">
    </div>

    @error($name)
        <div class="mt-2 text-red-500 text-sm">
            {{ $message }}
        </div>
    @enderror
</div>