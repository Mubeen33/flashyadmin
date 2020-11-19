@if(session()->has('success'))
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('success') }}
</div>
@endif

@if(session()->has('contactMsg'))
<div class="alert alert-success">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('contactMsg') }}
</div>
@endif

@if(session()->has('error'))
<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    {{ session()->get('error') }}
</div>
@endif


@if ($errors->any())
<div class="alert alert-danger">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>

    @foreach ($errors->all() as $error)
       <p> {{ $error }} </p>
    @endforeach

</div>
@endif



<div id="display--success--msg" class="d-none">
  <div class="alert alert-success">
    <a href="#" class="close" data-dismiss="alert" aria-label="close"
      onclick="window.location.reload(true)">&times;</a>
    <span class="place-text"></span>
  </div>
</div>