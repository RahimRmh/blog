<x-layout>
<body>
   
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @method('PATCH')
    <x-forms :post="$post" />
    <button type="submit" class="btn btn-primary">edit</button>
</form>
    
  

    
</body>
</x-layout>