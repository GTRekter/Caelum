$(document).ready(function (e) {

    var baseUrl = $("body").data("baseUrl");
    var contentImgPath = $("body").data("content-img-url");
    var sideNavbar = document.querySelector('[data-element-id="side-navbar"]');
    var topNavbar = document.querySelector('[data-element-id="top-navbar"]');

    var viewModel = new ViewModel(baseUrl, contentImgPath, sideNavbar, topNavbar);
    ko.applyBindings(viewModel);

});

function ViewModel(baseUrl, contentImgPath, sideNavbar, topNavbar) {

    var self = this;

    /* =============== VARIABLEs ============= */

    var contentImgPath = contentImgPath;
    var sideNavbar = sideNavbar;
    var topNavbar = topNavbar;
    var urls = {
        Messages: {
            getMessages: baseUrl + "MessagesController/GetMessages",
        },
        Account: {
            logout: baseUrl + "AccountController/Logout",
        }
    };

    /* =============== PROPERTIESs ============= */

    self.ListVisible = ko.observable(false);
    self.DetailVisible = ko.observable(false);
    self.ActivitiesVisible = ko.observable(false);
    self.ToDoListVisible = ko.observable(false);
    self.ChartsVisible = ko.observable(false);
    self.TopTilesVisible = ko.observable(false);
    self.TopTitleVisible = ko.observable(false);

    self.Messages = ko.observableArray([]);

    /* =============== FUNCTIONs ============== */

    self.getMessages= function() {

		// TODO: Handle with webSocket
		self.Messages.removeAll();

		$.ajax({
			type: "GET",
			dataType: 'json',
			url: urls.Messages.getMessages,
			success: function(viewModel) {
				if(viewModel.Execution) {
					viewModel.Messages.forEach(function(message) {
						self.Messages.push(new Message(message));
					}, this);
				} else {
					// TODO: Handle error
				}
			}
		});
	}
    self.toggleVisibilities = function (sectionToShow) {
        self.ListVisible(false);
        self.DetailVisible(false);
        self.ActivitiesVisible(false);
        self.ToDoListVisible(false);
        self.ChartsVisible(false);
        self.TopTilesVisible(false);
        self.TopTitleVisible(false);

        switch (sectionToShow) {
            case "list":
                self.TopTitleVisible(true);
                self.ListVisible(true);
                break;
            case "detail":
                self.TopTitleVisible(true);
                self.DetailVisible(true);
                break;
            case "dashboard":
                self.TopTilesVisible(true);
                self.ActivitiesVisible(true);
                self.ToDoListVisible(true);
                self.ChartsVisible(true);
                break;
        }
    };
    self.init = function() {
        self.toggleVisibilities("dashboard");
    };
    /* =============== EVENTs ============== */

    self.onClickToggleSideNavbar = function() {
		sideNavbar.toggleClass('collapsed');
		topNavbar.toggleClass('open');
	}
	self.onClickProfile = function() {		
	}
	self.onClickHelp = function() {
	}
	self.onClickLogout = function() {
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: urls.Account.logout,
			success: function(viewModel) {
			}
		});
	}
    self.onClickDogsList = function () {
        self.toggleVisibilities("list");  
    };
    self.onClickRacesList = function () {
        self.toggleVisibilities("list");  
    };
    self.onClickExibitionsTypesList = function () {
        self.toggleVisibilities("list");  
    };
    self.onClickExibitionsClassesList = function () {
        self.toggleVisibilities("list");  
    };
    self.onClickUsersList = function () {
        self.toggleVisibilities("list");  
    };
    self.onClickLocalizationsList = function () {
        self.toggleVisibilities("list");  
    };

    self.init();
}

/* ==== MODELS ==== */
function Message (itemData) {
	self = this;
	self.CreationDate = ko.observable(itemData.CreationDate);
	self.User = ko.observable(itemData.User);
    self.Message = ko.observable(itemData.Message);
}
function User (itemData) {
	self = this;
	self.Name = ko.observable(itemData.Name);
	self.Surname = ko.observable(itemData.Surname);
	self.ImagePath = ko.observable(itemData.ImagePath);
}