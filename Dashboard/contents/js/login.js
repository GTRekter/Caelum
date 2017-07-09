/*!
 * Login Page 
 * Author: Ivan Porta
 */

/* ===== GLOABL ===== */
var $loginPanel,
    $loginButton,
    appBaseUrl;


$(document).ready(function (e) {

    $loginPanel = $('[data-element-id="signin-box"]');
    $loginButton = $('[data-element-id="login-button"]');
    appBaseUrl = $loginPanel.data('appBaseUrl');

    $loginPanel.fadeIn(600).removeClass('hide');
    $('[data-element-id="cookie-error"]').hide();

    // Check if the user is already connected
    $.ajax({
        type: "GET",
        url: appBaseUrl + '/AccountController/IsAuthenticated',
        dataType: 'json',
        success: function (isAuthenticated) {

            // Check the cookie. If the user haven't alowed it, i disable the login and i show the alert
            if (navigator == null || navigator == undefined || navigator.cookieEnabled == false) {
                disableLoginButton();
                $('[data-element-id="cookie-error"]').show();
                return;
            }

            if (!isAuthenticated) {
                disableLoginButton();
            } else {
                document.location.href = homeUrl;
            }
        },
        error: function (e) {
            disableLoginButton();
        }
    });

    // Handle the login form submit
    $(document).on("submit", function (e) {
        if (navigator == null || navigator == undefined || navigator.cookieEnabled == false) {
            e.preventDefault();
            return false;
        } else {
            disableLoginButton();
        }
    });
});

function disableLoginButton() {
    $loginButton.addClass("disabled");
    $loginButton.find("i").empty().addClass("fa fa-spinner fa-spin");    
}
function enableLoginButton() {
    $loginButton.removeClass("disabled");
    $loginButton.find("i").empty().addClass("fa fa fa-key");    
}