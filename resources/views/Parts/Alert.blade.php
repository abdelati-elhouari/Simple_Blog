<style> @import "{{ asset('css/alert.css') }}"; </style>
@if(session('success'))
        <div class="alert success" id="alert">
                {{ session('success') }}
            </div>
            @endif
    @if(session('error'))
        <div class="alert error" id="alert">
                {{ session('error') }}
            </div>
    @endif

    <script>
        var alertBox = document.getElementById('alert');
if(alertBox){
    setTimeout(function() {
      alertBox.style.display = 'none';
    }, 2000);
  }
  
    </script>