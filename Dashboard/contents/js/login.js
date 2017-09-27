/*!
 * Login Page 
 * Author: Ivan Porta
 */

/* ===== GLOABL ===== */
$(document).ready(function (e) {  
    var baseUrl = $("body").data("baseUrl");


    var viewModel = new ViewModel(baseUrl);
    ko.applyBindings(viewModel);

});

function ViewModel(baseUrl) {
    
    var self = this;

    /* =============== VARIABLEs ============= */
    var urls = {
        Login: baseUrl + "LayoutController/login",
        Authentication: {
            getAttemptsFromIp: baseUrl + "AccountController/GetAttemptsFromIp",
            isAuthenticated: baseUrl + "AccountController/IsAuthenticated"
        }
    };

    /* =============== PROPERTIESs ============= */

    self.loginIp = ko.observable("");
    self.loginAttempts = ko.observable(0);
    self.loginVisible = ko.observable(false);
    self.submitEnabled = ko.observable(true);
    self.cookieErrorVisible = ko.observable(false);
    self.attemptsErrorVisible = ko.observable(false);
    self.noAttemptsErrorVisible = ko.observable(false);

    /* =============== FUNCTIONs ============== */
    self.getAttemptsFromIp = function() {
        $.ajax({
            type: "GET",
            url: urls.Authentication.getAttemptsFromIp,
            dataType: 'json',
            cache: false,
            success: function (viewModel) {

                self.loginIp(viewModel.ip);
                self.loginAttempts(viewModel.attempts);

                if(viewModel.attempts > 0 && viewModel.attempts < 5) {
                    self.attemptsErrorVisible(true);
                    self.submitEnabled(true);
                }

                // Check the loginAllowed property. If the user haven't alowed it, i disable the login and i show the alert
                if(viewModel.loginAllowed == false) {
                    self.submitEnabled(false);
                    self.attemptsErrorVisible(false);
                    self.noAttemptsErrorVisible(true);
                    return;
                }
            },
            error: function (e) {
                self.submitEnabled(false);
            }
        });
    }
    self.isAuthenticated = function() {
        $.ajax({
            type: "GET",
            url: urls.Authentication.isAuthenticated,
            dataType: 'json',
            cache: false,
            success: function (viewModel) {
    
                // Check the cookie. If the user haven't alowed it, i disable the login and i show the alert
                if (navigator == null || navigator == undefined || navigator.cookieEnabled == false) {
                    self.submitEnabled(false);
                    self.cookieErrorVisible(true);
                    return;
                }
    
                if (!viewModel.isAuthenticated) {
                    self.getAttemptsFromIp();
                } else {
                    document.location.href =  urls.Login;
                }
            },
            error: function (e) {
                self.submitEnabled(false);
            }
        });
    }
    self.init = function() {
        self.loginVisible(true);

        // Check if the user is already connected
        self.isAuthenticated();
    };
    
    /* =============== EVENTs ============== */

    self.init();
}

// http://ibiscoblu.fashionlux.it/index.php/layoutController/back
// http://www.ibiscoblu.fashionlux.it/index.php/AccountController/IsAuthenticated?_=1505045539275