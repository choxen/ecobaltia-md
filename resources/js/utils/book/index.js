let timer;
const waitTime = 500;

function initSearchForm() {
    const form = document.getElementById("search-form");
    let search = document.getElementById("search");

    search.addEventListener("keyup", () => {
        clearTimeout(timer);

        timer = setTimeout(() => {
            form.submit();
        }, waitTime);
    });
}

initSearchForm();
