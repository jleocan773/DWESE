<?php if (isset($this->mensaje)): ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
        <div class="me-auto">
            <strong>MENSAJE:&nbsp;</strong>
            <?= $this->mensaje; ?>.
        </div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
