<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!--<link href="<?php echo $this->config->item('contents_css'); ?>/details.css" rel="stylesheet" />  -->

<!-- START: DETAILS -->
<div class="col-md-12" data-bind="fadeVisible: ItemDetailsVisible">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title" data-bind="text: ItemDetailsTitle"></h3>
        </div>

        <!-- START: Dog -->
        <div data-bind="visible: DogDetailsVisible">
            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#modify_tab_general" data-toggle="tab">
                                <i class="ion-ios-paper"></i>
                                <span class="hidden-xs"> Informazioni Generali</span>
                            </a>
                        </li>
                        <li>
                            <a href="#modify_tab_images" data-toggle="tab">
                                <i class="ion-images"></i>
                                <span class="hidden-xs"> Immagini</span>
                            </a>
                        </li>
                        <li>
                            <a href="#modify_tab_pedigree" data-toggle="tab">
                                <i class="ion-images"></i>
                                <span class="hidden-xs"> Pedigree</span>
                            </a>
                        </li>
                    </ul>                      
                    <div class="tab-content">
                        <div class="tab-pane active" id="modify_tab_general">
                            <div class="p-b-35">
                                <p>Seleziona la lingua desiderata e modifica la traduzione automatica effettuata tramite API Bing&#153; al momento della creazione del prodotto. Per completare la modifica, cliccare sul pulsante di salvataggio alla fine di ogni pannello.</p>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#italian" role="tab" data-toggle="tab">IT</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="italian">
                                    <div class="form-group">
                                        <label>Nome *</label>
                                        <input class="form-control" required="true" data-bind="value: DogDetails.Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Descrizione *</label>
                                        <textarea class="form-control" rows="7" required="true" data-bind="value: DogDetails.Description"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row p-t-25">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Razza</label>
                                        <select class="form-control" 
                                                data-bind="options: Races, optionsText:'Name', value: SelectedRace">  
                                        </select>
                                    </div>
                                </div>   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mantello</label>
                                        <select class="form-control" 
                                                data-bind="options: Colors, optionsText:'Name', value: SelectedColor">  
                                        </select>
                                    </div>
                                </div>   
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sesso</label>
                                        <select class="form-control" 
                                            data-bind="options: Genders, optionsText:'Name', value: SelectedGender">
                                        </select>
                                    </div>
                                </div>                            
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Data di nascita</label>
                                        <div class="input-group date" data-provide="datepicker">
                                            <input type="text" class="form-control" data-bind="value: DogDetails.DateOfBirth">
                                            <div class="input-group-addon">
                                                <span class="ion-calendar"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>ROI</label>
                                        <input class="form-control" required="true" data-bind="value: DogDetails.Roi">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Microchip</label>
                                        <input class="form-control" required="true" data-bind="value: DogDetails.Microchip"> 
                                    </div>
                                </div>		
                            </div>
                        </div>		    
                        <div class="tab-pane" id="modify_tab_images">
                            <div class="row">
                                <div class="col-xs-12 p-b-35">
                                    <p>Seleziona una o più immagini che rappresentano il prodotto inserito. Le immagini devono essere in formato JPEG o PNG. Una volta inserite, per impostare l'immagine principale del prodotto sarà necessario cliccare sul bottone con la voce <b>Immagine Principale</b> e salvare.</p>
                                </div>
                                
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="cover">Immagine Gallery *</label>
                                        <input type="file" data-bind="event:{ change: onSelectDogImages }" accept="image/x-png, image/jpeg, image/jpg" multiple />
                                        <p class="help-block">Formato richiesto PNG o JPEG</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row gallery">
                                <!-- ko foreach: DogDetails.Images -->
                                <div class="col-xs-6 col-lg-4">
                                    <div class="img-thumbnail">
                                        <img class="img-responsive" data-bind="attr: { src: Path }">
                                    </div>
                                    <input type="radio" data-bind="checked: Primary" /> Principale &nbsp;
                                    <input type="checkbox" data-bind="checked: IsSelected"/> Cancella
                                    <br/>
                                </div>
                                <!-- /ko -->
                            </div>
                        </div>
                        <div class="tab-pane" id="modify_tab_pedigree">
                            <div class="row">
                                <div class="col-xs-12 p-b-35">
                                    <p>Seleziona una o più immagini che rappresentano il pedegree. Le immagini devono essere in formato JPEG o PNG. </p>
                                </div>
                                
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="cover">Immagine Pedegree *</label>
                                        <input type="file" data-bind="event:{ change: onSelectDogPedigree }" accept="image/x-png, image/jpeg, image/jpg" />
                                        <p class="help-block">Formato richiesto PNG o JPEG</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row gallery">
                                <div class="col-xs-6 col-lg-4">
                                    <div class="img-thumbnail">
                                        <img class="img-responsive" data-bind="attr: { src: DogDetails.Pedegree().Path }">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <!-- ko if: ActionType() == "add" -->
                <button type="button" class="btn btn-default">Cancella</button>
                <button type="button" class="btn btn-default btn-blue" data-bind="click: onClickAddDog">Salva</button>     
                <!-- /ko -->       
                <!-- ko if: ActionType() == "update" -->
                <button type="button" class="btn btn-default">Annulla</button>
                <button type="button" class="btn btn-default btn-blue" data-bind="click: onClickUpdateDog">Aggiorna</button>     
                <!-- /ko -->                
            </div>
        </div>
        <!-- END: Dog -->

        <!-- START: Race -->
        <div data-bind="visible: RaceDetailsVisible">
            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#modify_tab_general" data-toggle="tab">
                                <i class="ion-ios-paper"></i>
                                <span class="hidden-xs"> Informazioni Generali</span>
                            </a>
                        </li>
                    </ul>
                        
                    <div class="tab-content">
                        <div class="tab-pane active" id="modify_tab_general">
                            <div class="p-b-35">
                                <p>Seleziona la lingua desiderata e modifica la traduzione automatica effettuata tramite API Bing&#153; al momento della creazione del prodotto. Per completare la modifica, cliccare sul pulsante di salvataggio alla fine di ogni pannello.</p>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#italian" role="tab" data-toggle="tab">IT</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="italian">
                                    <div class="form-group">
                                        <label>Nome *</label>
                                        <input class="form-control" required="true" data-bind="textInput: RaceDetails.Name">
                                    </div>
                                    <div class="form-group">
                                        <label>Descrizione *</label>
                                        <textarea class="form-control" rows="7" required="true" data-bind="textInput: RaceDetails.Description"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>		    
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <!-- ko if: ActionType() == "add" -->
                <button type="button" class="btn btn-default">Cancella</button>
                <button type="button" class="btn btn-default btn-blue" data-bind="click: onClickAddRace">Salva</button>     
                <!-- /ko -->       
                <!-- ko if: ActionType() == "update" -->
                <button type="button" class="btn btn-default">Annulla</button>
                <button type="button" class="btn btn-default btn-blue" data-bind="click: onClickUpdateRace">Aggiorna</button>     
                <!-- /ko -->                
            </div>
        </div>
        <!-- END: Race -->

        <!-- START: Color -->
        <div data-bind="visible: ColorDetailsVisible">
            <div class="panel-body">
                <div class="tabbable">
                    <ul class="nav nav-tabs">
                        <li class="active">
                            <a href="#modify_tab_general" data-toggle="tab">
                                <i class="ion-ios-paper"></i>
                                <span class="hidden-xs"> Informazioni Generali</span>
                            </a>
                        </li>
                    </ul>                       
                    <div class="tab-content">
                        <div class="tab-pane active" id="modify_tab_general">
                            <div class="p-b-35">
                                <p>Seleziona la lingua desiderata e modifica la traduzione automatica effettuata tramite API Bing&#153; al momento della creazione del prodotto. Per completare la modifica, cliccare sul pulsante di salvataggio alla fine di ogni pannello.</p>
                            </div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#italian" role="tab" data-toggle="tab">IT</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane active" id="italian">
                                    <div class="form-group">
                                        <label>Nome *</label>
                                        <input class="form-control" required="true" data-bind="value: ColorDetails.Name">
                                    </div>
                                </div>
                            </div>
                        </div>		    
                    </div>
                </div>
            </div>
            <div class="panel-footer text-right">
                <!-- ko if: ActionType() == "add" -->
                <button type="reset" class="btn btn-default">Cancella</button>
                <button type="submit" class="btn btn-default btn-blue" data-bind="click: onClickAddColor">Salva</button>     
                <!-- /ko -->    
                <!-- ko if: ActionType() == "update" -->
                <button type="button" class="btn btn-default">Annulla</button>
                <button type="button" class="btn btn-default btn-blue" data-bind="click: onClickUpdateColor">Aggiorna</button>     
                <!-- /ko -->                    
            </div>
        </div>
        <!-- END: Color -->
        
    </div>
</div>
<!-- END: DETAILS -->
