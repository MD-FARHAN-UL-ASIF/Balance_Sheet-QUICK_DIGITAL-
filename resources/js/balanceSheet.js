document.addEventListener('DOMContentLoaded', function() {
    Alpine.data('deleteModal', {
        isOpen: false,
        deleteId: null,
        openModal(id) {
            this.isOpen = true;
            this.deleteId = id;
        },
        closeModal() {
            this.isOpen = false;
            this.deleteId = null;
        },
        deleteEntry() {
            const deleteForm = document.getElementById(`delete-form-${this.deleteId}`);
            deleteForm.submit();
        }
    });
});
