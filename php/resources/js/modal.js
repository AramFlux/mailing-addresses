function show_loader() {
    var loader = document.getElementById('loader');

    loader.style.display = '';
}

function hide_loader() {
    var loader = document.getElementById('loader');

    loader.style.display = 'none';
}

function open_modal() {
    var launcher = document.getElementById('modal_launcher');
    launcher.click();
}

window.addEventListener("load", function() {
    var originalNav = document.getElementById('original_nav');
    var stadardizedNav = document.getElementById('standardized_nav');
    var originalArea = document.getElementById('original_area');
    var standardizedArea = document.getElementById('standardized_area');

    originalNav.addEventListener('click', function () {
        // Todo: check if not active then do the operation

        stadardizedNav.classList.remove('active');
        standardizedArea.classList.remove('active');
        originalNav.classList.add('active');
        originalArea.classList.add('active');
    })

    stadardizedNav.addEventListener('click', function () {
        // Todo: check if not active then do the operation

        originalNav.classList.remove('active');
        originalArea.classList.remove('active');
        stadardizedNav.classList.add('active');
        standardizedArea.classList.add('active');
    })
});