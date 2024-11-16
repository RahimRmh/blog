
<div {{$attributes}}>
    <main role="main" class="container">
        <div class="row">
          <div class="col-md-8 blog-main">
             
              <div class="blog-post mb-3">
                  <h2 class="blog-post title">
                      {{$post->title }} 
                  </h2>
             
                 
                  <p class="blog-post meta"> writting by {{$post->author}}
                  {{ (carbon\carbon::parse($post->created_at) ->diffForHumans())}}
                  </p>
                 <p>
                  {{$post->body }} 
                 </p>
              </div>
            
          
           