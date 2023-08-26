
<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('openConfirmModal', () => {
            Swal.fire({
                title: 'Are you sure',
                text: 'This action wont be revered',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, proceed!'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emit('confirm');
                }
            });
        });
    });
</script>

