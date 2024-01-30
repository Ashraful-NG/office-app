<div>
    @if (session()->has('message'))
        @php
            $alertType = 'warning';
            if (session()->has('type')) {
                if (session('type') == 'Success') {
                    $alertType = 'success';
                } elseif (session('type') == 'Warning') {
                    $alertType = 'warning';
                } elseif (session('type') == 'Danger') {
                    $alertType = 'danger';
                } elseif (session('type') == 'Failed') {
                    $alertType = 'danger';
                } elseif (session('type') == 'Info') {
                    $alertType = 'info';
                }
            }
        @endphp
        <div id="auto-close-alert" class="alert close alert-{{ $alertType }} alert-dismissible fade show my-2"
            role="alert">
            @if (session()->has('type'))
                <strong>{{ session('type') }} : </strong>
            @endif
            {{ session('message') ?? '' }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var alertElement = document.getElementById('auto-close-alert');
                if (alertElement) {
                    setTimeout(function() {
                        alertElement.classList.remove('show');
                        alertElement.classList.add('hide');
                        setTimeout(function() {
                            alertElement.remove();
                        }, 500);
                    }, 10000);
                }
            });
        </script>
    @endif
</div>
