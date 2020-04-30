                    @if(count($errors)>0)
                    <div class="alert alert-danger">
                      <h4 class="alert-heading">Error!</h4>
                      @foreach($errors->all() as $error)

                      <a >
                      {{$error}}
                      </a>
                      @endforeach
                    
                    </div>
                    @endif