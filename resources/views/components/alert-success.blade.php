
  @if (session()->has('success'))
        <div class="alert alert-success">
            <strong>{{ session('success')}}</strong>
        </div>
    @endif