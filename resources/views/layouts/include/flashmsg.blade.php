@if(session()->has('success'))
<div class="alert alert-success alert-dismissible alert-msg">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-check"></i> Success!</h5>
    {!! session()->get('success') !!}
</div>
@endif


@if(session()->has('error'))
<div class="alert alert-danger alert-dismissible alert-msg">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fas fa-ban"></i> Error!</h5>
    {!! session()->get('error') !!}
</div>

@endif