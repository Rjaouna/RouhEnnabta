document.addEventListener("DOMContentLoaded", loadPrecautions);

function loadPrecautions() {
    fetch("/api/precautions/")
        .then((res) => res.json())
        .then((data) => {
            let html = "";
            data.forEach((p) => {
                const productNames = p.products.map((pr) => pr.name).join(", ");

                html += `
					<tr>
						<td>${p.id}</td>
						<td>${p.description}</td>
						<td>${productNames}</td>
						<td>
							<button class="btn btn-warning btn-sm" onclick="openEditModal(${p.id})">Modifier</button>
							<button class="btn btn-danger btn-sm" onclick="deletePrecaution(${p.id})">Supprimer</button>
						</td>
					</tr>
				`;
            });
            document.getElementById("precautionsTable").innerHTML = html;
        });
}

function getSelectedValues(selectId) {
    return [...document.getElementById(selectId).selectedOptions].map((o) =>
        parseInt(o.value)
    );
}

function createPrecaution() {
    const description = document.getElementById("newDescription").value;
    const products = getSelectedValues("newProducts");

    fetch("/api/precautions/create", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ description, products }),
    }).then(() => {
        loadPrecautions();
        bootstrap.Modal.getInstance(
            document.querySelector("#createModal")
        ).hide();
    });
}

function openEditModal(id) {
    fetch("/api/precautions/")
        .then((res) => res.json())
        .then((list) => {
            const p = list.find((x) => x.id === id);

            document.getElementById("editId").value = p.id;
            document.getElementById("editDescription").value = p.description;

            const select = document.getElementById("editProducts");

            [...select.options].forEach((opt) => {
                opt.selected = p.products.find((prod) => prod.id == opt.value)
                    ? true
                    : false;
            });

            new bootstrap.Modal(document.getElementById("editModal")).show();
        });
}

function updatePrecaution() {
    const id = document.getElementById("editId").value;
    const description = document.getElementById("editDescription").value;
    const products = getSelectedValues("editProducts");

    fetch("/api/precautions/edit/" + id, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ description, products }),
    }).then(() => {
        loadPrecautions();
        bootstrap.Modal.getInstance(
            document.querySelector("#editModal")
        ).hide();
    });
}

function deletePrecaution(id) {
    if (!confirm("Supprimer cette précaution ?")) return;

    fetch("/api/precautions/delete/" + id, {
        method: "DELETE",
    }).then(() => {
        loadPrecautions();
    });
}
