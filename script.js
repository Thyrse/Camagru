window.addEventListener("load", function() {
    var toggle_login = document.getElementById('toggle_login');
    var toggle_user = document.getElementById('toggle_user');
    var connect = document.getElementsByClassName('sign_in');
    var user = document.getElementsByClassName('infos_user');
    var deleted = document.getElementById('delete_confirm');

    if (connect.length != 0) {
        function AppearConnect() {
            connect[0].addEventListener("click", function(e) {
                var styles = window.getComputedStyle(toggle_login);
                var value = styles.getPropertyValue('display');
                if (value == "none") {
                    toggle_login.style.display = "block";
                } else if (value == "block") {
                    toggle_login.style.display = "none";
                }
            })
        }
        AppearConnect();
    }
    if (user.length != 0) {
        function AppearPanel() {
            user[0].addEventListener("click", function(e) {
                var styles = window.getComputedStyle(toggle_user);
                var value = styles.getPropertyValue('display');
                if (value == "none") {
                    toggle_user.style.display = "flex";
                } else if (value == "flex") {
                    toggle_user.style.display = "none";
                }
            })
        }
        AppearPanel();
    }
    if (deleted !== null) {
        function clicked() {
            deleted.addEventListener("click", function(e) {
                if (confirm('Voulez-vous vraiment effectuer cette action ?')) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            })
        }
        clicked();
    }

    function clicked() {
        document.addEventListener("click", function(e) {
            if (e.target.className == "commentary_delete" || e.target.className == "item_delete") {
                if (confirm('Voulez-vous vraiment effectuer cette action ?')) {
                    return true;
                } else {
                    e.preventDefault();
                    return false;
                }
            }
        })
    }
    clicked();
});