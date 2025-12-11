document.addEventListener("DOMContentLoaded", loadBienfaits);

function loadBienfaits() {
    fetch("/api/bienfaits/")
        .then((res) => res.json())
        .then((data) => {
            let html = "";
            data.forEach((b) => {
                const productNames = b.products.map((p) => p.name).join(", ");

                html += `
                    <tr>
                        <td>${b.id}</td>
                        <td>${b.description}</td>
                        <td>${productNames}</td>
                        <td>
                            <button class="btn btn-warning btn-sm" onclick="openEditModal(${b.id})">Modifier</button>
                            <button class="btn btn-danger btn-sm" onclick="deleteBienfait(${b.id})">Supprimer</button>
                        </td>
                    </tr>
                `;
            });
            document.getElementById("bienfaitsTable").innerHTML = html;
        });
}

function getSelectedValues(selectId) {
    return [...document.getElementById(selectId).selectedOptions].map((o) =>
        parseInt(o.value)
    );
}

function createBienfait() {
    const description = document.getElementById("newDescription").value;
    const products = getSelectedValues("newProducts");

    fetch("/api/bienfaits/create", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ description, products }),
    }).then(() => {
        loadBienfaits();
        bootstrap.Modal.getInstance(
            document.querySelector("#createModal")
        ).hide();
    });
}

function openEditModal(id) {
    fetch("/api/bienfaits/")
        .then((res) => res.json())
        .then((list) => {
            const b = list.find((x) => x.id === id);

            document.getElementById("editId").value = b.id;
            document.getElementById("editDescription").value = b.description;

            const select = document.getElementById("editProducts");
            [...select.options].forEach((opt) => {
                opt.selected = b.products.find((p) => p.id == opt.value)
                    ? true
                    : false;
            });

            new bootstrap.Modal(document.getElementById("editModal")).show();
        });
}

function updateBienfait() {
    const id = document.getElementById("editId").value;
    const description = document.getElementById("editDescription").value;
    const products = getSelectedValues("editProducts");

    fetch("/api/bienfaits/edit/" + id, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ description, products }),
    }).then(() => {
        loadBienfaits();
        bootstrap.Modal.getInstance(
            document.querySelector("#editModal")
        ).hide();
    });
}

function deleteBienfait(id) {
    if (!confirm("Supprimer ce bienfait ?")) return;

    fetch("/api/bienfaits/delete/" + id, {
        method: "DELETE",
    }).then(() => {
        loadBienfaits();
    });
}
