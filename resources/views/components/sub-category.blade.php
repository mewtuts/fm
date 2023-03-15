@props(['category'])

<div class="mt-2 p-2 rounded bg-slate-100">
    // Parent Folder
    <div class="w-fit flex justify-center items-center ml-2 rounded pl-3 pr-6 py-2 bg-slate-200 hover:bg-slate-300 cursor-pointer text-zinc-800 text-lg" onclick="changIcon(this)">
        <i class="bi bi-caret-right-fill text-zinc-700 pr-1"></i>
        <i class="bi bi-folder-fill text-orange-300 text-xl pr-2"></i>
        {{ $category->title }} ({{ $category->id }})
    </div>
    // END Parent Folder

    // Uploaded files
    @foreach ($category->getFiles as $file)
        <div class='ml-3 hover:text-blue-800 hover:underline'><a href="https://docs.google.com/gview?url={{ asset("storage/app/".$category->title.Session::get('user_id')."/".$file->file_name.".".$file->file_type) }}&embedded=true" target="_blank"> file: {{ $file->file_name }}</a></div> 
    @endforeach
    // END Uploaded files

    // Sub folder
    @foreach ($category->children as $child)

        <div class="ml-7">

            <x-sub-category :category="$child" />
                    
        </div>
                
    @endforeach
    // END Sub folder
    
</div>

<!-- <script>
    changIcon = (icon) =>icon.classList.toggle("bi-caret-down-fill");
</script> -->
