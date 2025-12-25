function openEditModal(productId) {
    fetch(`/products/${productId}/json`)
    .then(response => response.json())
    .then(product => {
        document.getElementById('edit_id').value = product.id;
        document.getElementById('edit_name').value = product.name;
        document.getElementById('edit_description').value = product.description;
        document.getElementById('edit_price').value = product.price;
        document.getElementById('edit_amount').value = product.amount;

        document.getElementById('editForm').action = `/products/${productId}`

        document.getElementById('editModal').style.display = 'block'
    })

    .catch(error => {
        console.error('Error loding product: ', error);
        alert('Ошибка загрузки данных товара')
    })

function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.style.display = 'none';
        
    document.getElementById('editForm').reset();
}

window.addEventListener('click', function(event) {
    const modal = document.getElementById('editModal');
    if (event.target === modal) {
        closeEditModal();
    }
});

document.addEventListener('keydown', function(event) {
    const modal = document.getElementById('editModal');
    if (event.key === 'Escape' && modal.style.display === 'block') {
        closeEditModal();
    }
});
}