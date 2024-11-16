<x-layout>
<body>
   
    <form action="/posts" method="post">
    <x-forms/>
    <button type="submit" class="btn btn-primary">save</button>
   </form>
   {{-- @if($errors->any())
   <div>
    <ul>
        @foreach ($errors->all() as $error)
       
        <li>{{$error}}</li>
       @endforeach
     
    </ul>
  
   </div>
   @endif --}}
    
  

    
</body>
</x-layout>
