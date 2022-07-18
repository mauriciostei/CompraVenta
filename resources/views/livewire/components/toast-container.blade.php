<div class="toast-container position-absolute top-0 end-0 p-3 z-index-2" id="toastContainer">
    @if ($message = Session::get('toastMensaje'))
        <div class="toast fade" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true">
            <div class="toast-header">
                <span class="text-success">
                    <i class="bi bi-check-lg"></i>
                </span>
                <strong class="me-auto">Mensaje</strong>
                <small class="text-muted">Justo Ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                {{$message}}
            </div>
        </div>
    @endif
</div>
