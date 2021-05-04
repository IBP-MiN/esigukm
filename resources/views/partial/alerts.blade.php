@if(session('success'))
<div class="alert alert-success" role="alert">
    {{session('success') }}
  </div>
@endif

@if(session('warning'))
<div class="alert alert-danger" role="alert">
    {{session('warning') }}
  </div>
@endif

<script>
    $(".alert").fadeTo(2000, 800).slideUp(1000, function(){
    $(".alert").slideUp(1000);
});
</script>

<script>
    $(".success").fadeTo(2000, 800).slideUp(1000, function(){
    $(".success").slideUp(1000);
});
</script>