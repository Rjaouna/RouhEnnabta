const searchInput = document.getElementById("searchInput");
const searchResults = document.getElementById("searchResults");
let timer = null;

if (searchInput) {
    searchInput.addEventListener("input", () => {
        clearTimeout(timer);
        const q = searchInput.value.trim();

        timer = setTimeout(() => {
            if (q.length < 2) {
                searchResults.innerHTML = "";
                return;
            }

            fetch(`/api/products/search?q=${encodeURIComponent(q)}`)
                .then((r) => {
                    if (!r.ok) throw new Error("Erreur API");
                    return r.json();
                })
                .then((products) => {
                    searchResults.innerHTML = "";

                    if (!products.length) {
                        searchResults.innerHTML = `
							<div class="col-12 text-center text-muted">
								Aucun résultat trouvé
							</div>`;
                        return;
                    }

                    products.forEach((p) => {
                        const url =
                            "{{ path('product_show', {slug:'SLUG'}) }}".replace(
                                "SLUG",
                                p.slug
                            );

                        searchResults.innerHTML += `
							<div class="col-12">
								<div class="d-flex justify-content-between align-items-center border-bottom py-3">
									<div>
										<strong>${p.name}</strong><br>
										<small class="text-muted">${p.category ?? ""}</small>
									</div>
									<a href="${url}" class="btn btn-sm btn-outline-success">Voir</a>
								</div>
							</div>`;
                    });
                })
                .catch(() => {
                    searchResults.innerHTML = `
						<div class="text-center text-danger">
							Erreur de recherche
						</div>`;
                });
        }, 300);
    });
}
