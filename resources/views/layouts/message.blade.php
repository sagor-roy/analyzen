@if (Session::has('message'))
    <div
        class="alert mt-2 
              @if (Session::has('type')) @if (Session::get('type') == 'success')
              alert-success
                  @elseif (Session::get('type') == 'warning')
                  alert-warning
                  @elseif (Session::get('type') == 'error')
                  alert-danger @endif
              @endif
              ">
        {{ Session::get('message') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger mt-3">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
