<div class="modal" tabindex="-1" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Do you want to delete the data?</p>
            </div>
            <form action="" method="POST" id="deleteForm">
                @csrf
                @method('DELETE')
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i> Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var deleteModal = document.getElementById('deleteModal');
    deleteModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var url = button.getAttribute('data-url');
        var formModal = document.getElementById('deleteForm');
        formModal.setAttribute('action', url);
    });
</script>