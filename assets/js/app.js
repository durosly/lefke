const articleContainer = document.querySelector('.article-container')

if(articleContainer) {
    articleContainer.addEventListener("click", loadArticle)
}

function loadArticle(e) {
    if(e.target.classList.contains("contact-btn-primary")) {
        const articleContentElem = e.target.previousElementSibling
        const articleId = e.target.dataset.blog_id
        e.target.innerHTML = "Loading..."
        e.target.disabled = true
        const data = new FormData()
        data.append("id", articleId)
        fetch("includes/get-full-content.php", { method: "POST", body: data })
            .then(response => response.text())
            .then(data => {
                e.target.style.display = "none"
                articleContentElem.innerHTML = data
            })
    }
}