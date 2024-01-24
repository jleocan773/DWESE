<?php if (isset($this->mensaje)): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>MENSAJE:&nbsp;</strong>
        <?= $this->mensaje; ?>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>
