document.addEventListener("DOMContentLoaded", function () {

    document.querySelectorAll('.btn-dibaca').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            let id = this.getAttribute('data-id');

            fetch('/admin/notifikasi/dibaca/' + id, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    document.getElementById('notif-' + id).classList.add('opacity-50');
                }
            })
            .catch(err => console.error(err));
        });
    });

});
