@if (Session::has('success'))
    <div  class="alert alert-success" style="background-color: #4be54b ">
        {{ Session::get('success') }}
    </div>
@endif
@if (Session::has('info'))
    <div class="alert alert-info">
        {{ Session::get('info') }}
    </div>
@endif
@if (Session::has('warning'))
    <div class="alert alert-warning">
        {{ Session::get('warning') }}
    </div>
@endif
@if (Session::has('erorr'))
    <div class="alert alert-danger">
        {{ Session::get('erorr') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
    .alert {
        text-align: center;
        font-size: 1rem;
    }

    .is-invalid {
        border-color: red !important;
    }

    .invalid-feedback {
        color: red !important;
    }

</style>
