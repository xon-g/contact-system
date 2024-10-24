<style>
    .table-container {
        width: 100%;

        .thead {
            padding: 10px;
        }

        .no-contacts {
            padding: 10px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .table-data {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        
    }
</style>

<table class="table-container">
    @csrf
    <thead>
        <tr>
            <th class="thead">Name</th>
            <th class="thead">Company</th>
            <th class="thead">Email</th>
            <th class="thead">Phone</th>
            <th class="thead">Actions</th>
        </tr>
    </thead>
    <tbody id="table-body"></tbody>
</table>

<nav class="pagination">
    <ul id="pagination-ul"></ul>
</nav>

<script>
    const csrf = '{{ csrf_token() }}';
    let urlParams = new URLSearchParams(window.location.search);
    let query = urlParams.get('query') || '';
    let page = urlParams.get('page') || 1;

    async function fetchContacts(passeDquery, pasedPpage) {
        document.getElementById('table-body').innerHTML = '';

        const fetchUrl = `/contacts/list?query=${passeDquery || query}&page=${pasedPpage || page}`

        const response = await fetch(fetchUrl)
            .then(response => response.status === 200 ? response.json() : Promise.reject(response))
            .then(json => json)
            .catch(error => {
                console.error('Error:', error);
            })
        renderContacts(response.data);
        renderPagination(response);
    }

    async function renderContacts(contacts) {
        if (contacts.length === 0) {
            renderNoContacts();
            return;
        }

        contacts.forEach((contact) => {
            const row = document.createElement('tr');

            const nameCell = document.createElement('td');
            nameCell.classList.add('table-data');
            nameCell.textContent = contact.name;
            row.appendChild(nameCell);

            const companyCell = document.createElement('td');
            companyCell.classList.add('table-data');
            companyCell.textContent = contact.company || '-';
            row.appendChild(companyCell);

            const emailCell = document.createElement('td');
            emailCell.classList.add('table-data');
            emailCell.textContent = contact.email || '-';
            row.appendChild(emailCell);

            const phoneCell = document.createElement('td');
            phoneCell.classList.add('table-data');
            phoneCell.textContent = contact.phone || '-';
            row.appendChild(phoneCell);

            const actionsCell = document.createElement('td');
            actionsCell.classList.add('table-data');

            const editLink = document.createElement('a');
            editLink.href = `/contacts/${contact.id}/edit`;
            editLink.style.paddingRight = '10px';

            const editIcon = document.createElement('i');
            editIcon.classList.add('fas', 'fa-edit');
            editLink.appendChild(editIcon);
            actionsCell.appendChild(editLink);

            const deleteForm = document.createElement('form');
            deleteForm.action = `/contacts/${contact.id}`;
            deleteForm.method = 'POST';
            deleteForm.style.display = 'inline';
            
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = csrf;
            deleteForm.appendChild(csrfInput);

            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            deleteForm.appendChild(methodInput);

            const deleteButton = document.createElement('button');
            deleteButton.type = 'submit';

            const deleteIcon = document.createElement('i');
            deleteIcon.classList.add('fas', 'fa-trash-alt');
            deleteButton.appendChild(deleteIcon);
            deleteForm.appendChild(deleteButton);
            actionsCell.appendChild(deleteForm);

            row.appendChild(actionsCell);
            document.getElementById('table-body').appendChild(row);
        });
    }

    function renderNoContacts() {
        const noContactsTr = document.createElement('tr');
        const noContactsTd = document.createElement('td');
        noContactsTd.classList.add('no-contacts');
        noContactsTd.setAttribute('colspan', '5');
        noContactsTd.textContent = 'No contacts found.';
        noContactsTr.appendChild(noContactsTd);
        document.getElementById('table-body').appendChild(noContactsTr);
    }

    // document ready
    document.addEventListener('DOMContentLoaded', async function() {
        const searchInput = document.getElementById('search-input');
        const contactsTable = document.getElementById('table-container');
        const tableBody = document.getElementById('table-body');

    
        searchInput.addEventListener('input', function() {
            query = searchInput.value;
            urlParams.set('query', query);
            fetchContacts()
        });

        fetchContacts();
    });

    function renderPagination(data) {
            const pagination = document.getElementById('pagination-ul');
            pagination.style.cssText = `
                display: flex;
                justify-content: center;
                padding: 1em;
                gap: 1em;
            `;
            pagination.innerHTML = '';

            if (data.current_page === 1) {
                pagination.innerHTML += '<li><span>&laquo;</span></li>';
            } else {
                pagination.innerHTML += `<li><a href="#" onclick="fetchContacts(query, 1)">&laquo;</a></li>`;
            }

            if (data.current_page === 1) {
                pagination.innerHTML += '<li><span>&lt;</span></li>';
            } else {
                pagination.innerHTML += `<li><a href="#" onclick="fetchContacts(query, ${data.current_page - 1})">&lt;</a></li>`;
            }

            for (let i = 1; i <= data.last_page; i++) {
                if (i === data.current_page) {
                    pagination.innerHTML += `<li><span style="background-color: #0A0F49; color: #fff; padding: 0.5em 1em; border-radius: 0.5em;">${i}</span></li>`;
                } else {
                    pagination.innerHTML += `<li><a href="#" onclick="fetchContacts(query, ${i})">${i}</a></li>`;
                }
            }

            if (data.current_page === data.last_page) {
                pagination.innerHTML += '<li><span>&gt;</span></li>';
            } else {
                pagination.innerHTML += `<li><a href="#" onclick="fetchContacts(query, ${data.current_page + 1})">&gt;</a></li>`;
            }

            if (data.current_page === data.last_page) {
                pagination.innerHTML += '<li><span>&raquo;</span></li>';
            } else {
                pagination.innerHTML += `<li><a href="#" onclick="fetchContacts(query, ${data.last_page})">&raquo;</a></li>`;
            }
        }
</script>