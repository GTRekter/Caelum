
/* ==== VARIABLES ==== */
var $body = $('body');
var $sideNavbar = $('[data-element-id="side-navbar"]');
var $topNavbar = $('[data-element-id="top-navbar"]');
var paths = {
	base: $body.data("base-url"),
	css: $body.data("content-css-url")
};
var urls = {
	getMessages: paths.base + "MessagesController/GetMessages"
};

var ViewModel = function() {
	self = this;

	/* ==== OBSERVABLES ==== */
	self.messages = ko.observableArray([]);

	/* ==== EVENTS ==== */
	self.onClickToggle = function() {
		$sideNavbar.toggleClass('collapsed');
		$topNavbar.toggleClass('open');
	}
	self.onClickProfile = function() {
		
	}
	self.onClickHelp = function() {
		$sideNavbar.toggleClass('collapsed');
		$topNavbar.toggleClass('open');
	}
	self.onClickLogout = function() {
		
	}

	/* ==== FUNCTIONS ==== */
	self.getMessages= function() {

		// TODO: Handle with webSocket
		self.messages.removeAll();

		$.ajax({
			type: "GET",
			dataType: 'json',
			url: urls.getMessages,
			success: function(viewModel) {
				if(viewModel.Execution) {
					viewModel.Messages.forEach(function(message) {
						messages.push(new Message(message));
					}, this);
				} else {
					// TODO: Handle error
				}
			}
		});
	}

};
 
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


ko.applyBindings(new ViewModel()); 