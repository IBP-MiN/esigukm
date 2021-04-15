@if(session('success'))
<div class="alert alert-success" role="alert">
    {{session('success') }}
  </div>
@endif

@if(session('warning'))
<div class="alert alert-warning" role="alert">
    {{session('warning') }}
  </div>
@endif

<script>
    $(".alert").fadeTo(2000, 500).slideUp(700, function(){
    $(".alert").slideUp(1000);
});
</script>

<script>
    $(".success").fadeTo(2000, 500).slideUp(700, function(){
    $(".success").slideUp(1000);
});
</script>