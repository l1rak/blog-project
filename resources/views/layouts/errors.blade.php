@if (count($errors))
    <div  class="alert alert-danger" role="alert">
        <div class="form-group">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
