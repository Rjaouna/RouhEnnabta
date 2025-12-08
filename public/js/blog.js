console.log("blog.js chargé ✅");

const list = document.getElementById("blog-list");
const form = document.getElementById("blog-form");

// Références aux champs du formulaire
const blogIdInput = document.getElementById("blog-id");
const nameInput = document.getElementById("name");
const contentInput = document.getElementById("content");
const isActiveInput = document.getElementById("isActive");
const imageInput = document.getElementById("imageFile");

const modal = new bootstrap.Modal(document.getElementById("blogModal"));
const showModal = new bootstrap.Modal(document.getElementById("showModal"));

loadBlogs();

/* ===== LIST ===== */
function loadBlogs() {
    fetch("/admin/blog/list")
        .then((r) => r.json())
        .then((data) => {
            list.innerHTML = "";
            data.forEach((blog) => {
                list.innerHTML += `
                    <div class="card mb-3">
                        <div class="card-body d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">${blog.name}</h5>
                            <div>
                                <button class="btn btn-sm btn-info me-1" onclick="showBlog(${blog.id})">👁</button>
                                <button class="btn btn-sm btn-warning me-1" onclick="editBlog(${blog.id})">✏️</button>
                                <button class="btn btn-sm btn-danger" onclick="deleteBlog(${blog.id})">🗑</button>
                            </div>
                        </div>
                    </div>
                `;
            });
        });
}

/* ===== OPEN CREATE ===== */
window.openCreateModal = function () {
    form.reset();
    blogIdInput.value = "";
    document.getElementById("modal-title").innerText = "Nouvel article";
    modal.show();
};

/* ===== SAVE (CREATE / UPDATE) ===== */
form.addEventListener("submit", (e) => {
    e.preventDefault();

    const id = blogIdInput.value;
    const url = id ? `/admin/blog/${id}` : `/admin/blog/create`;

    const data = new FormData();
    data.append("name", nameInput.value);
    data.append("content", contentInput.value);
    data.append("isActive", isActiveInput.checked ? 1 : 0);

    if (imageInput.files.length > 0) {
        data.append("imageFile", imageInput.files[0]);
    }

    fetch(url, {
        method: "POST",
        body: data,
    })
        .then((r) => r.json())
        .then((json) => {
            if (json.error) {
                alert("Erreur : " + json.error);
                return;
            }
            modal.hide();
            loadBlogs();
        })
        .catch((err) => console.error(err));
});

/* ===== EDIT ===== */
window.editBlog = function (id) {
    fetch("/admin/blog/list")
        .then((r) => r.json())
        .then((data) => {
            const blog = data.find((b) => b.id === id);

            if (!blog) {
                alert("Article introuvable");
                return;
            }

            blogIdInput.value = blog.id;
            nameInput.value = blog.name ?? "";
            contentInput.value = blog.content ?? "";
            isActiveInput.checked = !!blog.isActive;

            document.getElementById("modal-title").innerText =
                "Modifier l’article";
            modal.show();
        });
};

/* ===== SHOW ===== */
window.showBlog = function (id) {
    fetch("/admin/blog/list")
        .then((r) => r.json())
        .then((data) => {
            const blog = data.find((b) => b.id === id);

            if (!blog) {
                alert("Article introuvable");
                return;
            }

            document.getElementById("show-content").innerHTML = `
                <h3>${blog.name}</h3>
                <p>${blog.content ?? ""}</p>
                ${
                    blog.image
                        ? `<img src="/uploads/blogs/${blog.image}" class="img-fluid mt-3">`
                        : ""
                }
            `;

            showModal.show();
        });
};

/* ===== DELETE ===== */
window.deleteBlog = function (id) {
    if (!confirm("Supprimer cet article ?")) return;

    fetch(`/admin/blog/${id}`, { method: "DELETE" })
        .then((r) => r.json())
        .then(() => loadBlogs());
};
