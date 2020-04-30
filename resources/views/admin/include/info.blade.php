					@if(session('info'))
                    <div class="alert alert-info">
                      <h4 class="alert-heading">Info!</h4>
                      {{ session('info') }}
                    </div>
                    @endif