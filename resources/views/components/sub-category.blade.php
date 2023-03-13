@props(['category'])

<div>
    {{ $category->title }} ({{ $category->id }})

    @foreach ($category->getFiles as $file)
        <div class='ml-3'> file: {{ $file->file_name }} </div> 
    @endforeach

    @foreach ($category->children as $child)

        <div class="ml-7">

            <x-sub-category :category="$child" />
                    
        </div>
                
    @endforeach

</div>
