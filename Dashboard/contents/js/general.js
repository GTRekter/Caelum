$(document).ready(function (e) {

    var baseUrl = $("body").data("baseUrl");
    var contentImgPath = $("body").data("content-img-url");

    var viewModel = new ViewModel(baseUrl, contentImgPath);
    ko.applyBindings(viewModel);

});

function ViewModel(baseUrl, contentImgPath) {

    var self = this;

    /* =============== VARIABLEs ============= */

    self.contentImgPath = contentImgPath;;
    self.Genders = [
        {
            Id: "1",
            Name: "Maschio"
        },
        {
            Id: "2",
            Name: "Femmina"
        }];
    self.Urls = {
        Dogs: {
            addDog: baseUrl + "DogController/AddDog",
            addDogImages: baseUrl + "DogController/AddDogImages",
            getDogs: baseUrl + "DogController/GetDogs",
            getDogsCount: baseUrl + "DogController/GetDogsCount",
            getDogsByColors: baseUrl + "DogController/GetDogsByColors",
            getDogsByRaces: baseUrl + "DogController/GetDogsByRaces",
            getDogImages: baseUrl + "DogController/GetDogImages",
            updateDog: baseUrl + "DogController/UpdateDog",
            updateDogImages: baseUrl + "DogController/UpdateDogImages",
            updateDogPedigree: baseUrl + "DogController/UpdateDogPedigree",
            deleteDogs: baseUrl + "DogController/DeleteDogs"
        },
        Races: {
            addRace: baseUrl + "RaceController/AddRace",
            getRaces: baseUrl + "RaceController/GetRaces",
            getAllRaces: baseUrl + "RaceController/GetAllRaces",
            getRacesCount: baseUrl + "RaceController/GetRacesCount",
            updateRace: baseUrl + "RaceController/UpdateRace",
            deleteRaces: baseUrl + "RaceController/DeleteRaces"
        },
        Colors: {
            addColor: baseUrl + "ColorController/AddColor",
            getColors: baseUrl + "ColorController/GetColors",
            getAllColors: baseUrl + "ColorController/GetAllColors",
            getColorsCount: baseUrl + "ColorController/GetColorsCount",
            updateColor: baseUrl + "ColorController/UpdateColor",
            deleteColors: baseUrl + "ColorController/DeleteColors"
        },
        Account: {
            logout: baseUrl + "AccountController/Logout",
        }
    };

    /* =============== PROPERTIESs ============= */

    self.Title = ko.observable();
    self.Subtitle = ko.observable();
    self.ListTitle = ko.observable();
    self.ItemDetailsTitle = ko.observable();
    self.AlertModalText = ko.observable();
    self.ErrorModalText = ko.observable();

    // 1. General Visibilities
    self.TopTitleVisible = ko.observable(false);
    self.ItemsListVisible = ko.observable(false);
    self.ItemDetailsVisible = ko.observable(false);
    self.ChatVisible = ko.observable(false);
    self.CalendarVisible = ko.observable(false);
    self.ChartsVisible = ko.observable(false);

    // 2. List Visibilities
    self.DogsListVisible = ko.observable(false);
    self.RacesListVisible = ko.observable(false);
    self.ColorsListVisible = ko.observable(false);
    self.ExhibitionsListVisible = ko.observable(false);

    // 3. Details Visibilities
    self.DogDetailsVisible = ko.observable(false);
    self.RaceDetailsVisible = ko.observable(false);
    self.ColorDetailsVisible = ko.observable(false);
    self.ExhibitionDetailsVisible = ko.observable(false);

    // 4. Modals Visibilities
    self.AlertModalVisible = ko.observable(false);
    self.ErrorModalVisible = ko.observable(false);

    // 4. Pagination
    self.PageNumber = ko.observable(0);
    self.PageSize = ko.observable(10);
    self.Pages = ko.observableArray();

    // 5. Actions
    self.ActionType = ko.observable();

    // 6. Items
    self.Dogs = ko.observableArray();
    self.Races = ko.observableArray();
    self.Colors = ko.observableArray();
    self.Exhibitions = ko.observableArray();

    self.SelectedColor = ko.observable();
    self.SelectedGender = ko.observable();
    self.SelectedRace = ko.observable();
    self.SelectedDogImages = ko.observableArray();
    self.SelectedDogPedigree = ko.observableArray();

    self.DogDetails = new DogDetails();
    self.RaceDetails = new RaceDetails();
    self.ColorDetails = new ColorDetails();

    // 7. Counters
    self.DogsCount = ko.observable(0);
    self.RacesCount = ko.observable(0);
    self.ColorsCount = ko.observable(0);
    self.ExhibitionsCount = ko.observable(0);

    /* =============== FUNCTIONs ============== */
    
    // 1. General
    self.toggleVisibilities = function (sectionToShow) {

        self.ItemsListVisible(false);
        self.ChatVisible(false);
        self.CalendarVisible(false);
        self.ChartsVisible(false);  
        self.TopTitleVisible(false);
        self.ItemDetailsVisible(false);

        switch (sectionToShow) {
            case "list":
                self.ItemsListVisible(true);
                break;
            case "details":
                self.ItemDetailsVisible(true);
                break;
            case "dashboard":   
                self.TopTitleVisible(true);
                self.CalendarVisible(true);
                self.ChatVisible(true);    
                self.ChartsVisible(true);     
                break;
        }
    };
    self.toggleDetailsVisibilities = function (detailsToShow) {
        self.DogDetailsVisible(false);
        self.RaceDetailsVisible(false);
        self.ColorDetailsVisible(false);
        self.ExhibitionDetailsVisible(false);

        switch (detailsToShow) {
            case "dogs":
                self.DogDetailsVisible(true);
                break;
            case "races":
                self.RaceDetailsVisible(true);  
                break;
            case "colors":   
                self.ColorDetailsVisible(true);  
                break;
            case "exhibitions":   
                self.ExhibitionDetailsVisible(true);  
                break;
        }
    };
    self.toggleListVisibilities = function (listToShow) {

        self.DogsListVisible(false);
        self.RacesListVisible(false);
        self.ColorsListVisible(false);
        self.ExhibitionsListVisible(false);

        switch (listToShow) {
            case "dogs":
                self.DogsListVisible(true);
                break;
            case "races":
                self.RacesListVisible(true);  
                break;
            case "colors":
                self.ColorsListVisible(true);  
                break;
            case "exhibitions":   
                self.ExhibitionsListVisible(true);  
                break;
        }
    };
    self.init = function() {
        self.Title("Dashboard");
        self.Subtitle("Statistiche Generali");
        self.toggleVisibilities("dashboard");

        self.getDogsCount();
        self.getRacesCount();
        self.getColorsCount();
    };

    // 2. List
    self.getDogs = function() {

        self.Dogs.removeAll();

        var ajaxData = {
            pageNumber: self.PageNumber(),
            pageSize: self.PageSize()
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            cache: false,
            data: ajaxData,
			url: self.Urls.Dogs.getDogs,
			success: function(viewModel) {
				if(viewModel.execution) {
					viewModel.dogs.forEach(function(dog) {
                        var dogToAdd = new Dog(dog);
						self.Dogs.push(dogToAdd);
					}, this);
				} else {
					// TODO: Handle error
				}
			}
		});
    }    
    self.getDogsByRaces = function(itemsToDelete) {
        var ajaxData = {
            ids: itemsToDelete
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Dogs.getDogsByRaces,
			success: function(viewModel) {
				if(viewModel.execution) {
                    if(viewModel.dogs.length > 0) {
                        self.AlertModalVisible(true);
                        self.AlertModalText("Presenza di cani associati alla razza che si intende eliminare");
                    } else {
                        self.deleteRaces(itemsToDelete);
                    }
				} else {
					// TODO: Handle error
				}
			}
		});
    }    
    self.getDogsByColors = function(itemsToDelete) {
        var ajaxData = {
            ids: itemsToDelete
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Dogs.getDogsByColors,
			success: function(viewModel) {
				if(viewModel.execution) {
					if(viewModel.execution) {
                        if(viewModel.dogs.length > 0) {
                            self.AlertModalVisible(true);
                            self.AlertModalText("Presenza di cani associati con il colore che si intende eliminare");
                        } else {
                            self.deleteColors(itemsToDelete);
                        }
                    } else {
                        // TODO: Handle error
                    }
				} else {
					// TODO: Handle error
				}
			}
		});
    }  
    self.getColors = function() {

        self.Colors.removeAll();

        var ajaxData = {
            pageNumber: self.PageNumber(),
            pageSize: self.PageSize()
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            cache: false,
            data: ajaxData,
			url: self.Urls.Colors.getColors,
			success: function(viewModel) {
				if(viewModel.execution) {
					viewModel.colors.forEach(function(color) {
                        var colorToAdd = new Color(color);
						self.Colors.push(colorToAdd);
					}, this);
				} else {
					// TODO: Handle error
				}
			}
		});
    }    
    self.getRaces = function() {

        self.Races.removeAll();

        var ajaxData = {
            pageNumber: self.PageNumber(),
            pageSize: self.PageSize()
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            cache: false,
            data: ajaxData,
			url: self.Urls.Races.getRaces,
			success: function(viewModel) {
				if(viewModel.execution) {
					viewModel.races.forEach(function(race) {
                        var raceToAdd = new Race(race);
						self.Races.push(raceToAdd);
					}, this);
				} else {
					// TODO: Handle error
				}
			}
		});
    }   
    self.getAllColors = function() {
        
        self.Colors.removeAll();

        $.ajax({
            type: "GET",
            dataType: 'json',
            cache: false,
            url: self.Urls.Colors.getAllColors,
            success: function(viewModel) {
                if(viewModel.execution) {
                    viewModel.colors.forEach(function(color) {
                        var colorToAdd = new Color(color);
                        self.Colors.push(colorToAdd);
                    }, this);
                } else {
                    // TODO: Handle error
                }
            }
        });
    }    
    self.getAllRaces = function() {

        self.Races.removeAll();

        $.ajax({
            type: "GET",
            dataType: 'json',
            cache: false,
            url: self.Urls.Races.getAllRaces,
            success: function(viewModel) {
                if(viewModel.execution) {
                    viewModel.races.forEach(function(race) {
                        var raceToAdd = new Race(race);
                        self.Races.push(raceToAdd);
                    }, this);
                } else {
                    // TODO: Handle error
                }
            }
        });
    }   
    self.getAllColorsAndPreselect = function(colorToSelect) {
        
        self.Colors.removeAll();

        $.ajax({
            type: "GET",
            dataType: 'json',
            cache: false,
            url: self.Urls.Colors.getAllColors,
            success: function(viewModel) {
                if(viewModel.execution) {

                    viewModel.colors.forEach(function(color) {
                        var colorToAdd = new Color(color);
                        self.Colors.push(colorToAdd);
                    }, this);

                    // Preselect the color
                    for(var index = 0; index < self.Colors().length; index ++) {
                        var currentColor = self.Colors()[index];
                        if(currentColor.Name == colorToSelect) {
                            self.SelectedColor(currentColor);
                            break;
                        }
                    }
                } else {
                    // TODO: Handle error
                }
            }
        });
    }    
    self.getAllRacesAndPreselect = function(raceToSelect) {

        self.Races.removeAll();

        $.ajax({
            type: "GET",
            dataType: 'json',
            cache: false,
            url: self.Urls.Races.getAllRaces,
            success: function(viewModel) {
                if(viewModel.execution) {

                    viewModel.races.forEach(function(race) {
                        var raceToAdd = new Race(race);
                        self.Races.push(raceToAdd);
                    }, this);

                    // Preselect the race
                    for(var index = 0; index < self.Races().length; index ++) {
                        var currentRace = self.Races()[index];
                        if(currentRace.Name == raceToSelect) {
                            self.SelectedRace(currentRace);
                            break;
                        }
                    }
                } else {
                    // TODO: Handle error
                }
            }
        });
    } 
    self.getDogImages = function(){
        var ajaxData = {
            idDog: self.DogDetails.Id(),
        };
        $.ajax({
			type: "POST",
            dataType: 'json',
            cache: false,
            data: ajaxData,
			url: self.Urls.Dogs.getDogImages,
			success: function(viewModel) {

                self.DogDetails.Images.removeAll();

				if(viewModel.execution) {
					viewModel.images.forEach(function(image) {
                        var imageToAdd = new Image(image);
						self.DogDetails.Images.push(imageToAdd);
					}, this);
				} else {
					// TODO: Handle error
				}
			}
		});
    }
    self.getDogPedigree = function(){
        var ajaxData = {
            idDog: self.DogDetails.Id(),
        };
        $.ajax({
			type: "POST",
            dataType: 'json',
            cache: false,
            data: ajaxData,
			url: self.Urls.Dogs.getDogPedigree,
			success: function(viewModel) {

				if(viewModel.execution) {

                    var pedigreeToAdd = new Pedigree(viewModel.pedigree);
                    self.DogDetails.Pedigree(pedigreeToAdd);

				} else {
					// TODO: Handle error
				}
			}
		});
    }

    // 3. Update
    self.addDogImages = function(id) {

        var ajaxData = new FormData();
        ajaxData.append("idDog", id);

        $.each(self.SelectedDogImages(), (index, image) => {
            ajaxData.append("images[]", image);
        });

        $.ajax({
            type: 'POST',
            data: ajaxData,
            url: self.Urls.Dogs.addDogImages,
            contentType: false,
            processData: false,                  
            success: function () {
            },
            error: function(error) {
                // TODO: Handle error
            }
        });
    }
    self.updateDogImages = function(id) {

        var ajaxData = new FormData();
        ajaxData.append("idDog", id);

        $.each(self.SelectedDogImages(), (index, image) => {
            ajaxData.append("images[]", image);
        });

        $.each(self.DogDetails.Images(), (index, image) => {
            if(true == image.IsSelected()) {
                ajaxData.append("idImagesToDelete[]", image.Id);
            }
        });

        $.ajax({
            type: 'POST',
            data: ajaxData,
            url: self.Urls.Dogs.updateDogImages,
            contentType: false,
            processData: false,                  
            success: function () {  
            },
            error: function(error) {
                // TODO: Handle error
            }
        });
    }
    self.updateDogPedigree = function(id) {

        var ajaxData = new FormData();
        ajaxData.append("idDog", id);

        $.each(self.SelectedDogPedigree(), (index, pedegree) => {
            ajaxData.append("pedigree", pedegree);
        });

        $.ajax({
            type: 'POST',
            data: ajaxData,
            url: self.Urls.Dogs.updateDogPedigree,
            contentType: false,
            processData: false,                  
            success: function () {
                self.toggleVisibilities("list");
                self.toggleListVisibilities("dogs");
            
                self.resetDogs();              
            },
            error: function(error) {
                // TODO: Handle error
            }
        });
    }
    self.updateDog = function() {

        var ajaxData = {
            dogDetails: ko.toJS(self.DogDetails),
            idColor: self.SelectedColor().Id,
            idRace: self.SelectedRace().Id,
            idGender: self.SelectedGender().Id
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Dogs.updateDog,
			success: function(viewModel) {
				if(viewModel.execution) {
                    var id = self.DogDetails.Id();
                    self.updateDogImages(id);

                    self.toggleVisibilities("list");
                    self.toggleListVisibilities("dogs");
                
                    self.resetDogs();
				} else {
					// TODO: Handle error
				}
			}
		});
    }
    self.updateRace = function() {
        var ajaxData = {
            raceDetails: ko.toJS(self.RaceDetails)
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Races.updateRace,
			success: function(viewModel) {
				if(viewModel.execution) {
                    self.toggleVisibilities("list");
                    self.toggleListVisibilities("races");

                    self.resetRaces();
				} else {
					// TODO: Handle error
				}
			}
		});
    }   
    self.updateColor = function() {
        var ajaxData = {
            colorDetails: ko.toJS(self.ColorDetails)
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Colors.updateColor,
			success: function(viewModel) {
				if(viewModel.execution) {
                    self.toggleVisibilities("list");
                    self.toggleListVisibilities("colors");

                    self.resetColors();
				} else {
					// TODO: Handle error
				}
			}
		});
    }
    

    // 4. Delete
    self.deleteDogs = function() {

        // Get the selected dogs
        var itemsToDelete = [];
        $.each(self.Dogs(), (index, dog) => {
            if(dog.IsSelected() == true) {
                itemsToDelete.push(dog.Id);
            }
        });

        var ajaxData = {
            ids: itemsToDelete
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Dogs.deleteDogs,
			success: function(viewModel) {
				if(viewModel.execution) {

                    // Refresh counter
                    var counter = self.DogsCount();
                    counter = counter - itemsToDelete.length;
                    self.DogsCount(counter);
                    self.setPages(self.DogsCount());

                    self.getDogs();
				} else {
					// TODO: Handle error
				}
			}
		});
    } 
    self.deleteColors = function(itemsToDelete) {
        var ajaxData = {
            ids: itemsToDelete
        };
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: ajaxData,
            url: self.Urls.Colors.deleteColors,
            success: function(viewModel) {
                if(viewModel.execution) {

                    // Refresh counter
                    var counter = self.ColorsCount();
                    counter = counter - itemsToDelete.length;
                    self.ColorsCount(counter);
                    self.setPages(self.ColorsCount());

                    self.getColors();
                } else {
                    // TODO: Handle error
                }
            }
        });
    } 
    self.deleteRaces = function(itemsToDelete) {

        var ajaxData = {
            ids: itemsToDelete
        };
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: ajaxData,
            url: self.Urls.Races.deleteRaces,
            success: function(viewModel) {
                if(viewModel.execution) {

                    // Refresh counter
                    var counter = self.RacesCount();
                    counter = counter - itemsToDelete.length;
                    self.RacesCount(counter);
                    self.setPages(self.RacesCount());

                    self.getRaces();
                } else {
                    // TODO: Handle error
                }
            }
        });
    } 
    self.deleteExhibitions = function() {
        // Get the selected dogs
        var itemsToDelete = [];
        self.Exhibitions.forEach(function(exhibition) {
            if(exhibition.IsSelected() == true) {
                itemsToDelete.push(exhibition.Id);
            }
        }, this);

        var ajaxData = {
            ids: itemsToDelete
        };
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: ajaxData,
            url: self.Urls.Colors.deleteExhibitions,
            success: function(viewModel) {
                if(viewModel.execution) {
                    self.Exhibitions.forEach(function(exhibition) {
                        if(exhibition.IsSelected() == true) {
                            self.Exhibitions.remove(exhibition);
                        }
                    }, this);
                } else {
                    // TODO: Handle error
                }
            }
        });
    }

    // 5. Reset
    self.resetColors = function() {
        self.PageNumber(0);
        self.PageSize(10);

        self.Colors.removeAll();
        self.getColors();
    }
    self.resetRaces = function() {
        self.PageNumber(0);
        self.PageSize(10);

        self.Races.removeAll();
        self.getRaces();
    }
    self.resetDogs = function() {
        self.PageNumber(0);
        self.PageSize(10);

        self.Dogs.removeAll();
        self.getDogs();
    }

    // 6. Counters
    self.getDogsCount = function() {
		$.ajax({
			type: "GET",
            dataType: 'json',
			url: self.Urls.Dogs.getDogsCount,
			success: function(viewModel) {
				if(viewModel.execution) {
					self.DogsCount(viewModel.dogsCount);
				} else {
					// TODO: Handle error
				}
			}
		});
    }  
    self.getColorsCount = function() {
		$.ajax({
			type: "GET",
            dataType: 'json',
			url: self.Urls.Colors.getColorsCount,
			success: function(viewModel) {
				if(viewModel.execution) {
					self.ColorsCount(viewModel.colorsCount);
				} else {
					// TODO: Handle error
				}
			}
		});
    }  
    self.getRacesCount = function() {
		$.ajax({
			type: "GET",
            dataType: 'json',
			url: self.Urls.Races.getRacesCount,
			success: function(viewModel) {
				if(viewModel.execution) {
					self.RacesCount(viewModel.racesCount);
				} else {
					// TODO: Handle error
				}
			}
		});
    }  

    // 7. Pagination
    self.setPages = function(itemsCount) {

        self.Pages.removeAll();

        var pages = new Array();
        var pagesCount = Math.ceil(itemsCount / self.PageSize());
        for(var index = 0; index < pagesCount; index++) {

            var pageToAdd = new Page({Number: index});
            if(index == self.PageNumber()) {
                pageToAdd.IsSelected(true);
            }
            pages.push(pageToAdd);
        }
        self.Pages(pages);
    }

    // 8. Add
    self.addDog = function() {
        var ajaxData = {
            dogDetails: ko.toJS(self.DogDetails),
            idColor: self.SelectedColor().Id,
            idRace: self.SelectedRace().Id,
            idGender: self.SelectedGender().Id
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Dogs.addDog,
			success: function(viewModel) {
				if(viewModel.execution) {
                    var id = viewModel.idDog;

                    // Refresh counter
                    var counter = self.DogsCount();
                    counter++;
                    self.DogsCount(counter);
                    self.setPages(self.DogsCount());

                    self.addDogImages(id);

                    if(self.SelectedDogPedigree().length != 0) {
                        self.updateDogPedigree(id);   
                    }      
				} else {
					// TODO: Handle error
				}
			}
        });
    }
    self.addColor = function() {
        var ajaxData = {
            colorDetails: ko.toJS(self.ColorDetails)
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Colors.addColor,
			success: function(viewModel) {
				if(viewModel.execution) {
                    self.toggleVisibilities("list");
                    self.toggleListVisibilities("colors");

                    var counter = self.ColorsCount();
                    counter++;
                    self.ColorsCount(counter);
                    self.setPages(self.ColorsCount());

                    self.resetColors();
				} else {
					// TODO: Handle error
				}
			}
		});
    }
    self.addRace = function() {
        var ajaxData = {
            raceDetails: ko.toJS(self.RaceDetails)
        };
		$.ajax({
			type: "POST",
            dataType: 'json',
            data: ajaxData,
			url: self.Urls.Races.addRace,
			success: function(viewModel) {
				if(viewModel.execution) {
                    self.toggleVisibilities("list");
                    self.toggleListVisibilities("races");

                    var counter = self.RacesCount();
                    counter++;
                    self.RacesCount(counter);
                    self.setPages(self.RacesCount());

                    self.resetRaces();
				} else {
					// TODO: Handle error
				}
			}
		});
    }
    
    /* =============== EVENTs ============== */

    // 1. General
    self.onClickLogout = function() {
		$.ajax({
			type: "POST",
			dataType: 'json',
			url: urls.Account.logout,
			success: function(viewModel) {
			}
		});
    }
    self.onClickHome = function() {
        self.toggleVisibilities("dashboard");
    }
    self.onClickDelete = function() {
        
        if(self.DogsListVisible() == true) {
            self.deleteDogs();
        }
        if(self.RacesListVisible() == true) {
            
            // Get the selected dogs
            var itemsToDelete = [];
            $.each(self.Races(), (index, race) => {
                if(race.IsSelected() == true) {
                    itemsToDelete.push(race.Id);
                }
            });
            self.getDogsByRaces(itemsToDelete);
        }
        if(self.ColorsListVisible() == true) {

            // Get the selected colors
            var itemsToDelete = [];
            $.each(self.Colors(), (index, color) => {
                if(color.IsSelected() == true) {
                    itemsToDelete.push(color.Id);
                }
            });
            self.getDogsByColors(itemsToDelete);
        }
        if(self.ExhibitionsListVisible() == true) {
            self.deleteExhibitions();
        }
    }
    self.onClickAdd = function() {
        
        self.ActionType("add");
        self.toggleVisibilities("details");

        if(self.DogsListVisible() == true) {
            
            self.DogDetails.Name("");
            self.DogDetails.Description("");
            self.DogDetails.Gender("");
            self.DogDetails.Color("");
            self.DogDetails.DateOfBirth("");
            self.DogDetails.Roi("");
            self.DogDetails.Microchip("");
            self.DogDetails.Pedegree("");
            self.DogDetails.Images([]);

            self.toggleDetailsVisibilities("dogs");
            self.ItemDetailsTitle("Aggiunta cane");

            self.getAllColors();
            self.getAllRaces();
        }
        if(self.RacesListVisible() == true) {

            self.RaceDetails.Name("");
            self.RaceDetails.Description("");

            self.toggleDetailsVisibilities("races");
            self.ItemDetailsTitle("Aggiunta razza");
        }
        if(self.ColorsListVisible() == true) {

            self.ColorDetails.Name("");

            self.toggleDetailsVisibilities("colors");
            self.ItemDetailsTitle("Aggiunta colore");
        }
        if(self.ExhibitionsListVisible() == true) {

            self.toggleDetailsVisibilities("exhibitions");
            self.ItemDetailsTitle("Aggiunta esibizione");
        }
    }

    // 2. List    
    self.onClickDogs = function() {
        self.ListTitle("Lista cani");
        self.toggleVisibilities("list");
        self.toggleListVisibilities("dogs");

        // Create pagination
        var itemsCount = self.DogsCount();
        if(itemsCount){
            self.setPages(itemsCount);
        }
        
        self.getDogs();
    }
    self.onClickRaces = function() {
        self.ListTitle("Lista razze");
        self.toggleVisibilities("list");
        self.toggleListVisibilities("races");

        // Create pagination
        var itemsCount = self.RacesCount();
        if(itemsCount){
            self.setPages(itemsCount);
        }

        self.getRaces();
    }
    self.onClickColors = function() {
        self.ListTitle("Lista colori");
        self.toggleVisibilities("list");
        self.toggleListVisibilities("colors");

        // Create pagination
        var itemsCount = self.ColorsCount();
        if(itemsCount){
            self.setPages(itemsCount);
        }

        self.getColors();
    }
    self.onClickClients = function() {
        self.toggleVisibilities("list");
    }
    self.onClickExhibitions = function() {
        self.toggleVisibilities("list");
        self.toggleListVisibilities("exhibitions");
        self.ListTitle("Lista esibizioni");
    }

    // 3. Details
    self.onClickDogDetails = function(itemData) {
        self.ActionType("update");
        self.toggleVisibilities("details");
        self.toggleDetailsVisibilities("dogs");

        self.ItemDetailsTitle(itemData.Id + " - " + itemData.Name);
        
        self.DogDetails.Id(itemData.Id);
        self.DogDetails.Name(itemData.Name);
        self.DogDetails.Description(itemData.Description);
        self.DogDetails.Gender(itemData.Gender);
        self.DogDetails.DateOfBirth(itemData.DateOfBirth);
        self.DogDetails.Roi(itemData.Roi);
        self.DogDetails.Microchip(itemData.Microchip);
        self.DogDetails.Pedegree(itemData.Pedegree);

        // Preselect the gender
        for(var index = 0; index < self.Genders.length; index ++) {
            var currentGender = self.Genders[index];
            if(currentGender.Id == itemData.Gender) {
                self.SelectedGender(currentGender);
                break;
            }
        }

        self.getAllColorsAndPreselect(itemData.Color);
        self.getAllRacesAndPreselect(itemData.Race);
        self.getDogImages();
    }   
    self.onClickRaceDetails = function(itemData) {
        self.ActionType("update");
        self.toggleVisibilities("details");
        self.toggleDetailsVisibilities("races");

        self.ItemDetailsTitle(itemData.Id + " - " + itemData.Name);

        self.RaceDetails.Id(itemData.Id);
        self.RaceDetails.Name(itemData.Name);
        self.RaceDetails.Description(itemData.Description);
    }  
    self.onClickColorDetails = function(itemData) {
        self.ActionType("update");
        self.toggleVisibilities("details");
        self.toggleDetailsVisibilities("colors");

        self.ItemDetailsTitle(itemData.Id + " - " + itemData.Name);

        self.ColorDetails.Id(itemData.Id);
        self.ColorDetails.Name(itemData.Name);
    }  

    // 4. Export
    self.onClickExportCsv = function() {
        self.toggleVisibilities("dashboard");
    }
    self.onClickExportXml = function() {
        self.toggleVisibilities("dashboard");
    }

    // 5. Add
    self.onClickAddDog = function() {        
        self.addDog(); 
    }
    self.onClickAddColor = function() {
        self.addColor();
    }
    self.onClickAddRace = function() {
        self.addRace();
    }
    self.onSelectDogImages = function(vm, event){

        ko.utils.arrayForEach(event.target.files, function(file) {
            self.SelectedDogImages.push(file); 
        });
    }
    self.onSelectDogPedigree = function(vm, event){

        ko.utils.arrayForEach(event.target.files, function(file) {
            self.SelectedDogPedigree.push(file); 
        });
    }

    // 6. Update
    self.onClickUpdateRace = function() {
        self.updateRace();
    }
    self.onClickUpdateColor = function() {
        self.updateColor();
    }
    self.onClickUpdateDog = function() {
        self.updateDog();
        self.updateDogImages();
        if(self.SelectedDogPedigree().length != 0) {
            self.updateDogPedigree(id);   
        }     
    }

    // 7. Pagination
    self.onClickGoToPage = function(itemData) {

        if( self.PageNumber() != itemData.Number) {
            $.each(self.Pages(), (index, page) => {
                page.IsSelected(false);
                if(page.Number == itemData.Number) {
                    page.IsSelected(true);
                    self.PageNumber(page.Number);   
                }
            });

            // RefreshList
            if(self.DogsListVisible() == true) {
                self.getDogs();
            }
            if(self.RacesListVisible() == true) {
                self.getRaces();
            }
            if(self.ColorsListVisible() == true) {
                self.getColors();
            }
            if(self.ExhibitionsListVisible() == true) {
                self.getExhibitions();
            }
        }
    }
    self.onClickGoToNextPage = function() {

        if( self.PageNumber() < self.Pages().length -1) {
            var pageNumber = self.PageNumber();
            pageNumber++;
            self.PageNumber(pageNumber);

            $.each(self.Pages(), (index, page) => {
                page.IsSelected(false);
                if(page.Number == pageNumber) {
                    page.IsSelected(true);
                }
            });
            
            // RefreshList
            if(self.DogsListVisible() == true) {
                self.getDogs();
            }
            if(self.RacesListVisible() == true) {
                self.getRaces();
            }
            if(self.ColorsListVisible() == true) {
                self.getColors();
            }
            if(self.ExhibitionsListVisible() == true) {
                self.getExhibitions();
            }
        }
    }
    self.onClickGoToPreviousPage = function() {

        if( self.PageNumber() > 0) {
            var pageNumber = self.PageNumber();
            pageNumber--;
            self.PageNumber(pageNumber);

            $.each(self.Pages(), (index, page) => {
                page.IsSelected(false);
                if(page.Number == pageNumber) {
                    page.IsSelected(true);
                }
            });
            
            // RefreshList
            if(self.DogsListVisible() == true) {
                self.getDogs();
            }
            if(self.RacesListVisible() == true) {
                self.getRaces();
            }
            if(self.ColorsListVisible() == true) {
                self.getColors();
            }
            if(self.ExhibitionsListVisible() == true) {
                self.getExhibitions();
            }
        }
    }

    self.init();
}

/* === CUSTOM BINDINGS === */
ko.bindingHandlers.datepicker = {
    init: function (element, valueAccessor, allBindingsAccessor) {
        var options = { format: "dd-mm-yyyy" };
        $(element).datepicker(options).on("changeDate", function (ev) {
            var observable = valueAccessor();
            observable(ev.date);
        });
    },
    update: function (element, valueAccessor) {
        var date = ko.utils.unwrapObservable(valueAccessor());
        if (moment(date)._isValid) {
            var value = moment(date).format('DD-MM-YYYY');
            valueAccessor(value);
            $(element).datepicker("setValue", value);
            return;
        }
        valueAccessor("");
        $(element).val("");
    }
}; 

ko.bindingHandlers.fadeVisible = {
    
    init: function(element, valueAccessor) {
        var value = valueAccessor();
        $(element).toggle(ko.unwrap(value));
    },
    update: function(element, valueAccessor) {
        var value = valueAccessor();
        if(ko.unwrap(value)) {
            $(element).fadeIn()
        } else {
            $(element).fadeOut();
        }
    }
};

ko.bindingHandlers.modalVisible = {
    init: function (element, valueAccessor) {
        $(element).modal({
            show: false
        });
        var value = valueAccessor();
        if (ko.isObservable(value)) {
            $(element).on('hide.bs.modal', function() {
               value(false);
            });
        }
    },
    update: function (element, valueAccessor) {
        var value = valueAccessor();
        if (ko.utils.unwrapObservable(value)) {
            $(element).modal('show');
        } else {
            $(element).modal('hide');
        }
    }
}

/* ==== MODELS ==== */

function Dog (itemData) {
    self = this;
    self.IsSelected = ko.observable(false);
    self.Id = itemData.id;
    self.Name = itemData.name; 
    self.Description = itemData.description;
    self.Gender = itemData.gender == "1" ? "Maschio" : "Femmina";
    self.Color = itemData.color;
    self.Race = itemData.race;
    self.DateOfBirth = itemData.dateOfBirth;
    self.Roi = itemData.roi;
    self.Microchip = itemData.microchip;
}
function Color (itemData) {
    self = this;
    self.IsSelected = ko.observable(false);
    self.Id = itemData.id;
    self.Name = itemData.name; 
}
function DogDetails() {
    self = this;
    self.Id = ko.observable();
    self.Name = ko.observable();
    self.Description = ko.observable();
    self.Gender = ko.observable();
    self.Color = ko.observable();
    self.DateOfBirth = ko.observable();
    self.Roi = ko.observable();
    self.Microchip = ko.observable();
    self.Pedegree = ko.observable();
    self.Images = ko.observableArray([]);
}
function RaceDetails() {
    self = this;
    self.Id = ko.observable();
    self.Name = ko.observable();
    self.Description = ko.observable();
}
function ColorDetails() {
    self = this;
    self.Id = ko.observable();
    self.Name = ko.observable();
}
function Race (itemData) {
    self = this;
    self.IsSelected = ko.observable(false);
    self.Id = itemData.id;
	self.Name = itemData.name;
    self.Description = itemData.description;
}
function Image (itemData) {
    self = this;
    self.IsSelected = ko.observable(false);
    self.Id = itemData.id;
	self.Name = itemData.name;
    self.Primary = itemData.primary;
    self.Path = itemData.path;
}
function Pedigree (itemData) {
    self = this;
    self.Id = itemData.id;
	self.Name = itemData.name;
    self.Path = itemData.path;
}
function Exhibition (itemData) {
    self = this;
    self.IsSelected = ko.observable(false);
	self.Name = ko.observable(itemData.name);
    self.Description = ko.observable(itemData.description);
}
function User (itemData) {
	self = this;
	self.Name = ko.observable(itemData.Name);
	self.Surname = ko.observable(itemData.Surname);
	self.ImagePath = ko.observable(itemData.ImagePath);
}
function Page (itemData) {
    self = this;
	self.IsSelected = ko.observable(false);
	self.Number = itemData.Number;
}