<div wire:poll.1000ms>
    
    <div class="card rounded-3 shadow">
        <div class="card-body text-center">

            <div class="d-flex flex-row-reverse">
                <span class="text-muted">Compra total Hoy</span>
            </div>

            <div class="p-4 text-warning font-weight-bold">
                <h4>
                    {{number_format($compras)}} GS.
                </h4>
            </div>

        </div>
    </div>

</div>
