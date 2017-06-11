$(document).ready(function (e) {

    // Riferimento al Login Panel
    var $loginPanel = $('[data-element-id="signin-box"]');
    var $logInButton = $('[data-element-id="log-in-button"]', $loginPanel);
    $loginPanel.fadeIn(600).removeClass('hide');
    // Se esiste, davvero siamo nella log in page
    // if ($loginPanel.length > 0) {

    //     // Verifico se utente � logged-in
    //     var $logInButton = $('[data-element-id="log-in-button"]', $loginPanel),
    //         $logInButtonDisabled = $('[data-element-id="log-in-button-disabled"]', $loginPanel),
    //         isFormValid = $loginPanel.data('isFormValid') == 'True' ? true : false,
    //         appBaseUrl = $loginPanel.data('appBaseUrl'),
    //         homeUrl = $loginPanel.data('homeUrl');

    //     $.ajax({
    //         url: appBaseUrl + '/Account/IsAuthenticated?now=' + new Date().getTime(),
    //         dataType: 'json',
    //         success: function (isAuthenticated) {

    //             $('[data-element-id="cookie-error"]').hide();
    //             if (navigator == null || navigator == undefined || navigator.cookieEnabled == false) {
    //                 //Cookie not enabled
                    // $logInButtonDisabled.removeClass('hide');
                    // $logInButton.addClass('hide');
    //                 $('[data-element-id="cookie-error"]').show();
    //                 return;
    //             }

    //             if (!isAuthenticated) {
    //                 $logInButtonDisabled.addClass('hide');
    //                 $logInButton.removeClass('hide');
    //             } else {
    //                 document.location.href = homeUrl;
    //             }
    //         },
    //         error: function (e) {
    //             // E' andato in errore, ma non doveva...
    //             $logInButtonDisabled.addClass('hide');
    //             $logInButton.removeClass('hide');
    //         }
    //     });

    //     $(document).on("submit", function (e) {
    //         if (navigator == null || navigator == undefined || navigator.cookieEnabled == false) {
    //             e.preventDefault();
    //             return false;
    //         } else {
    //             $logInButtonDisabled.removeClass('hide');
    //             $logInButton.addClass('hide');
    //         }
    //     });

    //     if (isFormValid) {
    //         $loginPanel.fadeIn(600).removeClass('hide');
    //     } else {
    //         $loginPanel.removeClass('hide');
    //     }
    // }


});