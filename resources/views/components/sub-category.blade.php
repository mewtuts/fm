@props(['category'])

<div class="col-span-2 mt-2 p-2 rounded bg-slate-100">
    <!--Parent Folder-->
    @if ($category->parent_id === null)
        <div class="w-full ml-2 rounded pl-3 pr-6 py-2 bg-slate-300 cursor-pointer text-zinc-800 text-lg" onclick="changIcon(this)">
            <i class="bi bi-folder-fill text-orange-300 text-xl pr-2"></i>
            {{ $category->title }}
        </div>
    @else
        <div class="w-full ml-2 rounded pl-3 pr-6 py-2 bg-slate-300 cursor-pointer text-zinc-800 text-lg" onclick="changIcon(this)">
            <input class="" type="radio" name="id" value="{{ $category->id }}folder">
            <i class="bi bi-folder-fill text-orange-300 text-xl pr-2"></i>
            {{ $category->title }}
        </div>
    @endif
    <!--END Parent Folder-->

    <!--Uploaded files-->
    @foreach ($category->getFiles as $file)

        <div class='ml-5 mt-1 cursor-pointer p-2 hover:bg-slate-300 rounded w-full text-zinc-600 border-b-2'>
            @if ($file->file_type == 'jpeg' || $file->file_type == 'jpg' || $file->file_type == 'png' || $file->file_type == 'gif')
                <input class="" type="radio" name="id" value="{{ $file->id }}file">
                <i class="bi bi-file-earmark-image text-green-800 text-xl pr-2"></i>
            @else
                <input class="" type="radio" name="id" value="{{ $file->id }}file">
                <i class="bi bi-file-earmark-fill text-green-800 text-xl pr-2"></i>
            @endif

            <a href="{{ '/users/viewFile/'.$category->title.'/'.$file->id }}" target="_blank"> {{ $file->file_name }}</a>
            {{-- <a title="Download" ref="{{ '/users/downloadFile/'. $category->title  .'/'.  $file->id }}"> {{ $file->file_name }} </a>  --}}
        </div>

        <!-- {{-- <div class='ml-3 hover:text-blue-800 hover:underline'><a href="{{ '/users/viewFile/'.$file->id }}"> {{ $file->file_name }}</a></div>  --}} -->

        <!-- <div class='ml-3 hover:text-blue-800 hover:underline'><a href="https://docs.google.com/gview?url={{ asset("storage/app/".$category->title."/".$file->file_name.'_'.Session::get('user_id').".".$file->file_type) }}&embedded=true" target="_blank"> file: {{ $file->file_name }}</a></div>  -->
    @endforeach
    <!--END Uploaded files-->

    <!--Sub folder-->
    @foreach ($category->children as $child)

        <div class="ml-7">

            <x-sub-category :category="$child" />

        </div>

    @endforeach
    <!--END Sub folder-->

</div>

<!-- <script>
    changIcon = (icon) =>icon.classList.toggle("bi-caret-down-fill");
</script> -->
