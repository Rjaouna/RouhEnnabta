document.addEventListener("DOMContentLoaded", loadRecettes);

function loadRecettes() {
    fetch("/api/recettes/")
        .then((res) => res.json())
        .then((data) => {
            let html = "";
            data.forEach((r) => {
                const productNames = r.products.map((p) => p.name).join(", ");

                html += `
					<tr>
						<td>${r.id}</td>
						<td>${r.description}</td>
						<td>${productNames}</td>
						<td>
							<button class="btn btn-warning btn-sm" onclick="openEditModal(${r.id})">Modifier</button>
							<button class="btn btn-danger btn-sm" onclick="deleteRecette(${r.id})">Supprimer</button>
						</td>
					</tr>
				`;
            });
            document.getElementById("recettesTable").innerHTML = html;
        });
}

function getSelectedValues(selectId) {
    return [...document.getElementById(selectId).selectedOptions].map((o) =>
        parseInt(o.value)
    );
}

function createRecette() {
    const description = document.getElementById("newDescription").value;
    const products = getSelectedValues("newProducts");

    fetch("/api/recettes/create", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ description, products }),
    }).then(() => {
        loadRecettes();
        bootstrap.Modal.getInstance(
            document.querySelector("#createModal")
        ).hide();
    });
}

function openEditModal(id) {
    fetch("/api/recettes/")
        .then((res) => res.json())
        .then((list) => {
            const r = list.find((x) => x.id === id);

            document.getElementById("editId").value = r.id;
            document.getElementById("editDescription").value = r.description;

            const select = document.getElementById("editProducts");

            [...select.options].forEach((opt) => {
                opt.selected = r.products.find((prod) => prod.id == opt.value);
            });

            new bootstrap.Modal(document.getElementById("editModal")).show();
        });
}

function updateRecette() {
    const id = document.getElementById("editId").value;
    const description = document.getElementById("editDescription").value;
    const products = getSelectedValues("editProducts");

    fetch("/api/recettes/edit/" + id, {
        method: "PUT",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ description, products }),
    }).then(() => {
        loadRecettes();
        bootstrap.Modal.getInstance(
            document.querySelector("#editModal")
        ).hide();
    });
}

function deleteRecette(id) {
    if (!confirm("Supprimer cette recette ?")) return;

    fetch("/api/recettes/delete/" + id, {
        method: "DELETE",
    }).then(() => {
        loadRecettes();
    });
}
