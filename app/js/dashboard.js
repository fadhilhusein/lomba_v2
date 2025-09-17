document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('datatablesSimple');

    table.addEventListener('click', function (event) {
        const targetButton = event.target.closest('.delete-btn');

        if (targetButton) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kode AJAX untuk menghapus data dari database
                    const articleId = targetButton.dataset.id;
                    fetch('delete.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: articleId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire(
                                    'Dihapus!',
                                    'Data telah dihapus.',
                                    'success'
                                );
                                // Hapus baris dari tabel
                                targetButton.closest('tr').remove();
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                            }
                        });
                }
            });
        }
    });
});
document.addEventListener('DOMContentLoaded', function () {
    const table = document.getElementById('datatablesSimple');

    table.addEventListener('click', function (event) {
        const targetButton = event.target.closest('.delete-btn');

        if (targetButton) {
            Swal.fire({
                title: 'Apakah kamu yakin?',
                text: "Anda tidak akan dapat mengembalikan ini!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Kode AJAX untuk menghapus data dari database
                    const articleId = targetButton.dataset.id;
                    fetch('delete.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json'
                            },
                            body: JSON.stringify({
                                id: articleId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire(
                                    'Dihapus!',
                                    'Data telah dihapus.',
                                    'success'
                                );
                                // Hapus baris dari tabel
                                targetButton.closest('tr').remove();
                            } else {
                                Swal.fire('Gagal!', 'Terjadi kesalahan saat menghapus data.', 'error');
                            }
                        });
                }
            });
        }
    });
});