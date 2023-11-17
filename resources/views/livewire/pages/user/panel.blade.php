@push('css')
  <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@endpush


<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
</div>

@push('js')
<script>
  var picker = new Pikaday(
      {
          field: document.getElementById('myDate'),
          onSelect: function() {
              var data = this.getDate();
              @this.set('myDate', data);
          }
      });
</script>
@endpush